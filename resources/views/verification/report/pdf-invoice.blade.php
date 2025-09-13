<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $filename ?? 'ID Card Invoice' }}</title>
    <style>
        table,
        th,
        td {
            border: 1px solid;
            border-collapse: collapse;
        }

        table {
            font-size: 10px;
            border-collapse: collapse;
            width: 100%;
            /* table-layout: fixed; */
            /* white-space:  nowrap !important; */
        }

        td,
        th {
            /* border: 1px solid black; */
            padding: 3px;
            /* white-space:  nowrap !important; */
        }

        th {
            border-bottom: 1px solid black;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        @page {
            footer: page-footer;
        }

        .statement-header {
            text-align: center;
            font-weight: bold;
            margin-bottom: 10px
        }


        .float-container {
            border: 1px solid;
            padding: 2px;
            height: 80px;
        }

        .float-child {
            width: 49%;
            float: left;
            padding: 2px;
            border: 2px;
        }

        .float-container span {
            font-size: 18px;
            padding-right: 30px;
            color: darkgreen;
            padding-left: 30px;

        }
    </style>
</head>

<body>
    <div class="statement-header"><img src="{{ asset('assets/images/logo.png') }}" height="70px" /></div>
    <div class="statement-header"></div>
    <div class="statement-header">
        BUK Alumni Association
        <br> ID Card Payment Invoice

    </div>
    <div class="statement-header">
        <h3>

            Invoice Slip
            {{-- @foreach ($papers as $item) --}}
            {{-- {{ $papers->papertype }} Summary of {{ $category }} Based Documents Per Unit --}}
            {{-- @endforeach --}}
        </h3>

    </div>

    <div>
        {{ $fullname }}. <br>
        {{ $regno }} <br>
        @foreach ($payments as $item)
            {{ '(' . $item->payment_reference . ')' }}
        @endforeach


    </div>
    <div>
        <p>
        <h4 style="text-align: center"> BUKAA PERSONALISED PAYMENT FORM
        </h4>

        <hr>

        <h4 style="text-align:center">
            <===== Instructions=====>
        </h4>


        <ul>
            <li>Proceed to Pay Online with your card at online.</li>
            <li>Indicate your payment reference during any payment complaint .</li>
            <li>REMEMBER: Invoice has already been generated for you.</li>
        </ul>

        </p>

        <p style="text-align:center;">
            @foreach ($payments as $item)
                <span><b>Payment Invoice: {{ $item->payment_reference }}</b></span> <br>
                <span> <b>Amount to Pay (₦):
                        {{ number_format($item->amount - $item->paystack_commission, 2) }}</b></span>
            @endforeach

        </p>

    </div>








    {{-- <h5>TRANSACTIONS SUMMARY</h5>
    <p>Number of Documents: {{ $total_documents }}</p> --}}


</body>

</html>
