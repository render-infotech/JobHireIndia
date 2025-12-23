<?php



namespace App\Http\Controllers\Auth;



use App\User;

// use Auth;
use Hash;
use Socialite;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


use App\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller

{

    /*

      |--------------------------------------------------------------------------

      | Login Controller

      |--------------------------------------------------------------------------

      |

      | This controller handles authenticating users for the application and

      | redirecting them to your home screen. The controller uses a trait

      | to conveniently provide its functionality to your applications.

      |

     */



    use AuthenticatesUsers;



    /**

     * Where to redirect users after login.

     *

     * @var string

     */

    protected $redirectTo = '/home';



    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware('guest')->except('logout');
    }



    /**

     * Redirect the user to the OAuth Provider.

     *

     * @return Response

     */

    public function redirectToProvider($provider)

    {

        return Socialite::driver($provider)->redirect();
    }

    public function companyLogin()
    {
        return view('auth.company-login');
    }

    public function companyRegister()
    {
        return view('auth.company-register');
    }

    // public function login(Request $request)
    // {
    //     // Validate the incoming request
    //     $request->validate([
    //         'email' => 'required|string|email',
    //         'password' => 'required|string',
    //     ]);

    //     // Retrieve the user by email
    //     $user = User::where('email', $request->email)->first();

    //     if ($user) {
    //         // Check if the password matches either bcrypt or MD5 hash
    //         if (Hash::check($request->password, $user->password) || md5($request->password) === $user->password) {
    //             // Log the user in
    //             Auth::login($user, $request->filled('remember'));

    //             // Regenerate the session to prevent fixation attacks
    //             $request->session()->regenerate();

    //             // Redirect to intended page or home
    //             return redirect()->intended('/home');
    //         }
    //     }

    //     // If login attempt failed, redirect back with an error message
    //     return back()->withErrors([
    //         'email' => 'The provided credentials do not match our records.',
    //     ])->onlyInput('email');
    // }



    /**

     * Obtain the user information from provider.  Check if the user already exists in our

     * database by looking up their provider_id in the database.

     * If the user exists, log them in. Otherwise, create a new user then log them in. After that 

     * redirect them to the authenticated users homepage.

     *

     * @return Response

     */

    public function handleProviderCallback($provider)

    {

        $user = Socialite::driver($provider)->user();

        $authUser = $this->findOrCreateUser($user, $provider);

        Auth::login($authUser, true);

        return redirect($this->redirectTo);
    }



    /**

     * If a user has registered before using social auth, return the user

     * else, create a new user object.

     * @param  $user Socialite user object

     * @param $provider Social auth provider

     * @return  User

     */

    public function findOrCreateUser($user, $provider)

    {

        if ($user->getEmail() != '') {

            $authUser = User::where('email', 'like', $user->getEmail())->first();

            if ($authUser) {

                /* $authUser->provider = $provider;

                  $authUser->provider_id = $user->getId();

                  $authUser->update(); */

                return $authUser;
            }
        }

        $str = $user->getName() . $user->getId() . $user->getEmail();

        return User::create([

            'first_name' => $user->getName(),

            'middle_name' => $user->getName(),

            'last_name' => $user->getName(),

            'name' => $user->getName(),

            'email' => $user->getEmail(),

            //'provider' => $provider,

            //'provider_id' => $user->getId(),

            'password' => bcrypt($str),

            'is_active' => 1,

            'verified' => 1,

        ]);
    }

    public function sendCompanyOtp(Request $request)
    {
        $request->validate(['mobile' => 'required|digits:10']);

        $otp = 123456; // testing

        session([
            'company_otp' => $otp,
            'company_mobile' => $request->mobile,
            'company_otp_expiry' => now()->addMinutes(5)
        ]);

        return response()->json(['success' => true]);
    }
    public function verifyCompanyOtp(Request $request)
    {
        $request->validate([
            'mobile' => 'required|digits:10',
            'otp' => 'required|digits:6'
        ]);

        if (
            session('company_mobile') !== $request->mobile ||
            session('company_otp') != $request->otp ||
            now()->gt(session('company_otp_expiry'))
        ) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid or expired OTP'
            ]);
        }

        // 🔍 Find company by phone
        $company = Company::where('phone', $request->mobile)->first();

        // ✅ IF COMPANY DOES NOT EXIST → CREATE
        if (!$company) {
            $company = Company::create([
                'phone' => $request->mobile,
                'name' => 'New Company',
                'slug' => 'company-' . uniqid(),
                'verified' => 1,
                'email_verified_at' => now(),
                'is_active' => 1,
            ]);
        } else {
            // ✅ EXISTING COMPANY → AUTO VERIFY
            $company->verified = 1;
            $company->email_verified_at = now();
            $company->save();
        }

        Auth::guard('company')->login($company);

        session()->forget([
            'company_otp',
            'company_mobile',
            'company_otp_expiry'
        ]);

        return response()->json([
            'success' => true,
            'redirect' => route('company.home')
        ]);
    }


    public function sendCandidateOtp(Request $request)
    {
        $request->validate([
            'mobile' => 'required|digits:10'
        ]);

        // static OTP for testing
        $otp = 123456;

        session([
            'candidate_otp' => $otp,
            'candidate_mobile' => $request->mobile,
            'candidate_otp_expiry' => now()->addMinutes(5)
        ]);

        \Log::info('Candidate OTP', ['otp' => $otp]);

        return response()->json([
            'success' => true,
            'message' => 'OTP sent'
        ]);
    }


    public function verifyCandidateOtp(Request $request)
    {
        $request->validate([
            'mobile' => 'required|digits:10',
            'otp' => 'required|digits:6'
        ]);

        if (
            session('candidate_mobile') !== $request->mobile ||
            session('candidate_otp') != $request->otp ||
            now()->gt(session('candidate_otp_expiry'))
        ) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid or expired OTP'
            ]);
        }

        // 🔍 Find candidate using mobile_num FIRST
        // $user = User::where('mobile_num', $request->mobile)->first();
        $user = User::where('mobile_num', $request->mobile)
            ->orWhere('phone', $request->mobile)
            ->first();


        // 🆕 AUTO CREATE NEW CANDIDATE
        if (!$user) {
            $user = User::create([
                'first_name' => 'User',
                'last_name' => substr($request->mobile, -4),
                'name' => 'User_' . substr($request->mobile, -4),
                'mobile_num' => $request->mobile,
                'phone' => $request->mobile,
                'password' => bcrypt(Str::random(16)),
                'is_active' => 1,
                'verified' => 1,
                'email_verified_at' => now(),
                'is_email_verified' => 1,
            ]);
        }

        Auth::login($user);

        session()->forget([
            'candidate_otp',
            'candidate_mobile',
            'candidate_otp_expiry'
        ]);

        return response()->json([
            'success' => true,
            'redirect' => url('/')
        ]);
    }
}
