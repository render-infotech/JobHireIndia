{{-- <div class="section featuredjobwrap">
    <div class="container"> 
    @if(isset($featuredJobs) && count($featuredJobs))
        <!-- title start -->
        <div class="titleTop text-center">
            <h3>{{__('Featured Jobs')}}</h3>
        </div>
        <!-- title end --> 

        <!--Featured Job start-->
        <ul class="featuredlist row">
            
            @foreach($featuredJobs as $featuredJob)
            <?php $company = $featuredJob->getCompany(); ?>
            @if(null !== $company)
            <!--Job start-->
            <li class="col-lg-3 col-md-6">
                <div class="jobint">
                    <div class="d-flex">
                        <div class="fticon"><i class="fas fa-briefcase"></i> {{$featuredJob->getJobType('job_type')}}</div>                        
                    </div>

                    <h4><a href="{{route('job.detail', [$featuredJob->slug])}}" title="{{$featuredJob->title}}">{!! \Illuminate\Support\Str::limit($featuredJob->title, $limit = 20, $end = '...') !!}</a></h4>
                    <strong><i class="fas fa-map-marker-alt"></i> {{$featuredJob->getCity('city')}}</strong> 
                    
                    <div class="jobcompany">
                     <div class="ftjobcomp">
                        <span>{{$featuredJob->created_at->format('M d, Y')}}</span>
                        <a href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}">{{$company->name}}</a>
                     </div>
                    <a href="{{route('company.detail', $company->slug)}}" class="company-logo" title="{{$company->name}}">{{$company->printCompanyImage()}} </a>
                    </div>
                </div>
            </li>
            <!--Job end--> 
            @endif
            @endforeach
           

        </ul>
        <!--Featured Job end--> 

        <!--button start-->
        <div class="viewallbtn"><a href="{{route('job.list', ['is_featured'=>1])}}">{{__('View All Featured Jobs')}}</a></div>
        <!--button end--> 
    
     @endif
    </div>

    
    
</div> --}}
<style>
  .job-card-new {
    height: 300px;
  }
</style>
<section class="featured-jobs py-5">
  <div class="container">

    @if(isset($featuredJobs) && count($featuredJobs))
      <h2 class="text-center fw-bold mb-5">{{ __('Featured Jobs') }}</h2>

      <div class="row g-4">
        @foreach($featuredJobs as $featuredJob)
          @php
            $company = $featuredJob->getCompany();
          @endphp

          @if($company)
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
              <div class="job-card-new">

                <!-- HEADER -->
                <div class="job-header">
                  <div>
                    <h3 class="job-title-new">
                      <a href="{{ route('job.detail', [$featuredJob->slug]) }}">
                        {{ \Illuminate\Support\Str::limit($featuredJob->title, 30) }}
                      </a>
                    </h3>

                    <div class="job-company-row">
                      <span class="company-name">
                        <a href="{{ route('company.detail', $company->slug) }}">
                          {{ $company->name }}
                        </a>
                      </span>

                      @if($company->rating)
                        <span class="rating">
                          ⭐ {{ number_format($company->rating, 1) }}
                          <span class="reviews">
                            ({{ $company->reviews_count ?? 0 }} Reviews)
                          </span>
                        </span>
                      @endif
                    </div>
                  </div>

                  <!-- COMPANY LOGO -->
                  <div class="company-logo-new">
                    {!! $company->printCompanyImage() !!}
                  </div>
                </div>

                <!-- INFO ROW -->
                <div class="job-info-row">
                  <span>
                    <i class="fa-solid fa-briefcase"></i>
                    {{ $featuredJob->getJobExperience('job_experience') ?? __('Any') }}
                  </span>

                  <span>
                    <i class="fa-solid fa-location-dot"></i>
                    {{ $featuredJob->getCity('city') }}
                  </span>
                </div>

                <!-- QUALIFICATION -->
                @if($featuredJob->qualification)
                  <p class="qualification">
                    <i class="fa-regular fa-file-lines"></i>
                    {{ $featuredJob->qualification }}
                  </p>
                @endif

                <!-- SKILLS -->
                @if($featuredJob->jobSkills && $featuredJob->jobSkills->count())
  <div class="skills-list">
    @foreach($featuredJob->jobSkills as $jobSkill)
      <span>{{ $jobSkill->getJobSkill('job_skill') }}</span>
    @endforeach
  </div>
@endif


                <!-- FOOTER -->
                <div class="job-footer">
                  <span class="posted">
                    {{ $featuredJob->created_at->diffForHumans() }}
                  </span>
                </div>

              </div>
            </div>
          @endif
        @endforeach
      </div>

      <!-- VIEW ALL -->
      <div class="text-center mt-5">
        <a href="{{ route('job.list', ['is_featured' => 1]) }}"
           class="btn btn-primary view-all-btn">
          {{ __('View All Featured Jobs') }}
        </a>
      </div>

    @endif

  </div>
</section>
