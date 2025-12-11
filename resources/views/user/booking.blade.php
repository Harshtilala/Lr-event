@extends('user.layouts.master')

@section('content')
<title>Book {{ $event->name }}</title>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Roboto', sans-serif;
        background: #f1f3f6;
        color: #212121;
    }

    /* Responsive Container */
    .booking-container {
        max-width: 1200px;
        margin: 40px auto;
        padding: 0 20px;
    }

    @media(max-width:768px) {
        .booking-grid {
            grid-template-columns: 1fr !important;
        }
    }

    /* Modern Header & Cards */
    .booking-header,
    .booking-form-section,
    .order-summary {
        background: white;
        padding: 30px;
        border-radius: 18px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        transition: .3s;
        margin-bottom: 15px;
    }

    .booking-header:hover,
    .booking-form-section:hover,
    .order-summary:hover {
        transform: translateY(-3px);
    }

    .booking-grid {
        display: grid;
        grid-template-columns: 1fr 380px;
        gap: 20px;
    }

    /* Section Title */
    .form-section-title {
        font-size: 1.3rem;
        font-weight: 500;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #2874f0;
    }

    /* Form Labels + Rounded Inputs */
    .form-label {
        font-size: .9rem;
        font-weight: 500;
        margin-bottom: 8px;
        display: block;
    }

    .form-label.required::after {
        content: ' *';
        color: #ff6161;
    }

    .form-control {
        width: 100%;
        padding: 13px 18px;
        border: 1px solid #c2c2c2;
        border-radius: 50px;
        /* MUCH MORE ROUNDED */
        font-size: .95rem;
        transition: .3s;
        background: #fafafa;
    }

    .form-control:focus {
        border-color: #2874f0;
        background: white;
        box-shadow: 0 0 12px rgba(40, 116, 240, .25);
        transform: scale(1.02);
    }

    /* Ticket Selector */
    .ticket-selector {
        display: flex;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .ticket-btn {
        width: 45px;
        height: 45px;
        border: 1px solid #c2c2c2;
        background: white;
        font-size: 1.4rem;
        font-weight: bold;
        border-radius: 50%;
        cursor: pointer;
        transition: .3s;
    }

    .ticket-btn:hover {
        background: #2874f0;
        color: white;
        transform: scale(1.12);
    }

    .ticket-count {
        font-size: 1.6rem;
        font-weight: 600;
        min-width: 50px;
        text-align: center;
    }

    /* Summary */
    .order-summary {
        position: sticky;
        top: 20px;
    }

    .summary-title {
        font-size: 1.2rem;
        font-weight: 500;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 1px solid #f0f0f0;
    }

    .event-summary-image {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border-radius: 14px;
        margin-bottom: 15px;
    }

    .price-row {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
    }

    .price-row.total {
        border-top: 2px solid #f0f0f0;
        margin-top: 10px;
        padding-top: 15px;
        font-size: 1.1rem;
        font-weight: 600;
    }

    /* Button */
    .btn-submit {
        width: 100%;
        padding: 16px;
        background: #ff9f00;
        color: white;
        border: none;
        font-size: 1rem;
        border-radius: 50px;
        cursor: pointer;
        transition: .3s;
    }

    .btn-submit:hover {
        background: #e68a00;
        transform: scale(1.04);
    }

    /* Toast fix for mobile */
    @media(max-width:500px) {
        .toast {
            width: 90%;
        }
    }
</style>

<div class="booking-container">

    <!-- PAGE HEADER -->
    <div class="booking-header mb-6">
        <h1>Complete Your Booking</h1>
        <p>Fill in your details to book tickets for {{ $event->name }}</p>
    </div>

    <!-- TOASTER AREA -->
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 99999">
        @if(session('success'))<div class="position-fixed top-0 end-0 p-3" style="z-index: 99999">

            {{-- Success Toast (Green) --}}
            @if(session('success'))
            <div class="toast text-bg-success show mb-2">
                <div class="d-flex">
                    <div class="toast-body">
                        ✔ {{ session('success') }}
                    </div>
                    <button class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
            @endif

            {{-- Error Toast (Red) --}}
            @if(session('error'))
            <div class="toast text-bg-danger show mb-2">
                <div class="d-flex">
                    <div class="toast-body">
                        ⚠ {{ session('error') }}
                    </div>
                    <button class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
            @endif

            {{-- Validation Errors (Red) --}}
            @if($errors->any())
            <div class="toast text-bg-danger show mb-2">
                <div class="d-flex">
                    <div class="toast-body">
                        @foreach($errors->all() as $err)
                        • {{ $err }} <br>
                        @endforeach
                    </div>
                    <button class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
            @endif

        </div>

        <div class="toast text-bg-success show" id="toastMessage">
            <div class="d-flex">
                <div class="toast-body">✔ {{ session('success') }}</div>
                <button class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
        @endif

        @if(session('error'))
        <div class="toast text-bg-danger show" id="toastMessage">
            <div class="d-flex">
                <div class="toast-body">⚠ {{ session('error') }}</div>
                <button class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
        @endif

        @if($errors->any())
        <div class="toast text-bg-danger show" id="toastMessage">
            <div class="d-flex">
                <div class="toast-body">
                    @foreach($errors->all() as $err)
                    • {{ $err }} <br>
                    @endforeach
                </div>
                <button class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
        @endif
    </div>

    <!-- ===================== FORM ===================== -->
    <form action="{{ route('event.booking.store', $event->id) }}" method="POST">
        @csrf

        <div class="booking-grid">

            <!-- LEFT: FORM -->
            <div class="booking-form-section">

                <h2 class="form-section-title">Enter Details For Book Ticket</h2>

                <div class="form-group">
                    <label class="form-label required">Full Name</label>
                    <input type="text" name="customer_name" class="form-control" placeholder="Enter your full name"
                        value="{{ old('customer_name') }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label required">Email Address</label>
                    <input type="email" name="customer_email" class="form-control" placeholder="example@mail.com"
                        value="{{ old('customer_email') }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label required">Phone Number</label>
                    <input type="number" name="customer_phone" class="form-control" placeholder="Enter your phone number"
                        pattern="\d{10}" value="{{ old('customer_phone') }}" maxlength="10" required>
                </div>

                <div class="form-group">
                    <label class="form-label required">Number of Tickets</label>
                    <div class  ="ticket-selector">
                        <button type="button" class="ticket-btn" id="decreaseTicket">-</button>
                        <span class="ticket-count" id="ticketCount">1</span>
                        <button type="button" class="ticket-btn" id="increaseTicket">+</button>
                        <input type="hidden" name="num_tickets" id="numTicketsInput" value="1">
                    </div>
                </div>
            </div>
            <!-- RIGHT: SUMMARY -->
            <div class="order-summary">
                <h2 class="summary-title">Order Summary</h2>
                @php
                $images = json_decode($event->image, true);
                $firstImage = $images[0] ?? null;
                @endphp

                @if($firstImage)
                <img src="{{ asset('event/'.$firstImage) }}" class="event-summary-image">
                @endif

                <h4>{{ $event->name }}</h4>

                <div class="price-breakdown">
                    <div class="price-row">
                        <span>Ticket Price ₹{{ $event->price }} × <span id="summaryTicketCount">1</span></span>
                    </div>

                    <div class="price-row total">
                        <span>Total</span>
                        <span id="summarySubtotal">₹{{ number_format($event->price, 2) }}</span>
                    </div>
                </div>

                <button type="submit" class="btn-submit">
                    {{ $event->price > 0 ? "Proceed to Payment" : "Confirm Booking" }}
                </button>
{{-- 
                <img src="data:image/svg+xml;base64,{{ $qrCode }}" width="200"> --}}

            </div>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- AUTO REMOVE TOAST -->
<script>
    setTimeout(() => {
    const toast = document.getElementById("toastMessage");
    if (toast) {
        const bsToast = bootstrap.Toast.getOrCreateInstance(toast);
        bsToast.hide();
    }
}, 3000);
</script>

<!-- FIXED TICKET SELECTOR JS -->
<script>
    const price = {{ $event->price }};
const maxTickets = Math.min(10, {{ $event->num_tickets  }});

let current = 1;

const ticketCount = document.getElementById('ticketCount');
const summaryCount = document.getElementById('summaryTicketCount');
const summarySubtotal = document.getElementById('summarySubtotal');
const inputTickets = document.getElementById('numTicketsInput');

document.getElementById('increaseTicket').onclick = function () {
    if (current < maxTickets) {
        current++;
        update();
    }
};

document.getElementById('decreaseTicket').onclick = function () {
    if (current > 1) {
        current--;
        update();
    }
};

function update() {
    ticketCount.textContent = current;
    summaryCount.textContent = current;
    inputTickets.value = current;

    summarySubtotal.textContent = "₹" + (price * current).toFixed(2);
}
</script>

@endsection