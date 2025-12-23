{{-- <div class="col-lg-3">
	<div class="usernavwrap">
    <ul class="usernavdash">
        <li class="{{ Request::url() == route('company.home') ? 'active' : '' }}"><a href="{{route('company.home')}}"><i class="fas fa-tachometer" aria-hidden="true"></i> {{__('Dashboard')}}</a></li>
        <li class="{{ Request::url() == route('company.profile') ? 'active' : '' }}"><a href="{{ route('company.profile') }}"><i class="fas fa-pencil" aria-hidden="true"></i> {{__('Edit Account Details')}}</a></li>
        <li><a href="{{ route('company.detail', Auth::guard('company')->user()->slug) }}"><i class="fas fa-user-alt" aria-hidden="true"></i> {{__('Company Public Profile')}}</a></li>
        <li class="{{ Request::url() == route('post.job') ? 'active' : '' }}"><a href="{{ route('post.job') }}"><i class="fas fa-desktop" aria-hidden="true"></i> {{__('Post a Job')}}</a></li>
        <li class="{{ Request::url() == route('posted.jobs') ? 'active' : '' }}"><a href="{{ route('posted.jobs') }}"><i class="fab fa-black-tie"></i> {{__('Manage Jobs')}}</a></li>
        <li class="{{ Request::url() == route('company.packages') ? 'active' : '' }}"><a href="{{ route('company.packages') }}"><i class="fab fa-black-tie"></i> {{__('Packages')}}</a></li>

        <li class="{{ Request::url() == route('company.packages') ? 'active' : '' }}"><a href="{{ route('company.packages') }}"><i class="fas fa-search" aria-hidden="true"></i> {{__('CV Search Packages')}}</a></li>

        <li class="{{ Request::url() == url('/list-payment-history') ? 'active' : '' }}"><a href="{{ url('/list-payment-history') }}"><i class="fas fa-file-invoice"></i> {{__('Payment History')}}</a></li>
        
        <li class="{{ Request::url() == route('company.unloced-users') ? 'active' : '' }}"><a href="{{ route('company.unloced-users') }}"><i class="fas fa-user" aria-hidden="true"></i> {{__('Unlocked Users')}}</a></li>

        <li class="{{ Request::url() == route('company.messages') ? 'active' : '' }}"><a href="{{route('company.messages')}}"><i class="fas fa-envelope" aria-hidden="true"></i> {{__('Company Messages')}}</a></li>
        <li class="{{ Request::url() == route('company.followers') ? 'active' : '' }}"><a href="{{route('company.followers')}}"><i class="fas fa-users" aria-hidden="true"></i> {{__('Company Followers')}}</a></li>
        <li><a href="{{ route('company.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out" aria-hidden="true"></i> {{__('Logout')}}</a>
            <form id="logout-form" action="{{ route('company.logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
        </li>
    </ul>
	</div>

    <div class="dashbarad">
        {!! $siteSetting->dashboard_page_ad !!}
    </div>
</div> --}}
<aside class="sidebar" id="sidebar">

    {{-- Company Info --}}
    @php
        $company = Auth::guard('company')->user();
    @endphp

    <div class="company-info">
        <div class="company-logo">
            {{ strtoupper(substr($company->name ?? 'C', 0, 1)) }}
        </div>
        <div class="company-name">
            {{ $company->name ?? 'Company' }}
        </div>
    </div>

    {{-- Sidebar Menu --}}
    <ul class="sidebar-menu">

        <li class="{{ request()->routeIs('company.home') ? 'active' : '' }}">
            <a href="{{ route('company.home') }}">
                <i class="fas fa-tachometer-alt"></i>
                <span>{{ __('Dashboard') }}</span>
            </a>
        </li>

        <li class="{{ request()->routeIs('posted.jobs') ? 'active' : '' }}">
            <a href="{{ route('posted.jobs') }}">
                <i class="fas fa-briefcase"></i>
                <span>{{ __('Jobs') }}</span>
            </a>
        </li>

        {{-- <li class="{{ request()->routeIs('company.packages') ? 'active' : '' }}">
            <a href="{{ route('company.packages') }}">
                <i class="fas fa-layer-group"></i>
                <span>{{ __('Packages') }}</span>
            </a>
        </li> --}}

        <li class="{{ request()->is('list-payment-history') ? 'active' : '' }}">
            <a href="{{ url('/list-payment-history') }}">
                <i class="fas fa-file-invoice"></i>
                <span>{{ __('Billing') }}</span>
            </a>
        </li>

        <li class="{{ request()->routeIs('company.profile') ? 'active' : '' }}">
            <a href="{{ route('company.profile') }}">
                <i class="fas fa-user-edit"></i>
                <span>{{ __('Edit Profile') }}</span>
            </a>
        </li>

        <li>
            <a href="{{ route('company.logout') }}"
               onclick="event.preventDefault(); document.getElementById('company-logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
                <span>{{ __('Logout') }}</span>
            </a>

            <form id="company-logout-form" action="{{ route('company.logout') }}" method="POST" style="display:none;">
                @csrf
            </form>
        </li>

    </ul>

    {{-- Credit Warning --}}
    @if($company->jobs_quota <= $company->availed_jobs_quota)
        <div class="credit-warning">
            <p>
                <i class="fas fa-exclamation-triangle"></i>
                {{ __("Oh no! You've run out of job credits.") }}
            </p>
            <a href="{{ route('company.packages') }}">
                {{ __('Upgrade now') }} &gt;
            </a>
        </div>
    @endif

    {{-- Buy Credits Button --}}
    <a href="{{ route('company.packages') }}" class="buy-credits-link">
        <button class="buy-credits-btn">
            <i class="fas fa-layer-group"></i>
            {{ __('Buy Credits') }}
        </button>
    </a>

</aside>
