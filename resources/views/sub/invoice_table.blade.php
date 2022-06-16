<table>
    <thead>
        <tr>
            <th>Inv-Num</th>
            <th>Customer Name</th>
            <th>Total Price</th>
            <th>Total Discount</th>
            <th>Total Net</th>
            <th>Date</th>
            <th>Actions</th>
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
                <td>{{ $invoice->created_at }}</td>
                <td class="action-section">
                        <span onclick="deleteInvoice(this)" data-id="{{ $invoice->id }}" class="material-icons-outlined">delete</span>
                        <span onclick="showInvoiceItems(this)" id="show-items" data-id="{{ $invoice->id }}" class="material-icons-outlined">visibility</span>
                </td>
            </tr>
        @endforeach
    </tbody>


</table>
