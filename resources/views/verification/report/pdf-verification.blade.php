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
        <h2> Nigerian Institute of Transport Technology (NITT)</h2>
    </div>

    <div class="statement-header">

        <h2>

            CNG – Certificate Verification Slip

        </h2>
    </div>

    <div style="font-style: italic;">
        <h3>Certificate Holder Information</h3>
        @foreach ($data as $item)
            <b>Name: </b> {{ $item->fullname }}. <br>
            <b>Organisation: </b> {{ $item->organization }} <br>
            <b>Course: </b> {{ $item->programme }} <br>
            <b>Year / Month: </b> {{ $item->year }} <br>
            <b>Location: </b> {{ $item->location }} <br>
            <b>File No: </b>{{ $item->file_no }} <br>
            <b>Certificate Serial No: </b> {{ $item->certificate_no }} <br>
            <b>Registration Number: </b> {{ $item->regno }} <br>
        @endforeach

        <hr>
    </div>
    <div style="text-align:justify;">
        <p>
            <b>Note: </b> <br>

            This certificate is valid until <b> <i> three (3) years</i></b> from the date of issue.
            To maintain active certification, the technician <b> <i> must attend a 2-day refresher program</i></b> at
            any NITT-approved
            training center for <b> <i>revalidation</i></b>.



        </p>
        <div style="text-align:center;">
            <p>
                <b> Verification Status <br> </b>
                @if ($item->isBlocked == 1)
                    <span style="color:red;">Certificate Cancelled</span>
                @else
                    <span style="color:green;"> Verified and Valid</span>
                @endif



            </p>
        </div>


        <hr>
        <p>
            <b>Authorized By:</b> <br>
            <b> Director General/Chief Executive (DG/CE)</b> <br>
            <i> Nigerian Institute of Transport Technology (NITT)</i>

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
