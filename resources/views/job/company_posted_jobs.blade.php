@extends('layouts.app')
@section('content')
<!-- Header start -->
@include('includes.header')
<!-- Header end --> 
<style> .post-job-btn {
        float: right;
        padding: 10px 20px;
        background: #c89f2e;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
      }

      .post-job-btn:hover {
        background: #000;
        color: white;
      }

      /* Job Card */
      .job-card {
        background: white;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 16px;
        border: 1px solid #e5e7eb;
        height: auto;
      }

      .job-card-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 12px;
      }

      .job-title-section {
        flex: 1;
      }

      .job-title-row {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 8px;
      }

      .star-icon {
        color: #fbbf24;
        font-size: 18px;
      }

      .job-title {
        font-size: 18px;
        font-weight: 600;
        color: #1a1a1a;
      }

      .status-badge {
        padding: 4px 12px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 600;
      }

      .status-badge.expired {
        background: #fee2e2;
        color: #991b1b;
      }

      .job-meta {
        display: flex;
        gap: 16px;
        color: #6b7280;
        font-size: 14px;
        flex-wrap: wrap;
      }

      .job-meta span {
        display: flex;
        align-items: center;
        gap: 4px;
      }

      .job-stats {
        display: flex;
        gap: 32px;
        align-items: center;
      }

      .stat-item {
        text-align: center;
      }

      .stat-value {
        font-size: 20px;
        font-weight: 700;
        color: #1a1a1a;
        display: block;
      }

      .stat-label {
        font-size: 12px;
        color: #6b7280;
      }

      .job-actions {
        display: flex;
        gap: 8px;
        align-items: center;
      }

      .btn-action {
        padding: 8px 16px;
        border-radius: 6px;
        border: none;
        font-size: 13px;
        font-weight: 500;
        cursor: pointer;
        white-space: nowrap;
      }

      .btn-repost {
        background: #dabf75;
        color: white;
      }

      .btn-repost:hover {
        background: #047857;
      }

      .btn-view {
        background: white;
        color: #374151;
        border: 1px solid #d1d5db;
      }

      .btn-view:hover {
        background: #f9fafb;
      }

      .more-btn {
        width: 32px;
        height: 32px;
        border-radius: 6px;
        border: 1px solid #d1d5db;
        background: white;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #6b7280;
      }

      .more-btn:hover {
        background: #f9fafb;
      }

      .repost-notice {
        background: #fee2e2;
        padding: 12px 16px;
        border-radius: 6px;
        color: #92400e;
        font-size: 13px;
        margin-top: 12px;
        display: flex;
        align-items: center;
        gap: 8px;
      }
      .menu-icon {
        display: none;
      }

      @media (max-width: 768px) {
        .sidebar {
          position: fixed;
          left: -240px;
          top: 64px;
          height: calc(100vh - 64px);
          z-index: 999;
          transition: left 0.3s;
        }

        .sidebar.show {
          left: 0;
        }

        .main-content {
          padding: 16px;
        }

        .job-card-header {
          flex-direction: column;
        }

        .job-stats {
          width: 100%;
          justify-content: space-around;
        }

        .job-actions {
          width: 100%;
          margin-top: 12px;
        }
        .menu-icon {
          display: block;
        }
      }

      /* Panel background blur */
      .credits-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.3);
        display: none;
        z-index: 900;
      }

      /* Slide panel */
      .credits-panel {
        position: fixed;
        top: 0;
        right: -400px;
        width: 380px;
        height: 100%;
        background: white;
        box-shadow: -2px 0 12px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        transition: right 0.3s ease;
        padding: 20px;
        overflow-y: auto;
        border-radius: 12px 0 0 12px;
      }

      .credits-panel.show {
        right: 0;
      }

      .credits-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
      }

      .close-btn {
        background: none;
        border: none;
        font-size: 20px;
        cursor: pointer;
        color: #4b5563;
      }

      .credit-item {
        display: flex;
        align-items: center;
        gap: 15px;
        background: #f9fafb;
        padding: 14px;
        border-radius: 8px;
        margin-bottom: 14px;
        border: 1px solid #e5e7eb;
      }

      .credit-icon {
        font-size: 22px;
        color: #dabf75;
      }

      .credit-title {
        margin: 0;
        font-size: 14px;
        color: #6b7280;
      }

      .credit-value {
        margin: 0;
        font-size: 22px;
        font-weight: bold;
        color: #1f2937;
      }

      .buy-credits-slide-btn {
        width: 100%;
        padding: 12px;
        margin-top: 10px;
        background: #bd9c40;
        color: #000;
        border: none;
        border-radius: 6px;
        font-size: 15px;
        cursor: pointer;
      }

      .buy-credits-slide-btn:hover {
        background: #dabf75;
      }
      .logo {
        display: flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
      }

      .logo-img {
        height: 60px;
        width: auto;
        object-fit: contain;
      }

      .logo-text {
        font-size: 24px;
        font-weight: 600;
        color: #1a1a1a;
      }

      .logo-text span {
        color: #dabf75;
      }

      /* Hide text on small screens if needed */
      @media (max-width: 768px) {
        .logo-text {
          display: none;
        }
      }
      /* OVERLAY */
      .renew-modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.55);
        justify-content: center;
        align-items: center;
      }

      /* MODAL BOX */
      .renew-modal-content {
        background: #fff;
        width: 420px;
        padding: 30px 25px;
        border-radius: 12px;
        text-align: center;
        position: relative;
        animation: fadeIn 0.3s ease;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
      }

      @keyframes fadeIn {
        from {
          opacity: 0;
          transform: scale(0.95);
        }
        to {
          opacity: 1;
          transform: scale(1);
        }
      }

      /* CLOSE BUTTON */
      .close-modal {
        position: absolute;
        top: 14px;
        right: 16px;
        font-size: 22px;
        cursor: pointer;
        color: #555;
      }

      /* ICON */
      .modal-header-icon i {
        font-size: 48px;
        color: #dc3545;
        margin-bottom: 10px;
      }

      /* TEXTS */
      .modal-title {
        font-size: 20px;
        margin: 0 0 6px;
        font-weight: 600;
      }

      .modal-subtitle {
        font-size: 14px;
        color: #555;
        margin-bottom: 25px;
      }

      /* CTA BUTTON */
      .go-plan-btn {
        background: #0d6efd;
        color: #fff;
        padding: 10px 20px;
        display: inline-block;
        border-radius: 6px;
        text-decoration: none;
        font-size: 15px;
        font-weight: 500;
      }
    </style>
<!-- Inner Page Title start -->
{{-- @include('includes.inner_page_title', ['page_title'=>__('Manage Jobs')]) --}}
<!-- Inner Page Title end -->
<div class="listpgWraper">
    <div class="container">
        <div class="row">
            @include('includes.company_dashboard_menu')

            {{-- <div class="col-lg-9"> 
                <div class="myads">

                    @include('flash::message') 

                    <h3>{{__('Manage Jobs')}}</h3>
                    
                    <!-- Tabs start -->
                    <ul class="nav nav-tabs mt-4" id="jobTabs">
                        <li class="nav-item">
                            <a class="nav-link active" id="active-tab" data-toggle="tab" href="#active-jobs">{{__('Active Jobs')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="expired-tab" data-toggle="tab" href="#expired-jobs">{{__('Expired Jobs')}}</a>
                        </li>
                    </ul>
                    <!-- Tabs end -->

                    <div class="tab-content">
                        <!-- Active Jobs start -->
                        <div class="tab-pane fade show active" id="active-jobs">
                            <ul class="featuredlist row">
                                @if(isset($jobs) && count($jobs))
                                    @foreach($jobs as $job)
                                        @php 
                                            $company = $job->getCompany(); 
                                            $appliedUsersCount = $job->appliedUsers->count();
                                        @endphp
                                        @if(null !== $company && $job->expiry_date >= now())

                                        <li class="col-lg-6 col-md-6" id="job_li_{{$job->id}}">
                                            <div class="jobint">

                                                <div class="d-flex">
                                                    <div class="fticon"><i class="fas fa-briefcase"></i> {{$job->getJobType('job_type')}}</div>                        
                                                </div>
                                                <h4><a href="{{route('job.detail', [$job->slug])}}" title="{{$job->title}}">{!! \Illuminate\Support\Str::limit($job->title, $limit = 20, $end = '...') !!}</a>
                                                </h4>
                                                @if(!(bool)$job->hide_salary)                    
                                                <div class="salary mb-2">Salary: <strong>{{$job->salary_currency.''.$job->salary_from}} - {{$job->salary_currency.''.$job->salary_to}}/{{$job->getSalaryPeriod('salary_period')}}</strong></div>
                                                @endif 
                                                <strong><i class="fas fa-map-marker-alt"></i> {{$job->getCity('city')}}</strong>    
                                                <span>{{$job->created_at->format('M d, Y')}}</span>
                                                <div class="d-flex mt-3 compjobslinks">
                                                    <a class="btn btn-primary me-2" href="{{route('list.applied.users', [$job->id])}}">{{__('Candidates')}}
                                                        @if($appliedUsersCount > 0)
                                                            <span class="badge bg-white text-dark">{{$appliedUsersCount}}</span>
                                                        @else
                                                            <span class="badge bg-white text-dark">0</span>
                                                        @endif
                                                    </a>
                                                    <a class="btn btn-warning me-2" href="{{route('edit.front.job', [$job->id])}}"><i class="fas fa-edit"></i></a>
                                                    <a class="btn btn-danger me-2" href="javascript:;" onclick="deleteJob({{$job->id}});"><i class="fas fa-trash"></i></a>                                    
                                                </div>
                                                
                                                <!-- Job Stats Bar -->
                                                <div class="job-stats-bar">
                                                    <div class="job-stat-item">
                                                        <i class="fas fa-eye"></i>
                                                        <span class="job-stat-label">{{__('Total Visitors')}}:</span>
                                                        <span class="job-stat-value">{{$job->num_views ?? 0}}</span>
                                                    </div>
                                                    <div class="job-stat-item">
                                                        <i class="fas fa-users"></i>
                                                        <span class="job-stat-label">{{__('Applied Candidates')}}:</span>
                                                        <span class="job-stat-value">{{$appliedUsersCount}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        @endif
                                    @endforeach
                                @else
                                    <p>No Active Jobs</p>
                                @endif
                            </ul>
                        </div>
                        <!-- Active Jobs end -->

                        <!-- Expired Jobs start -->
                        <div class="tab-pane fade" id="expired-jobs">
                            <ul class="featuredlist row">
                                @if(isset($jobs) && count($jobs))
                                    @foreach($jobs as $job)
                                        @php 
                                            $company = $job->getCompany(); 
                                            $appliedUsersCount = $job->appliedUsers->count();
                                        @endphp
                                        @if(null !== $company && $job->expiry_date < now())
                                           
                                            <li class="col-lg-6 col-md-6" id="job_li_{{$job->id}}">
                                            <div class="jobint">

                                                <div class="d-flex">
                                                    <div class="fticon"><i class="fas fa-briefcase"></i> {{$job->getJobType('job_type')}}</div>                        
                                                </div>
                                                <h4><a href="{{route('job.detail', [$job->slug])}}" title="{{$job->title}}">{!! \Illuminate\Support\Str::limit($job->title, $limit = 20, $end = '...') !!}</a>
                                                </h4>
                                                @if(!(bool)$job->hide_salary)                    
                                                <div class="salary mb-2">Salary: <strong>{{$job->salary_currency.''.$job->salary_from}} - {{$job->salary_currency.''.$job->salary_to}}/{{$job->getSalaryPeriod('salary_period')}}</strong></div>
                                                @endif 
                                                <strong><i class="fas fa-map-marker-alt"></i> {{$job->getCity('city')}}</strong>    
                                                <span>{{$job->created_at->format('M d, Y')}}</span>
                                                <div class="d-flex mt-3 compjobslinks">
                                                <a class="btn btn-primary me-2" href="{{route('list.applied.users', [$job->id])}}">{{__('Candidates')}}
                                                                @if($appliedUsersCount > 0)
                                                                    <span class="badge bg-white text-dark">{{$appliedUsersCount}}</span>
                                                                @else
                                                                    <span class="badge bg-white text-dark">0</span>
                                                                @endif
                                                            </a>
                                                            <a class="btn btn-warning me-2" href="{{route('edit.front.job', [$job->id])}}">Repost</a>
                                                            <a class="btn btn-danger me-2" href="javascript:;" onclick="deleteJob({{$job->id}});"><i class="fas fa-trash"></i></a>                                       
                                                </div>
                                                
                                                <!-- Job Stats Bar -->
                                                <div class="job-stats-bar">
                                                    <div class="job-stat-item">
                                                        <i class="fas fa-eye"></i>
                                                        <span class="job-stat-label">{{__('Total Visitors')}}:</span>
                                                        <span class="job-stat-value">{{$job->num_views ?? 0}}</span>
                                                    </div>
                                                    <div class="job-stat-item">
                                                        <i class="fas fa-users"></i>
                                                        <span class="job-stat-label">{{__('Applied Candidates')}}:</span>
                                                        <span class="job-stat-value">{{$appliedUsersCount}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>







                                        @endif
                                    @endforeach
                                @else
                                    <p>No Expired Jobs</p>
                                @endif
                            </ul>
                        </div>
                        <!-- Expired Jobs end -->
                    </div>

                    <!-- Pagination Start -->
                    <div class="pagiWrap mt-4">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="showreslt">
                                    {{__('Showing Jobs')}} : {{ $jobs->firstItem() }} - {{ $jobs->lastItem() }} {{__('Total')}} {{ $jobs->total() }}
                                </div>
                            </div>
                            <div class="col-md-7 text-right">
                                @if(isset($jobs) && count($jobs))
                                    {{ $jobs->appends(request()->query())->links() }}
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Pagination end -->

                </div>
            </div> --}}
           
{{-- <div class="col-lg-9"> --}}
    <main class="main-content">

        @include('flash::message')

        <div class="page-header">
            <h1 class="page-title">
                {{ __('All Jobs') }} ({{ $jobs->total() }})
            </h1>

            <a href="{{ route('post.job') }}" class="post-job-btn">
                <i class="fas fa-plus"></i> {{ __('Post a new job') }}
            </a>
        </div>

        {{-- JOB LIST --}}
        @forelse($jobs as $job)
            @php
                $appliedUsersCount = $job->appliedUsers->count();
                $isExpired = $job->expiry_date < now();
            @endphp

            <div class="job-card {{ $isExpired ? 'expired' : '' }}" id="job_li_{{ $job->id }}">

                <div class="job-card-header">

                    {{-- TITLE --}}
                    <div class="job-title-section">
                        <div class="job-title-row">
                            <i class="fas fa-star star-icon"></i>

                            <h3 class="job-title"
                                onclick="window.location.href='{{ route('job.detail',$job->slug) }}'">
                                {{ $job->title }}
                            </h3>

                            @if($isExpired)
                                <span class="status-badge expired">{{ __('Expired') }}</span>
                            @endif
                        </div>

                        <div class="job-meta">
                            <span>
                                <i class="fas fa-map-marker-alt"></i>
                                {{ $job->getCity('city') }}
                            </span>

                            <span>
                                <i class="far fa-calendar"></i>
                                {{ __('Posted on') }} {{ $job->created_at->format('d M Y') }}
                            </span>
                        </div>
                    </div>

                    {{-- STATS --}}
                    <div class="job-stats">
                        <div class="stat-item">
                            <span class="stat-value">{{ $appliedUsersCount }}</span>
                            <span class="stat-label">{{ __('Applied to job') }}</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value">{{ $job->num_views ?? 0 }}</span>
                            <span class="stat-label">{{ __('Total Views') }}</span>
                        </div>
                    </div>

                    {{-- ACTIONS --}}
                    <div class="job-actions">
                        @if(!$isExpired)
                            <button class="btn-action btn-view"
                                onclick="window.location.href='{{ route('list.applied.users',$job->id) }}'">
                                {{ __('View Candidates') }}
                            </button>
                        @else
                            <button class="btn-action btn-repost"
                                onclick="window.location.href='{{ route('edit.front.job',$job->id) }}'">
                                {{ __('Repost now') }}
                            </button>
                        @endif

                        <button class="more-btn" data-toggle="dropdown">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item"
                               href="{{ route('edit.front.job',$job->id) }}">
                                <i class="fas fa-edit"></i> {{ __('Edit') }}
                            </a>

                            <a class="dropdown-item text-danger"
                               href="javascript:;" onclick="deleteJob({{ $job->id }})">
                                <i class="fas fa-trash"></i> {{ __('Delete') }}
                            </a>
                        </div>
                    </div>
                </div>

                {{-- EXPIRED NOTICE --}}
                @if($isExpired)
                    <div class="repost-notice">
                        <i class="fas fa-sync-alt"></i>
                        {{ __('Repost now to receive new candidates') }}
                    </div>
                @endif

            </div>

        @empty
            <p>{{ __('No Jobs Found') }}</p>
        @endforelse

        {{-- PAGINATION --}}
        <div class="pagiWrap mt-4">
            {{ $jobs->links() }}
        </div>

    </main>
{{-- </div> --}}

        </div>
    </div>
</div>
{{-- @include('includes.footer') --}}
@endsection

@push('scripts')
<script type="text/javascript">
    function deleteJob(id) {
        var msg = 'Are you sure?';
        if (confirm(msg)) {
            $.post("{{ route('delete.front.job') }}", {id: id, _method: 'DELETE', _token: '{{ csrf_token() }}'})
                .done(function (response) {
                    if (response == 'ok') {
                        $('#job_li_' + id).remove();
                    } else {
                        alert('Request Failed!');
                    }
                });
        }
    }

    $(document).ready(function() {
        // Initialize the tab functionality
        $('#jobTabs a').on('click', function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
    });
</script>
@endpush
