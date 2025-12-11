{{-- resources/views/layouts/header.blade.php --}}
<header class="main-header">
    <!-- Left Side -->
    <div class="header-left">
        {{-- <button class="sidebar-toggle" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button> --}}
         <button id="hideSidebarToggle" class="sidebar-toggle">
         <i class="fas fa-bars"></i>
    </button>
        <div class="header-breadcrumb">
            <h4 class="mb-0" style="color: var(--primary-blue); font-weight: 600;">
                @yield('page-title', 'EventHub')
            </h4>
        </div>
    </div>

    <!-- Right Side -->
    <div class="header-right">
        <!-- Search Bar (Hidden on mobile) -->
       

        {{-- <!-- Notifications -->
        <div class="dropdown">
            <button class="header-icon" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-bell"></i>
                <span class="notification-badge"></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end glass-card" style="min-width: 300px; border: none;">
                <li class="dropdown-header d-flex justify-content-between align-items-center">
                    <span style="font-weight: 600;">Notifications</span>
                    <span class="badge bg-primary rounded-pill">3</span>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item d-flex align-items-center py-3" href="#">
                        <div class="me-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center" 
                                 style="width: 40px; height: 40px; background: rgba(34, 197, 94, 0.1);">
                                <i class="fas fa-user-plus text-success"></i>
                            </div>
                        </div>
                        <div>
                            <div class="fw-semibold">New inquiry received</div>
                            <div class="text-muted small">2 minutes ago</div>
                        </div>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item d-flex align-items-center py-3" href="#">
                        <div class="me-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center" 
                                 style="width: 40px; height: 40px; background: rgba(59, 130, 246, 0.1);">
                                <i class="fas fa-calendar text-primary"></i>
                            </div>
                        </div>
                        <div>
                            <div class="fw-semibold">Event scheduled</div>
                            <div class="text-muted small">1 hour ago</div>
                        </div>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item d-flex align-items-center py-3" href="#">
                        <div class="me-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center" 
                                 style="width: 40px; height: 40px; background: rgba(245, 158, 11, 0.1);">
                                <i class="fas fa-cog text-warning"></i>
                            </div>
                        </div>
                        <div>
                            <div class="fw-semibold">System update available</div>
                            <div class="text-muted small">3 hours ago</div>
                        </div>
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item text-center py-2 fw-semibold" href="#">
                        View all notifications
                    </a>
                </li>
            </ul>
        </div> --}}

        <!-- Settings -->
        {{-- <button class="header-icon" data-bs-toggle="modal" data-bs-target="#settingsModal">
            <i class="fas fa-cog"></i>
        </button> --}}

        <!-- User Profile Dropdown -->
        <div class="dropdown user-dropdown">
            <button class="user-avatar" data-bs-toggle="dropdown" aria-expanded="false">
                {{ auth()->check() ? strtoupper(substr(auth()->user()->name ?? 'Admin', 0, 1)) : 'A' }}
            </button>
            <ul class="dropdown-menu dropdown-menu-end glass-card" style="min-width: 200px; border: none;">
                <li class="dropdown-header">
                    <div class="d-flex align-items-center">
                        <div class="user-avatar me-3" style="width: 50px; height: 50px;">
                            {{ auth()->check() ? strtoupper(substr(auth()->user()->name ?? 'Admin', 0, 1)) : 'A' }}
                        </div>
                        <div>
                            <div class="fw-semibold">{{ auth()->user()->name ?? 'Admin User' }}</div>
                            <div class="text-muted small">Administrator</div>
                        </div>
                    </div>
                </li>
                <li><hr class="dropdown-divider"></li>
               
                {{-- <li>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <i class="fas fa-cog me-2"></i>
                        Settings
                    </a>
                </li> --}}
                {{-- <li>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <i class="fas fa-question-circle me-2"></i>
                        Help
                    </a>
                </li> --}}
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form action="{{ route('logout') }}" method="get">
                        @csrf
                        <button type="submit" class="dropdown-item d-flex align-items-center text-danger">
                            <i class="fas fa-sign-out-alt me-2"></i>
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>

<!-- Settings Modal -->
<div class="modal fade" id="settingsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content glass-card border-0">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold">Settings</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-4">
                    <h6 class="fw-semibold mb-3">Theme Settings</h6>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="darkMode">
                        <label class="form-check-label" for="darkMode">Dark Mode</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="sidebarCollapsed">
                        <label class="form-check-label" for="sidebarCollapsed">Collapsed Sidebar</label>
                    </div>
                </div>
                <div class="mb-4">
                    <h6 class="fw-semibold mb-3">Notifications</h6>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="emailNotifications" checked>
                        <label class="form-check-label" for="emailNotifications">Email Notifications</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="pushNotifications" checked>
                        <label class="form-check-label" for="pushNotifications">Push Notifications</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<style>
    /* Enhanced dropdown animations */
    .dropdown-menu {
        animation: dropdownSlide 0.3s ease-out;
        transform-origin: top;
    }

    @keyframes dropdownSlide {
        from {
            opacity: 0;
            transform: translateY(-10px) scale(0.95);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    /* Enhanced header icons */
    .header-icon {
        position: relative;
        overflow: hidden;
    }

    .header-icon::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: radial-gradient(circle, rgba(30, 58, 138, 0.2) 0%, transparent 70%);
        transition: all 0.4s ease;
        transform: translate(-50%, -50%);
        border-radius: 50%;
    }

    .header-icon:hover::before {
        width: 100px;
        height: 100px;
    }

    /* User avatar enhanced animation */
    .user-avatar {
        position: relative;
        overflow: hidden;
    }

    .user-avatar::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
        transition: left 0.6s ease;
    }

    .user-avatar:hover::before {
        left: 100%;
    }

    /* Enhanced search bar */
    .header-search .form-control {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .header-search .form-control:focus {
        transform: scale(1.02);
        background: rgba(30, 58, 138, 0.08) !important;
    }
</style>