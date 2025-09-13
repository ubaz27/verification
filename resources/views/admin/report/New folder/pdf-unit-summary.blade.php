<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $filename ?? 'Summary' }}</title>
    <style>
        table {
            font-size: 12px;
            border-collapse: collapse;
            width: 100%;
            /* table-layout: fixed; */
            /* white-space:  nowrap !important; */
        }

        td,
        th {
            /* border: 1px solid black; */
            padding: 10px;
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
    </style>
</head>

<body>
    <div class="statement-header"><img src="{{ asset('assets/images/logo.png') }}" height="70px" /></div>
    <div class="statement-header"></div>
    <div class="statement-header">
        Bayero University, Kano
    </div>
    <div class="statement-header">
        <h3>
            {{-- @foreach ($papers as $item) --}}
            {{ $papers->papertype }} Summary of {{ $category }} Based Documents Per Unit
            {{-- @endforeach --}}
        </h3>

    </div>

    <table style="margin-top:  10px; width:  100%">
        <thead>
            <tr>
                <th style="width: 30px">S/N</th>
                <th style="width: 480px">Units</th>
                <th style="text-align:left">Number of Records</th>
            </tr>
        </thead>
        <tbody style="border: solid">
            {{ $i = 1 }}
            {{ $total_documents = 0 }}

            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $transaction->unit_name }}</td>
                    <td>{{ $transaction->no }}</td>

                    {{ $total_documents += $transaction->no }}

                </tr>
                {{ $i++ }}
            @endforeach
            <tr>
                <td></td>
                <td>{{ 'Total' }}</td>
                <td>{{ $total_documents }}</td>
            </tr>
        </tbody>
    </table>

    {{-- <h5>TRANSACTIONS SUMMARY</h5>
    <p>Number of Documents: {{ $total_documents }}</p> --}}


</body>

</html>
