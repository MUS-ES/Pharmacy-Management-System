<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Medicines</title>
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

                <th>Medicine Name</th>
                <th>Strip</th>
                <th>Generic Name</th>
                <th>Price</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($medicines as $medicine)
                    <td>{{ $medicine->name }}</td>
                    <td>{{ $medicine->unit }}</td>
                    <td>{{ $medicine->generic }}</td>
                    <td>{{ $medicine->price }}</td>
                    <td>{{ $medicine->description ? $medicine->description : 'No Description' }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>


</body>


</html>
