<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('lte') }}/dist/img/Logo.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-light">App</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('lte') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ Route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" class="nav-link">
                        @csrf
                        <a href="route('logout')"
                            onclick="event.preventDefault();
                                this.closest('form').submit();">
                            <i class="nav-icon fas fa-power-off"></i>
                            <p>
                                Log Out
                            </p>
                        </a>
                    </form>
                </li>
                <li class="nav-header">MENU</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Master
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ Route('user') }}" class="nav-link">
                                <i class="far fa-user nav-icon"></i>
                                <p>User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('division') }}" class="nav-link">
                                <i class="fas fa-project-diagram nav-icon"></i>
                                <p>Division</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-ellipsis-h nav-icon"></i>
                                <p>
                                    Company Name
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ Route('shipper') }}" class="nav-link">
                                        <i class="fas fa-ship nav-icon"></i>
                                        <p>Shipper</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ Route('undernameMbl') }}" class="nav-link">
                                        <i class="fas fa-file-signature nav-icon"></i>
                                        <p>Undername M-BL / Booking</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ Route('undernameHbl') }}" class="nav-link">
                                        <i class="fas fa-file-signature nav-icon"></i>
                                        <p>Undername H-BL / PEB</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('mandatoryTax') }}" class="nav-link">
                                <i class="fas fa-money-check nav-icon"></i>
                                <p>Mandatory Tax</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ Route('containerSizeType') }}" class="nav-link">
                                <i class="fas fa-box nav-icon"></i>
                                <p>Container Size Type </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ Route('typePackaging') }}" class="nav-link">
                                <i class="fas fa-box-open nav-icon"></i>
                                <p>Type Packaging</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ Route('typeWeight') }}" class="nav-link">
                                <i class="fas fa-weight nav-icon"></i>
                                <p>Type Weight</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ Route('typeMeasurement') }}" class="nav-link">
                                <i class="fas fa-ruler-combined nav-icon"></i>
                                <p>Type Measurement</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ Route('typeCurrency') }}" class="nav-link">
                                <i class="fas fa-money-bill-wave nav-icon"></i>
                                <p>Type Currency</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ Route('typeBillOfLading') }}" class="nav-link">
                                <i class="fas fa-file-invoice nav-icon"></i>
                                <p>Type Bill Of Lading</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ Route('typePayment') }}" class="nav-link">
                                <i class="fas fa-handshake nav-icon"></i>
                                <p>Payment Information</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-ellipsis-h nav-icon"></i>
                                <p>
                                    Category Buy & Sell
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ Route('categoryBuying') }}" class="nav-link">
                                        <i class="fas fa-cart-plus nav-icon"></i>
                                        <p>Buying</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ Route('categorySelling') }}" class="nav-link">
                                        <i class="fas fa-cart-arrow-down nav-icon"></i>
                                        <p>Selling</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Accounting
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Marketing
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('jobSheet') }}" class="nav-link">
                                <i class="far fa-file-alt nav-icon"></i>
                                <p>Job Sheet</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Customer Service
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Operational
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Finance
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Report
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
