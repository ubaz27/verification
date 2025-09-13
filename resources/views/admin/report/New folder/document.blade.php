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
    <div class="statement-header"><img src="" height="70px" /></div>
    <div class="statement-header"></div>
    <div class="statement-header">
        Account Type :
    </div>
    <div class="statement-header">
        From
    </div>

    <table style="margin-top:  10px; width:  100%">
        <thead>
            <tr>
                <th style="width: 30px">S/N</th>
                <th style="width: 80px">File No.</th>
                <th style="text-align:left">Full Name</th>

                <th style="width: 150px; text-align:right">CREDIT(<span>&#8358;</span>)</th>
                <th style="width: 150px; text-align:right">DEBIT(<span>&#8358;</span>)</th>
                <th style="width: 150px; text-align:right">BALANCE(<span>&#8358;</span>)</th>
            </tr>
        </thead>
        <tbody style="border: solid">
            {{ $i = 1 }}
            {{ $total_debit = 0 }}
            {{ $total_credit = 0 }}
            {{-- @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $transaction->file_no }}</td>
                    <td>{{ $transaction->name }}</td>
                    <td style="text-align:right">{{ number_format($transaction->credit, 2) }}</td>
                    <td style="text-align:right">{{ number_format($transaction->debit, 2) }}</td>
                    <td style="text-align:right">{{ number_format($transaction->credit - $transaction->debit, 2) }}
                    </td>
                    {{ $total_debit += $transaction->debit }}
                    {{ $total_credit += $transaction->credit }}
                </tr>
                {{ $i++ }}
            @endforeach --}}
        </tbody>
    </table>

    <h5>TRANSACTIONS SUMMARY</h5>
    <table style="margin-top:  10px; width:  100%;">
        <thead>
            <tr>
                {{-- <th style="width: 80px">S/N</th> --}}
                <th style="text-align:left">STATUS</th>
                <th style="width: 150px; text-align:right">TOTAL CREDIT(<span>&#8358;</span>)</th>
                <th style="width: 150px; text-align:right">TOTAL DEBIT(<span>&#8358;</span>)</th>
                <th style="width: 150px; text-align:right">GRAND TOTAL(<span>&#8358;</span>)</th>
            </tr>
        </thead>
        <tbody style="border: solid">
            <tr>
                {{-- <td style="text-align:right"></td> --}}
                <td>Summary</td>
                {{-- <td style="text-align:right">{{ number_format($total_credit, 2) }}</td>
                <td style="text-align:right">{{ number_format($total_debit, 2) }}</td>
                <td style="text-align:right">{{ number_format($total_credit - $total_debit, 2) }}</td> --}}
            </tr>
        </tbody>
    </table>

    {{-- <h6>TOTAL CREDIT</h6> --}}
    {{-- <table style="margin-top:  20px; width:  50%; font-weight:bold">
        <tbody>
            @foreach ($account_total_credits as $account_total_credit)
                <tr>
                    <td>Total Credit</td>
                    <td style="text-align: right"><span>&#8358;</span>{{ number_format($account_total_credit->total_amount,2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}

    {{-- <h6>TOTAL DEBIT</h6> --}}
    {{-- <table style="margin-top:  20px; width:  50%; font-weight:bold">
        <tbody>
            @foreach ($account_total_debits as $account_total_debit)
                <tr>
                    <td>Total Debit</td>
                    <td style="text-align: right"><span>&#8358;</span>{{ number_format($account_total_debit->total_amount,2) }}</td>
                </tr>
            @endforeach
    </table> --}}
</body>

</html>
