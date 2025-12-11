<!DOCTYPE html>
<html>

<head>
    <title>{{ $event->name }} - Ticket</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: DejaVu Sans, Arial, Helvetica, sans-serif;
            background-color: #e8eaf6;
            padding: 40px 20px;
        }

        /* Main Ticket Container */
        .ticket-container {
            width: 100%;
            max-width: 700px;
            margin: 0 auto;
        }

        /* Ticket Shape with Cutouts */
        .ticket-wrapper {
            background-color: #ffffff;
            border-radius: 20px;
            overflow: hidden;
            border: 3px solid #1a237e;
            position: relative;
        }

        /* Header Section - Dark Blue */
        .ticket-header {
            background-color: #1a237e;
            color: #ffffff;
            padding: 30px 25px;
            text-align: center;
            position: relative;
        }

        .ticket-header::before {
            content: "★ ★ ★";
            position: absolute;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 10px;
            letter-spacing: 10px;
            color: #ffd700;
        }

        .event-badge {
            display: inline-block;
            background-color: #ffd700;
            color: #1a237e;
            padding: 6px 20px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 12px;
        }

        .event-title {
            font-size: 26px;
            font-weight: bold;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #ffffff;
        }

        .event-subtitle {
            font-size: 12px;
            color: #90caf9;
            margin-top: 8px;
            letter-spacing: 1px;
        }

        /* Content Table */
        .content-table {
            width: 100%;
            border-collapse: collapse;
        }

        /* Left Section - Details */
        .main-section {
            padding: 25px;
            vertical-align: top;
            width: 60%;
            background-color: #ffffff;
        }

        /* Perforation Column */
        .perforation {
            width: 30px;
            background-color: #f5f5f5;
            background-image: repeating-linear-gradient(to bottom,
                    #f5f5f5 0px,
                    #f5f5f5 8px,
                    #1a237e 8px,
                    #1a237e 10px,
                    #f5f5f5 10px,
                    #f5f5f5 18px);
            vertical-align: top;
            position: relative;
        }

        /* Circular Cutouts */
        .perforation::before,
        .perforation::after {
            content: "";
            position: absolute;
            width: 24px;
            height: 24px;
            background-color: #e8eaf6;
            border-radius: 50%;
            left: 3px;
        }

        .perforation::before {
            top: -12px;
        }

        .perforation::after {
            bottom: -12px;
        }

        /* Right Section - QR */
        .qr-section {
            padding: 25px 20px;
            text-align: center;
            vertical-align: top;
            background-color: #0d1442;
            width: 35%;
        }

        /* Detail Boxes - Blue Theme */
        .detail-box {
            background-color: #e3f2fd;
            border-left: 4px solid #1565c0;
            padding: 12px 15px;
            margin-bottom: 12px;
            border-radius: 0 8px 8px 0;
        }

        .detail-box.navy {
            background-color: #e8eaf6;
            border-left-color: #3949ab;
        }

        .detail-box.gold {
            background-color: #fff8e1;
            border-left-color: #ffc107;
        }

        .detail-label {
            font-size: 9px;
            color: #5c6bc0;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 4px;
            font-weight: bold;
        }

        .detail-value {
            font-size: 15px;
            color: #1a237e;
            font-weight: bold;
        }

        /* Ticket Count Box */
        .ticket-count-box {
            background-color: #1565c0;
            color: #ffffff;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
            margin-top: 12px;
            margin-bottom: 12px;
        }

        .ticket-count-label {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #90caf9;
        }

        .ticket-count-number {
            font-size: 32px;
            font-weight: bold;
            line-height: 1.2;
            color: #ffffff;
        }

        /* Booking ID Box */
        .booking-id-box {
            background-color: #0d1442;
            color: #ffffff;
            padding: 12px 15px;
            border-radius: 8px;
            text-align: center;
        }

        .booking-id-label {
            font-size: 9px;
            color: #90caf9;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .booking-id-value {
            font-size: 16px;
            font-weight: bold;
            color: #ffd700;
            letter-spacing: 2px;
        }

        /* QR Section Styling */
        .qr-title {
            color: #90caf9;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 12px;
        }

        .qr-box {
            background-color: #ffffff;
            padding: 12px;
            border-radius: 12px;
            display: inline-block;
            margin-bottom: 15px;
            border: 2px solid #ffd700;
        }

        .qr-box img {
            display: block;
        }

        .admit-badge {
            background-color: #ffd700;
            color: #1a237e;
            padding: 10px 20px;
            border-radius: 25px;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            display: inline-block;
            margin-top: 8px;
        }

        .admit-number {
            font-size: 18px;
        }

        .valid-text {
            color: #4caf50;
            font-size: 10px;
            margin-top: 12px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        /* Footer */
        .ticket-footer {
            background-color: #1a237e;
            padding: 15px 25px;
            text-align: center;
        }

        .footer-text {
            color: #90caf9;
            font-size: 11px;
            letter-spacing: 0.5px;
        }

        .footer-text strong {
            color: #ffd700;
        }

        /* Decorative Elements */
        .corner-decoration {
            position: absolute;
            width: 40px;
            height: 40px;
            border: 2px solid #ffd700;
            opacity: 0.3;
        }

        .corner-tl {
            top: 10px;
            left: 10px;
            border-right: none;
            border-bottom: none;
        }

        .corner-tr {
            top: 10px;
            right: 10px;
            border-left: none;
            border-bottom: none;
        }

        .corner-bl {
            bottom: 10px;
            left: 10px;
            border-right: none;
            border-top: none;
        }

        .corner-br {
            bottom: 10px;
            right: 10px;
            border-left: none;
            border-top: none;
        }

        /* Serial Number Strip */
        .serial-strip {
            background-color: #283593;
            padding: 8px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .serial-left,
        .serial-right {
            color: #90caf9;
            font-size: 9px;
            letter-spacing: 1px;
        }

        .serial-center {
            color: #ffd700;
            font-size: 10px;
            font-weight: bold;
            letter-spacing: 3px;
        }
    </style>
</head>

<body>
    <div class="ticket-container">
        <div class="ticket-wrapper">

            <!-- Header -->
            <div class="ticket-header">
                <div class="event-badge">OFFICIAL TICKET</div>
                <h1 class="event-title">{{ $event->name }}</h1>
                <p class="event-subtitle">Present this ticket at the venue entrance</p>
            </div>



            <!-- Main Content -->
            <table class="content-table">
                <tr>
                    <!-- Left Section - Details -->
                    <td class="main-section">

                        <!-- Name -->
                        <div class="detail-box">
                            <div class="detail-label">ATTENDEE NAME</div>
                            <div class="detail-value">{{ $booking->name }}</div>
                        </div>

                        <!-- Email -->
                        <div class="detail-box navy">
                            <div class="detail-label">EMAIL ADDRESS</div>
                            <div class="detail-value">{{ $booking->email }}</div>
                        </div>

                        <!-- Tickets Count -->
                        <div class="ticket-count-box">
                            <div class="ticket-count-label">Number of Tickets</div>
                            <div class="ticket-count-number">{{ $booking->total_tickets }}</div>
                        </div>

                        <!-- Booking ID -->
                        <div class="booking-id-box">
                            <div class="booking-id-label">Booking Reference ID</div>
                            <div class="booking-id-value">#{{ str_pad($booking->id, 6, '0', STR_PAD_LEFT) }}</div>
                        </div>

                    </td>

                    <!-- Perforation Line -->
                    <td class="perforation"></td>

                    <!-- Right Section - QR Code -->
                    <td class="qr-section">

                        <div class="qr-title">SCAN TO VERIFY</div>

                        <div class="qr-box">
                            <img src="data:image/png;base64,{{ $qrCode }}" width="130">
                        </div>

                        <div class="valid-text">✓ VERIFIED PASS</div>

                    </td>
                </tr>
            </table>

            <!-- Footer -->
            <div class="ticket-footer">
                <p class="footer-text">
                    <strong>Important:</strong> This ticket is non-transferable. Please carry a valid ID for
                    verification.
                </p>
            </div>

        </div>
    </div>
</body>

</html>