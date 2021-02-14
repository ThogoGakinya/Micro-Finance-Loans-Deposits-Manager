<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Deposit-Receipt</title>
    <style>
        body {
            font-family: "Courier New", Courier, "Lucida Sans Typewriter", "Lucida Typewriter", monospace !important;
            letter-spacing: -0.3px;
        }

        .invoice-wrapper {
            width: 700px;
            margin: auto;
        }

        .nav-sidebar .nav-header:not(:first-of-type) {
            padding: 1.7rem 0rem .5rem;
        }

        .logo {
            font-size: 50px;
        }

        .sidebar-collapse .brand-link .brand-image {
            margin-top: -33px;
        }

        .content-wrapper {
            margin: auto !important;
        }

        .billing-company-image {
            width: 50px;
        }

        .billing_name {
            text-transform: uppercase;
        }

        .billing_address {
            text-transform: capitalize;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            padding: 10px;
        }

        td {
            padding: 10px;
            vertical-align: top;
        }

        .row {
            display: block;
            clear: both;
        }

        .text-right {
            text-align: right;
        }

        .table-hover thead tr {
            background: #eee;
        }

        .table-hover tbody tr:nth-child(even) {
            background: #fbf9f9;
        }

        address {
            font-style: normal;
        }
        #bg-text {
            color: green;
            font-size: 42px !important;
            transform: rotate(-40deg);
            -webkit-transform: rotate(-40deg);
            opacity: 0.2;
            text-align: center;
            /*z-index:99;*/
        }
    </style>
</head>
<body>
<div class="row invoice-wrapper">
    <div class="col-md-12">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <tr>
                        <td>
                            <h4>
                                <span class="">
                                    <img
                                        src="https://rms.sopisystems.com/storage/84/60271199b1910_mucua_logo_borderless.png"
                                        alt="logo">
                                </span>

                            </h4>
                        </td>
                        <td class="text-right">
                            <img src="data:image/png;base64, {!! $qrcode !!}"><br>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <br><br>
        <div class="row invoice-info">
            <table class="table">
                <tr>
                    <td>
                        <div class="">
                            From:
                            <address>
                                <strong>MUCUA</strong><br>
                                123 Company Ave. <br>
                                Nairobi, Kenya<br>
                                Mobile: (254) 123-4567 <br>
                                Email: info@mucu.com <br>
                            </address>
                        </div>
                    </td>
                    <td>
                        <div class="">
                            To:
                            <address>
                                <strong class="billing_name">{{$userNames ?? ''}}</strong><br>
                                <span class="billing_address">#32, Nairobi, Hubli</span><br>
                                <span class="billing_gst">#TAXNUMBER</span><br>
                                Phone: +254-712-345-678<br>
                                Email: <u style="color: cornflowerblue">{{$userEmails ?? ''}}</u>
                            </address>
                        </div>
                    </td>
                    <td>
                        <div  class="text-right">
                            <strong>Date: {{$lastRecord->created_at->format('jS M-Y') ?? ''}}</strong><br>
                            <strong>Receipt #{{$lastRecord->id ?? ''}}</strong><br>
                            <p id="bg-text">
                                <strong> PAID</strong>
                            </p>
                        </div>
                    </td>
                </tr>
            </table>
            <!-- /.col -->
        </div>
        <br><br>
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-condensed table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>MPESA Transaction ID</th>
                        <th></th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>{{$lastRecord->transaction_id}}</td>
                        <td></td>
                        <td>Kshs. {{number_format($lastRecord->amount)}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.col -->

        </div>
        <br><br><br>
        <div>
            <small><small>NOTE: This is system generate receipt no need of signature</small></small>
        </div>
    </div>
</div>
</body>
</html>
