<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>Deposit Receipt</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <style>
        .text-right {
            text-align: right;
        }
    </style>

</head>
<body class="login-page" style="background: white">

<div>
    <div class="row">
        <div class="col-xs-7">
            <h4>From:</h4>
            <strong>MUCUA</strong><br>
            123 Company Ave. <br>
            Nairobi, Kenya<br>
            Mobile: (254) 123-4567 <br>
            E: info@mucu.com <br>
            <br>
        </div>

        <div class="col-xs-4">
            <img src="https://rms.sopisystems.com/storage/84/60271199b1910_mucua_logo_borderless.png" alt="logo">
        </div>
    </div>

    <div style="margin-bottom: 0px">&nbsp;</div>

    <div class="row">
        <div class="col-xs-6">
            <h4>To:</h4>
            <address>
                <strong>{{$lastRecord->account->account_name ?? ''}}</strong><br>
                <span>alfred@mucu.com</span> <br>
                <span>123 Address St.</span>
            </address>
        </div>

        <div class="col-xs-5">
            <br>
            <table style="width: 100%">
                <tbody>
                <tr>
                    <th>Receipt #:</th>
                    <td class="text-right">{{$lastRecord->id}}</td>
                </tr>
                <tr>
                    <th> Receipt Date: </th>
                    <td class="text-right">{{$lastRecord->created_at->format('jS M-Y') ?? ''}}</td>
                </tr>
                </tbody>
            </table>

            <div style="margin-bottom: 0px">&nbsp;</div>

        <!-- <table style="width: 100%; margin-bottom: 20px">
                <tbody>
                <tr class="well" style="padding: 5px">
                    <th style="padding: 3px"><div> Total Amount Paid </div></th>
                    <td style="padding: 3px" class="text-right"><strong> Kshs. {{number_format($lastRecord->amount ?? '')}} </strong></td>
                    <th style="padding: 3px"><div> MPESA Transaction ID </div></th>
                    <td style="padding: 3px" class="text-right text-green"><strong> Kshs. {{$lastRecord->transaction_id ?? ''}} </strong></td>
                </tr>
                </tbody>
            </table> -->
        </div>
    </div>

    <table class="table">
        <thead style="background: #F5F5F5;">
        <tr>
            <th>Traction ID</th>
            <th>Transaction Time</th>
            <th class="text-right">Amount</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$lastRecord->transaction_id ?? ''}}</td>
            <td>{{$lastRecord->created_at ?? ''}}</td>
            <td class="text-right">Kshs. {{number_format($lastRecord->amount ?? '')}}</td>
        </tr>
        </tbody>
    </table>
    <div style="margin-bottom: 0px">&nbsp;</div>

    <div class="row">
        <div class="col-xs-8 invbody-terms text-sm-center">
            Thank you for your. <br>
            <br>
            <h4>Payment Terms</h4>
            <p><i>Payment Terms to Go here...............</i></p>
        </div>
    </div>
</div>

</body>
</html>
