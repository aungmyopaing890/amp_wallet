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
            @if(Auth::user()->role_id==1 ||Auth::user()->role_id==2)
                <x-menu-item name="Dashboard" class="feather-shopping-bag" link="{{route('dashboard')}}" ></x-menu-item>

                <x-menu-title title="Transaction"></x-menu-title>
                <x-menu-item name="Withdraw" class="feather-user" link=""></x-menu-item>

                <x-menu-title title="Manage Users"></x-menu-title>
                <x-menu-item name="Admin&staff" class="feather-user" link="{{route('user.index')}}"></x-menu-item>
                <x-menu-item name="Customer" class="feather-user" link="{{route('customer.index')}}"></x-menu-item>
                <x-menu-item name="Merchant" class="feather-user" link="{{route('merchant.index')}}"></x-menu-item>

                <x-menu-title title="Manage Account"></x-menu-title>
                <x-menu-item name="Service" class="feather-toggle-left" link="{{route('service.create')}}"></x-menu-item>
                <x-menu-item name="ServiceType" class="feather-toggle-left" link="{{route('serviceType.create')}}"></x-menu-item>
                <x-menu-item name="Currency" class="feather-dollar-sign" link="{{route('currency.create')}}"></x-menu-item>
                <x-menu-item name="Transaction Type" class="feather-tag" link="{{route('transactionType.create')}}"></x-menu-item>
                <x-menu-item name="Transaction Limit" class="feather-list" link="{{route('transactionLimit.create')}}"></x-menu-item>
            @elseif(Auth::user()->role_id==3)

            @elseif(Auth::user()->role_id==4)
                <x-menu-title title="Manage"></x-menu-title>
                <x-menu-item name="Transfer" class="feather-dollar-sign" link="{{route('getWalletID')}}"></x-menu-item>
                <x-menu-item name="Withdraw" class="feather-dollar-sign" link="{{route('getWalletIDWithdraw')}}"></x-menu-item>-
            @endif
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
