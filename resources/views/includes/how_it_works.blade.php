{{-- 
<div class="howitsection">
<div class="container">   
<div class="howitwrap">

    
            <?php $widget =widget(6); ?>
            <!-- title start -->
            <div class="titleTop">
                <h3>{{__('How It Works')}}</h3>
            </div>
            <!-- title end -->
            <ul class="howlist row">
                <!--step 1-->
                <li class="col-lg-4">
                    <div class="iconcircle"><span class="material-symbols-outlined">person_add</span></div>
                    <div class="">
                    <h4>{{ __($widget->extra_field_1) }}</h4>
                    <p>{{ __($widget->extra_field_2) }}.</p>
                    </div>
                </li>
                <!--step 1 end-->
                <!--step 2-->
                <li class="col-lg-4">
                    <div class="iconcircle"><span class="material-symbols-outlined">fact_check</span></div>
                    <div class="">
                    <h4>{{ __($widget->extra_field_3) }}</h4>
                    <p>{{ __($widget->extra_field_4) }}.</p>
                    </div>
                </li>
                <!--step 2 end-->
                <!--step 3-->
                <li class="col-lg-4">
                    <div class="iconcircle"><span class="material-symbols-outlined">touchpad_mouse</span></div>
                    <div class="">
                    <h4>{{ __($widget->extra_field_5) }}</h4>
                    <p>{{ __($widget->extra_field_6) }}.</p>
                    </div>
                </li>
                <!--step 3 end-->
            </ul>

</div>
        
   
</div>
</div> --}}
  <section class="how-it-works py-5">
      <div class="container">
        <h2 class="text-center fw-bold mb-2">How It Works</h2>

        <div class="row text-center g-4">
          <!-- Step 1 -->
          <div class="col-12 col-md-4">
            <div class="how-card">
              <img
                src="images/steps/step1.png"
                class="how-img"
                alt="Create Account"
              />
              <h4 class="how-title">Create An Account</h4>
              <p class="how-desc">
                It's very easy to open an account and start your journey.
              </p>
            </div>
          </div>

          <!-- Step 2 -->
          <div class="col-12 col-md-4">
            <div class="how-card">
              <img
                src="images/steps/step2.png"
                class="how-img"
                alt="Complete Profile"
              />
              <h4 class="how-title">Complete Your Profile</h4>
              <p class="how-desc">
                Complete your profile with all the info to get attention of
                employers.
              </p>
            </div>
          </div>

          <!-- Step 3 -->
          <div class="col-12 col-md-4">
            <div class="how-card">
              <img
                src="images/steps/step3.png"
                class="how-img"
                alt="Apply Job"
              />
              <h4 class="how-title">Apply Job or Hire</h4>
              <p class="how-desc">
                Apply & get your preferred jobs or post jobs to hire perfect
                candidates.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>