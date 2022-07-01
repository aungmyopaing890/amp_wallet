<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/soft-ui-dashboard/pages/dashboard.html " target="_blank">
            <img src="{{asset('adminDashboard/assets/img/logo-ct.png')}}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Soft UI Dashboard</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <x-menu-item name="Dashboard" class="feather-shopping-bag" link="{{route('dashboard')}}" ></x-menu-item>
            <x-menu-item name="Users" class="feather-user" link="{{route('user.index')}}"></x-menu-item>
            <x-menu-title title="Manage Account"></x-menu-title>
            <x-menu-item name="Service" class="feather-toggle-left" link="{{route('service.create')}}"></x-menu-item>
            <x-menu-item name="ServiceType" class="feather-toggle-left" link="{{route('serviceType.create')}}"></x-menu-item>
            <x-menu-item name="Currency" class="feather-dollar-sign" link="{{route('currency.create')}}"></x-menu-item>
            <x-menu-item name="Level" class="feather-layers" link="{{route('level.create')}}"></x-menu-item>
            <x-menu-item name="Transaction Type" class="feather-tag" link="{{route('transactionType.create')}}"></x-menu-item>
            <x-menu-item name="Transaction Limit" class="feather-list" link="{{route('transactionLimit.create')}}"></x-menu-item>

            <li class="menu-item">
                <a class="btn btn-outline-primary btn-block" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <x-form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </x-form>
            </li>
        </ul>
    </div>
</aside>
