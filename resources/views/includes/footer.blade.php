{{-- <div class="footerWrap"> 
    <div class="container">
        <div class="row"> 

            <!--Quick Links-->
            <div class="col-md-3 col-sm-6">
                <h5>{{__('Quick Links')}}</h5>
                <!--Quick Links menu Start-->
                <ul class="quicklinks">
                    <li><a href="{{ route('index') }}">{{__('Home')}}</a></li>
                    <li><a href="{{ route('contact.us') }}">{{__('Contact Us')}}</a></li>
                    <li class="postad"><a href="{{ route('post.job') }}">{{__('Post a Job')}}</a></li>
                    <li><a href="{{ route('faq') }}">{{__('FAQs')}}</a></li>
                    @foreach($show_in_footer_menu as $footer_menu)
                    @php
                    $cmsContent = App\CmsContent::getContentBySlug($footer_menu->page_slug);
                    @endphp

                    <li class="{{ Request::url() == route('cms', $footer_menu->page_slug) ? 'active' : '' }}"><a href="{{ route('cms', $footer_menu->page_slug) }}">{{ $cmsContent->page_title }}</a></li>
                    @endforeach
                </ul>
            </div>
            <!--Quick Links menu end-->

            <div class="col-md-3 col-sm-6">
                <h5>{{__('Jobs By Functional Area')}}</h5>
                <!--Quick Links menu Start-->
                <ul class="quicklinks">
                    @php
                    $functionalAreas = App\FunctionalArea::getUsingFunctionalAreas(10);
                    @endphp
                    @foreach($functionalAreas as $functionalArea)
                    <li><a href="{{ route('job.list', ['functional_area_id[]'=>$functionalArea->functional_area_id]) }}">{{$functionalArea->functional_area}}</a></li>
                    @endforeach
                </ul>
            </div>

            <!--Jobs By Industry-->
            <div class="col-md-3 col-sm-6">
                <h5>{{__('Jobs By Industry')}}</h5>
                <!--Industry menu Start-->
                <ul class="quicklinks">
                    @php
                    $industries = App\Industry::getUsingIndustries(10);
                    @endphp
                    @foreach($industries as $industry)
                    <li><a href="{{ route('job.list', ['industry_id[]'=>$industry->industry_id]) }}">{{$industry->industry}}</a></li>
                    @endforeach
                </ul>
                <!--Industry menu End-->
                <div class="clear"></div>
            </div>

            <!--About Us-->
            <div class="col-md-3 col-sm-12">
                <h5>{{__('Contact Us')}}</h5>
                <div class="address">{{ $siteSetting->site_street_address }}</div>
                <div class="email"> <a href="mailto:{{ $siteSetting->mail_to_address }}">{{ $siteSetting->mail_to_address }}</a> </div>
                <!-- Social Icons -->
                <div class="social">@include('includes.footer_social')</div>
                <!-- Social Icons end --> 

            </div>
            <!--About us End--> 


        </div>
    </div>
</div>
<!--Footer end--> 
<!--Copyright-->
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="bttxt">{{__('Copyright')}} &copy; {{date('Y')}} {{ $siteSetting->site_name }}. {{__('All Rights Reserved')}}. {{__('Design by')}}: <a href="https://piratestechnologies.com/" target="_blank">Pirates Technologies</a></div>
            </div>
            <div class="col-md-4">
                <div class="paylogos"><img src="{{asset('/')}}images/payment-icons.png" alt="" /></div>	
            </div>
        </div>

    </div>
</div> --}}

<footer class="footer">
  <div class="footer-container">

    <!-- QUICK LINKS -->
    <div class="footer-column">
      <h3>{{ __('Quick Links') }}</h3>
      <ul>
        <li><a href="{{ route('index') }}">{{ __('Home') }}</a></li>
        <li><a href="{{ route('contact.us') }}">{{ __('Contact Us') }}</a></li>
        <li><a href="{{ route('post.job') }}">{{ __('Post a Job') }}</a></li>
        <li><a href="{{ route('faq') }}">{{ __('FAQs') }}</a></li>

        @foreach($show_in_footer_menu as $footer_menu)
          @php
            $cmsContent = App\CmsContent::getContentBySlug($footer_menu->page_slug);
          @endphp
          <li class="{{ Request::url() == route('cms', $footer_menu->page_slug) ? 'active' : '' }}">
            <a href="{{ route('cms', $footer_menu->page_slug) }}">
              {{ $cmsContent->page_title }}
            </a>
          </li>
        @endforeach
      </ul>
    </div>

    <!-- JOBS BY FUNCTIONAL AREA -->
    <div class="footer-column">
      <h3>{{ __('Jobs By Functional Area') }}</h3>
      <ul>
        @php
          $functionalAreas = App\FunctionalArea::getUsingFunctionalAreas(10);
        @endphp

        @foreach($functionalAreas as $functionalArea)
          <li>
            <a href="{{ route('job.list', ['functional_area_id[]' => $functionalArea->functional_area_id]) }}">
              {{ $functionalArea->functional_area }}
            </a>
          </li>
        @endforeach
      </ul>
    </div>

    <!-- JOBS BY INDUSTRY -->
    <div class="footer-column">
      <h3>{{ __('Jobs By Industry') }}</h3>
      <ul>
        @php
          $industries = App\Industry::getUsingIndustries(10);
        @endphp

        @foreach($industries as $industry)
          <li>
            <a href="{{ route('job.list', ['industry_id[]' => $industry->industry_id]) }}">
              {{ $industry->industry }}
            </a>
          </li>
        @endforeach
      </ul>
    </div>

    <!-- CONTACT US -->
    <div class="footer-column contact-column">
      <h3>{{ __('Contact Us') }}</h3>

      <p class="contact-item">
        <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
        {{ $siteSetting->site_street_address }}
      </p>

      <p class="contact-item">
        <span class="icon"><i class="fas fa-envelope"></i></span>
        <a href="mailto:{{ $siteSetting->mail_to_address }}" style="color: #fff">
          {{ $siteSetting->mail_to_address }}
        </a>
      </p>

      <!-- SOCIAL ICONS -->
      <div class="social-icons">
        @include('includes.footer_social')
      </div>
    </div>

  </div>
</footer>

<!-- FOOTER BOTTOM -->
<div class="footer-bottom">
  <p>
    © {{ date('Y') }} {{ "JOBHIRE INDIA" }}.
    {{ __('All Rights Reserved') }}.
   
  </p>
</div>

 <!-- LOGIN POPUP MODAL -->
    {{-- <div id="loginModal" class="login-modal-overlay">
      <div class="login-modal">
        <span class="close-modal" onclick="closeLoginModal()">×</span>

        <h3 class="modal-title">Login as</h3>

        <div class="choose-container">
          <!-- Job Seeker Card -->
          <div class="choose-card" onclick="goToJobSeeker()">
            <img src="images/teams/job.png" class="choose-img" />
          </div>

          <!-- Company Card -->
          <div class="choose-card" onclick="goToCompany()">
            <img src="images/teams/hire.png" class="choose-img" />
          </div>
        </div>
      </div>
    </div> --}}
  
    <!-- REGISTER POPUP MODAL -->
    <div id="registerModal" class="login-modal-overlay">
      <div class="login-modal">
        <span class="close-modal" onclick="closeRegisterModal()">×</span>

        <h3 class="modal-title">Register as a</h3>

        <div class="modal-buttons">
          <button
            onclick="goToRegisterJobSeeker()"
            class="btn-modal jobseeker-btn"
          >
            Job Seeker
          </button>
          <button onclick="goToRegisterCompany()" class="btn-modal company-btn">
            Company
          </button>
        </div>
      </div>
    </div>
    <!-- RESUME POPUP MODAL -->
    <div id="resumeModal" class="resume-modal-overlay">
      <div class="resume-modal">
        <span class="close-modal" onclick="closeResumeModal()">×</span>

        <h3 class="modal-title">
          Login or register to create your <br />
          Resume/CV
        </h3>

        <div class="modal-buttons">
          <button onclick="goToJobSeeker()" class="btn-modal login-btn">
            Login
          </button>
          <button
            onclick="goToRegisterJobSeeker()"
            class="btn-modal register-btn"
          >
            Register
          </button>
        </div>
      </div>
    </div>
    <div id="employeeModal" class="resume-modal-overlay">
      <div class="resume-modal">
        <span class="close-modal" onclick="closeEmployeeModal()">×</span>

        <h3 class="modal-title">Welcome to Employer Portal</h3>
        <p>
          Earn our user's trust. Get your account approved to start posting jobs
        </p>
        <div class="modal-buttons">
          <button onclick="goToCompany()" class="btn-modal login-btn">
            Login
          </button>
          <button
            onclick="goToRegisterCompany()"
            class="btn-modal register-btn"
          >
            Register
          </button>
        </div>
      </div>
    </div>
    <!-- Bootstrap Icons -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
    />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>