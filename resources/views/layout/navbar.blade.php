<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg mx-5 px-0 shadow-none rounded" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-1 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Dashboard</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                    {{ ucwords(str_replace(['/', '{id}'], [' ', ''], head(request()->segments()))) }}
                </li>
            </ol>
            <h6 class="font-weight-bold mb-0">
                {{ ucwords(str_replace(['/', '{id}'], [' ', ''], request()->route()->uri)) }}
                @if (request()->route()->hasParameter('id'))
                    ID : {{ request()->route('id') }}
                @endif
            </h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            </div>
            <ul class="navbar-nav  justify-content-end">
                <!-- Dropdown for Profile -->
                <li class="nav-item dropdown ps-2 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('../assets/img/team-2.jpg') }}" class="avatar avatar-sm" alt="avatar" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="profileDropdown">
                        <!-- Content for profile dropdown -->
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="#">
                                <div class="d-flex py-1">
                                    <div class="my-auto">
                                        <img src="{{ asset('../assets/img/team-2.jpg') }}" class="avatar avatar-sm border-radius-sm  me-3 ">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            {{ Auth::user()->name }}
                                        </h6>
                                        <p class="text-xs text-secondary mb-0 d-flex align-items-center">
                                            <i class="fa fa-envelope opacity-6 me-1"></i>
                                            {{ Auth::user()->email }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="mb-2">
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-sign-out-alt me-2"></i>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            Logout
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
