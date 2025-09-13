<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $filename ?? 'Form Invoice' }}</title>
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
    <div class="statement-header" style="color:green;">
        BUK Alumni Association
        <br> ID Card Payment Receipt

    </div>
    <div class="statement-header">
        <h3>

            Payment Receipt

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
        <h4 style="text-align: center;color:goldenrod"> BUKAA PERSONALISED PAYMENT FORM
        </h4>

        <hr>

        <table style="font-size: 16px'">
            <thead>
                <tr>
                    <td style="width:10px;">S/N</td>
                    <td style="width:300px;">Item</td>
                    <td style="width:60px;">Amount</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="width:10px;">1</td>
                    <td style="width:300px;">Payment Fees for Application Form</td>
                    @foreach ($payments as $item)
                        <td style="width:60px;">{{ number_format($item->amount - $item->paystack_commission, 2) }}</td>
                    @endforeach

                </tr>
            </tbody>

        </table>


        </p>


        <p style="text-align: justify;">
            @foreach ($payments as $item)
                The sum of ₦ {{ number_format($item->amount - $item->paystack_commission, 2) }} was paid to <b> BUKAA
                </b>
                in respect of ID Card via Paystack with payment reference
                <b>{{ $item->payment_reference }}</b>
            @endforeach

        </p>


    </div>

    <div>
        <p>
            <b> FEES ARE NOT REFUNDABLE AFTER PAYMENT</b>
        </p>
    </div>



    {{-- <h5>TRANSACTIONS SUMMARY</h5>
    <p>Number of Documents: {{ $total_documents }}</p> --}}






    {{-- <h5>TRANSACTIONS SUMMARY</h5>
    <p>Number of Documents: {{ $total_documents }}</p> --}}


</body>

</html>
