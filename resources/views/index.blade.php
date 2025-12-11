@extends('admin.layouts.master')

{{-- resources/views/dashboard.blade.php --}}

@section('title', 'Dashboard - Admin Panel')
@section('page-title', 'Dashboard')

@section('content')
<div class="container-fluid dashboard-wrapper">
    <!-- Stats Overview -->
    <div class="row stats-container">
        <!-- Total Users Card -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="stat-card card-1">
                <div class="card-inner">
                    <div class="stat-icon-wrapper users-icon">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none">
                            <circle cx="20" cy="18" r="8" fill="currentColor"/>
                            <path d="M8 35c0-6 5-10 12-10s12 4 12 10v8c0 2-1 3-3 3H11c-2 0-3-1-3-3v-8z" fill="currentColor"/>
                            <circle cx="40" cy="16" r="7" fill="currentColor" opacity="0.6"/>
                            <path d="M30 32c0-5 4-9 10-9s10 4 10 9v7c0 2-1 3-2 3H32c-1 0-2-1-2-3v-7z" fill="currentColor" opacity="0.6"/>
                        </svg>
                    </div>
                    <div class="stat-content">
                        <h6 class="stat-label">Total Users</h6>
                        <h2 class="stat-value">{{ $totalUsers ?? 0 }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Bookings Card -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="stat-card card-2">
                <div class="card-inner">
                    <div class="stat-icon-wrapper bookings-icon">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none">
                            <rect x="12" y="10" width="36" height="38" rx="2" fill="none" stroke="currentColor" stroke-width="2"/>
                            <path d="M18 16h24M18 24h24M18 32h18M18 40h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <circle cx="45" cy="38" r="8" fill="currentColor" opacity="0.8"/>
                            <path d="M42 36v5M45 33v10" stroke="white" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <div class="stat-content">
                        <h6 class="stat-label">Total Bookings</h6>
                        <h2 class="stat-value">{{ $totalBookings ?? 0 }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Events Card -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="stat-card card-3">
                <div class="card-inner">
                    <div class="stat-icon-wrapper events-icon">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none">
                            <circle cx="30" cy="30" r="20" fill="none" stroke="currentColor" stroke-width="2"/>
                            <path d="M30 18v12l8 8" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <circle cx="30" cy="30" r="4" fill="currentColor"/>
                        </svg>
                    </div>
                    <div class="stat-content">
                        <h6 class="stat-label">Total Events</h6>
                        <h2 class="stat-value">{{ $totalEvents ?? 0 }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Inquiries Card -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="stat-card card-4">
                <div class="card-inner">
                    <div class="stat-icon-wrapper inquiries-icon">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none">
                            <rect x="10" y="15" width="40" height="28" rx="2" fill="none" stroke="currentColor" stroke-width="2"/>
                            <path d="M10 15l20 16l20-16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <circle cx="30" cy="45" r="5" fill="currentColor" opacity="0.6"/>
                            <path d="M30 50v4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <div class="stat-content">
                        <h6 class="stat-label">Total Inquiries</h6>
                        <h2 class="stat-value">{{ $totalInquiry ?? 0 }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .dashboard-wrapper {
        background: #f5f7fa;
        min-height: 100vh;
        padding: 30px 15px;
    }

    .stats-container {
        margin: 0 -15px;
    }

    /* Stat Card Base Styling */
    .stat-card {
        height: 170px;
        border-radius: 20px;
        position: relative;
        overflow: hidden;
        background: white;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
    }

    /* Card Borders with Attractive Colors */
    .card-1 {
        border: 3px solid #667eea;
        border-left: 8px solid #667eea;
    }

    .card-2 {
        border: 3px solid #f5576c;
        border-left: 8px solid #f5576c;
    }

    .card-3 {
        border: 3px solid #4facfe;
        border-left: 8px solid #4facfe;
    }

    .card-4 {
        border: 3px solid #43e97b;
        border-left: 8px solid #43e97b;
    }

    .card-inner {
        position: relative;
        z-index: 2;
        display: flex;
        align-items: center;
        gap: 25px;
        padding: 25px;
        height: 100%;
    }

    /* Icon Wrapper */
    .stat-icon-wrapper {
        width: 70px;
        height: 7   0px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        position: relative;
    }

    /* Icon Background Colors */
    .card-1 .stat-icon-wrapper {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .card-2 .stat-icon-wrapper {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
    }

    .card-3 .stat-icon-wrapper {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        color: white;
    }

    .card-4 .stat-icon-wrapper {
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        color: white;
    }

    .stat-icon-wrapper svg {
        width: 50px;
        height: 50px;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
    }

    /* Content */
    .stat-content {
        flex: 1;
    }

    .stat-label {
        font-size: 13px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #6c757d;
        margin-bottom: 8px;
    }

    .stat-value {
        font-size: 42px;
        font-weight: 700;
        margin-bottom: 10px;
        color: #2d3748;
    }

    /* Card Specific Label Colors */
    .card-1 .stat-value {
        color: #667eea;
    }

    .card-2 .stat-value {
        color: #f5576c;
    }

    .card-3 .stat-value {
        color: #4facfe;
    }

    .card-4 .stat-value {
        color: #43e97b;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .stat-card {
            height: 180px;
        }

        .stat-icon-wrapper {
            width: 80px;
            height: 80px;
        }

        .stat-icon-wrapper svg {
            width: 40px;
            height: 40px;
        }

        .stat-value {
            font-size: 32px;
        }

        .card-inner {
            padding: 20px;
            gap: 15px;
        }
    }
</style>

@endsection