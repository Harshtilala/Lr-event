<div class="sidebar" id="sidebar">
    <!-- Sidebar Header -->
    
    <div class="sidebar-header">
        <div class="sidebar-logo">
            <i class="fas fa-tachometer-alt"></i>
        </div>
        <div class="sidebar-title">Admin Panel</div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
        <li>
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>
        
        <li>
            <a href="{{ route('categories') }}" class="{{ request()->routeIs('categories') ? 'active' : '' }}">
                <i class="fas fa-images"></i>
                <span>Category</span>
            </a>
        </li>
        <li>
            <a href="{{ route('events') }}" class="{{ request()->routeIs('events*') ? 'active' : '' }}">
                <i class="fas fa-calendar-alt"></i>
                <span>Events</span>
            </a>
        </li>   <li>
            <a href="{{ route('booking') }}" class="{{ request()->routeIs('booking*') ? 'active' : '' }}">
                <i class="fas fa-calendar-alt"></i>
                <span>Bookings</span>
            </a>
        </li>
        <li>
            <a href="{{ route('inquiries') }}" class="{{ request()->routeIs('inquiries*') ? 'active' : '' }}">
                <i class="fas fa-envelope"></i>
                <span>Inquiry</span>
            </a>
        </li>
    </ul>

    <!-- Sidebar Footer -->

</div>

<style>
    /* Additional sidebar animations for menu items */
    .sidebar-menu a {
        position: relative;
        
         z-index: 100;        
         
    }

    .sidebar-menu a::after {
        content: '';
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%) translateX(10px);
        width: 6px;
        height: 6px;
        background: var(--accent-blue);
        border-radius: 50%;
        opacity: 0;
        transition: all 0.3s ease;
    }

    .sidebar-menu a.active::after {
        opacity: 1;
        transform: translateY(-50%) translateX(0);
    }

    /* Ripple effect for menu items */
    .sidebar-menu a {
        overflow: hidden;
        position: relative;
    }

    .sidebar-menu a::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .sidebar-menu a:active::before {
        width: 300px;
        height: 300px;
    }

    /* Tooltip for collapsed sidebar */
    .sidebar.collapsed .sidebar-menu a {
        position: relative;
    }

    .sidebar.collapsed .sidebar-menu a::after {
        content: attr(data-tooltip);
        position: absolute;
        left: 100%;
        top: 50%;
        transform: translateY(-50%);
        background: var(--dark-blue);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        white-space: nowrap;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        margin-left: 1rem;
        font-size: 0.9rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        z-index: 1000;
    }

    .sidebar.collapsed .sidebar-menu a:hover::after {
        opacity: 1;
        visibility: visible;
    }

    /* Arrow for tooltip */
    .sidebar.collapsed .sidebar-menu a::before {
        content: '';
        position: absolute;
        left: calc(100% + 0.5rem);
        top: 50%;
        transform: translateY(-50%);
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 5px 8px 5px 0;
        border-color: transparent var(--dark-blue) transparent transparent;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        z-index: 1000;
    }

    .sidebar.collapsed .sidebar-menu a:hover::before {
        opacity: 1;
        visibility: visible;
    }
</style>

{{-- <script>
    // Add tooltips for collapsed sidebar
    document.addEventListener('DOMContentLoaded', function() {
        const menuLinks = document.querySelectorAll('.sidebar-menu a');
        
        menuLinks.forEach(link => {
            const text = link.querySelector('span').textContent;
            link.setAttribute('data-tooltip', text);
        });
    });
</script> --}}