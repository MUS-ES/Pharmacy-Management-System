<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Invoices</title>
    <style>
        table {
            user-select: none;
            border-radius: 1rem;
            width: 100%;
            padding: 0.5rem;
            text-align: center;
        }

        table th:first-child {
            border-top-left-radius: 0.8rem;
        }

        table th:last-child {
            border-top-right-radius: 0.8rem;
        }

        table th {
            font-size: 1.4rem;
            font-weight: 400;
            font-family: "Ubuntu", sans-serif;
            color: var(--white);
            height: 3rem;
            margin: 6rem;
            background: var(--rose);
        }

        table tbody {
            font-size: 1.2rem;
            font-weight: 600;
            font-family: "Ubuntu", sans-serif;
            color: var(--black2);
        }

        table tbody tr {
            height: 3.2rem;
        }

        table tbody tr td {
            border: 2px solid var(--rose);
            background-color: #FFE9E2;
            border-radius: 0.2rem;
            color: #737373;
        }

        table tbody tr td:nth-child(even) {
            background-color: #F9FF98;
        }

    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Inv-Num</th>
                <th>Customer Name</th>
                <th>Total Price</th>
                <th>Total Discount</th>
                <th>Total Net</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->id }}
                    </td>
                    <td>
                        @if ($invoice->customer)
                            {{ $invoice->customer->name }}
                        @else
                            No Customer
                        @endif
                    </td>
                    <td>{{ $invoice->total }}</td>
                    <td>{{ $invoice->total_discount }}</td>
                    <td>{{ $invoice->total_net }}</td>
                    <td>{{ $invoice->date }}</td>
                </tr>
            @endforeach
        </tbody>


    </table>


</body>


</html>
