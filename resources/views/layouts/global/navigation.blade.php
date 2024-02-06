<nav class="sb-topnav navbar navbar-expand navbar-dark bg-light shadow">
  <!-- Navbar Brand-->
  {{-- <a class="navbar-brand brand-name" href="index.html">Dungganon Siaton Branch <span class="sub-name">Loan Management System</span></a> --}}
  <a class="navbar-brand brand-name" href="/"><img src="https://nwtf.org.ph/wp-content/uploads/2020/07/NWTFi-Logo.png" alt="" width="100"></a>
  <!-- Sidebar Toggle-->
  <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 btn-primary bg-dark" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
  <!-- Navbar Search-->
  <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
      {{-- <div class="input-group">
          <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
          <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
      </div> --}}
  </form>
  <!-- Navbar-->
  <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->first_name }}
        </a>

        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
  </ul>
</nav>

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                @auth
                    @if (auth()->user()->role === "member")
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menus</div>

                            {{-- Main --}}
                            <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="true" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Main 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse show" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('member.loan.index') }}">
                                        <div class="sb-nav-link-icon"><i class="fas fa-dollar"></i></div>
                                        Loan
                                    </a>
                                    <a class="nav-link" href="{{ route('member.loan.create') }}">
                                        <div class="sb-nav-link-icon"><i class="fas fa-dollar"></i></div>
                                        New Loan
                                    </a>
                                    <a class="nav-link" href="{{ route('member.loan-balance-index') }}">
                                        <div class="sb-nav-link-icon"><i class="fas fa-wallet"></i></div>
                                        Loan Balance
                                    </a>
                                    <a class="nav-link" href="{{ route('member.loan-current') }}">
                                        <div class="sb-nav-link-icon"><i class="fas fa-file-invoice"></i></div>
                                        Currently Monthly Payments
                                    </a>
                                </nav>
                            </div>

                            {{-- Email Notifications --}}
                            {{-- <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-bell"></i></div>
                                Email Notifications
                            </a> --}}

                            {{-- Personal Information --}}
                            {{-- <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Personal Information
                            </a> --}}
                        </div>
                    @endif
                    @if (auth()->user()->role === "admin")
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menus</div>
                            <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="true" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Manage Users
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse show" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('admin.member.index') }}">
                                        <div class="sb-nav-link-icon"><i class="fas fa-eye"></i></div>
                                        View Members
                                    </a>
                                    <a class="nav-link" href="{{ route('admin.member.create') }}">
                                        <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                                        Create Member
                                    </a>
                                </nav>
                            </div>
        
                            <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="true" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
                                Notification
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse show" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('admin.notifications') }}">
                                        <div class="sb-nav-link-icon"><i class="fas fa-bell"></i></div>
                                        Email
                                    </a>
                                </nav>
                            </div>

                            {{-- Load Management --}}
                            <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="true" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-credit-card"></i></div>
                                Loan Management
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse show" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('admin.loan.lists') }}">
                                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                        Loan Lists
                                    </a>
                                    <a class="nav-link" href="{{ route('admin.loan-request.index') }}">
                                        <div class="sb-nav-link-icon"><i class="fas fa-bell"></i></div>
                                        Borrowers
                                    </a>
                                    <a class="nav-link" href="{{ route('admin.loan-payment-index') }}">
                                        <div class="sb-nav-link-icon"><i class="fas fa-dollar"></i></div>
                                        Payments
                                    </a>
                                    {{-- <a class="nav-link" href="{{ route('admin.savings.index') }}">
                                        <div class="sb-nav-link-icon"><i class="fas fa-bank"></i></div>
                                        Savings
                                    </a> --}}
                                </nav>
                            </div>
                        </div>
                    @endif
                @endauth
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">