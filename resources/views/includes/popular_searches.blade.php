{{-- <div class="section greybg">
    <div class="container">
        <div class="topsearchwrap">

        

        <div class="titleTop text-center">
        <h3>{{__('Browse Jobs By Categories')}}</h3>        
        </div>

                <div class="srchint">
                <ul class="categorylisting owl-carousel">
                    
                        @if(isset($topFunctionalAreaIds) && count($topFunctionalAreaIds)) 
                        @foreach($topFunctionalAreaIds as $functional_area_id_num_jobs)                        
                        <?php
                        $functionalArea = App\FunctionalArea::where('functional_area_id', '=', $functional_area_id_num_jobs->functional_area_id)->first();
                        ?>
                         @if(null !== $functionalArea)

                        

                         <li class="item">
                            <a class="catecard" href="{{route('job.list', ['functional_area_id[]'=>$functionalArea->functional_area_id])}}" title="{{$functionalArea->functional_area}}">
                                <div class="iconcircle">
                                @if ($functionalArea->image && file_exists(public_path('uploads/functional_area/' . $functionalArea->image)))
                                    <img src="{{ asset('uploads/functional_area/' . $functionalArea->image) }}" alt="{{$functionalArea->functional_area}}">
                                @else
                                    <!-- Use your dummy image path or URL here -->
                                    <img src="{{ asset('images/no-image.png') }}" alt="{{$functionalArea->functional_area}}">
                                @endif
                                </div>                                   
                                <div class="catedata">
                                    <h3>{!! \Illuminate\Support\Str::limit($functionalArea->functional_area, $limit = 25, $end = '...') !!}</h3>
                                    <div class="badge"><i class="fas fa-briefcase"></i> ({{$functional_area_id_num_jobs->num_jobs}}) {{__('Jobs')}}</div>
                                </div>
                            </a>
                        </li>

                        @endif @endforeach @endif
                    </ul>
                    <!--Categories end-->

                    <div class="categorylisting-controls">
                        <button class="custom-prev-categorylisting"><i class="fas fa-chevron-left"></i></button>
                        <button class="custom-next-categorylisting"><i class="fas fa-chevron-right"></i></button>
                    </div>


                </div>

                <div class="viewallbtn"><a href="{{url('/all-categories')}}">{{__('View All Categories')}}</a></div>

            
        </div>
       </div> 
        

        
        
    
</div> --}}
<section class="job-categories py-5">
  <div class="container">

    <h2 class="text-center fw-bold mb-5">
      {{ __('Browse Jobs By Categories') }}
    </h2>

    <div class="categories-wrapper">

      <!-- LEFT ARROW -->
      <button class="arrow-btn left-arrow" onclick="scrollCategories(-300)">
        <i class="fa-solid fa-chevron-left"></i>
      </button>

      <!-- SCROLLABLE CATEGORIES -->
      <div class="categories-scroll" id="categoryScroll">

        @if(isset($topFunctionalAreaIds) && count($topFunctionalAreaIds))
          @foreach($topFunctionalAreaIds as $functional_area_id_num_jobs)

            @php
              $functionalArea = App\FunctionalArea::where(
                'functional_area_id',
                $functional_area_id_num_jobs->functional_area_id
              )->first();
            @endphp

            @if($functionalArea)
              <a
                href="{{ route('job.list', ['functional_area_id[]' => $functionalArea->functional_area_id]) }}"
                class="category-card"
                title="{{ $functionalArea->functional_area }}"
              >

                <!-- ICON -->
                <img
                  src="
                    @if($functionalArea->image && file_exists(public_path('uploads/functional_area/'.$functionalArea->image)))
                      {{ asset('uploads/functional_area/'.$functionalArea->image) }}
                    @else
                      {{ asset('images/no-image.png') }}
                    @endif
                  "
                  class="category-icon"
                  alt="{{ $functionalArea->functional_area }}"
                />

                <!-- NAME -->
                <h5>
                  {{ \Illuminate\Support\Str::limit($functionalArea->functional_area, 30) }}
                </h5>

                <!-- JOB COUNT -->
                <div class="category-jobs">
                  <i class="fa-solid fa-briefcase"></i>
                  ({{ $functional_area_id_num_jobs->num_jobs }})
                  {{ __('Jobs') }}
                </div>

              </a>
            @endif

          @endforeach
        @endif

      </div>

      <!-- RIGHT ARROW -->
      <button class="arrow-btn right-arrow" onclick="scrollCategories(300)">
        <i class="fa-solid fa-chevron-right"></i>
      </button>

    </div>

    <!-- VIEW ALL -->
    <div class="text-center mt-5">
      <a href="{{ url('/all-categories') }}" class="btn btn-primary view-all-btn">
        {{ __('View All Categories') }}
      </a>
    </div>

  </div>
</section>
