<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $filename ?? 'Notification' }}</title>
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
    <div class="statement-header"><img src="{{ asset('img/my-logo-3.jpg') }}" height="70px" /></div>
    <div class="statement-header"></div>
    <div class="statement-header" style="color:green;">
        Nigerian Institute of Transport Techonology, Zaria
        <br> Verification Certificate
    </div>
    <div class="statement-header">
        <h3>

            Confirmation of Certificate

        </h3>

    </div>

    <div style="font-style: italic;">

        @foreach ($data as $item)
            {{ $item->fullname }}. <br>
            {{ $item->programme }} <br>
            {{ $item->certificate_no }} <br>
            {{ $item->file_no }} <br>
            {{ $item->organization }} <br>
            {{ $item->location }} <br>
            {{ $item->month }} <br>
            @if ($item->isBlocked == 1)
                <span style="color:red;">Certificate Cancelled</span>
            @endif
        @endforeach


    </div>
    <div>
        <p>
        <h4 style="text-align: center;color:goldenrod"> BUKAA PERSONALISED PAYMENT FORM
        </h4>

        <hr>




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
