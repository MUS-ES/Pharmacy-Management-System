<div class="table-data">
    <table>
        <thead>
            <tr>
                <td>Inv-Num</td>
                <td>Customer Name</td>
                <td>Total Price</td>
                <td>Total Discount</td>
                <td>Total Net</td>
                <td>Date</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->number }}
                    </td>
                    <td>{{ $invoice->customer }}</td>
                    <td>{{ $invoice->total }}</td>
                    <td>{{ $invoice->total_discount }}</td>
                    <td>{{ $invoice->total_net }}</td>
                    <td>{{ $invoice->invoice_date }}</td>
                    <td class="action-section">
                        <a href='deleteinvoice/{{ $invoice->number }} ' class="icon-section">
                            <span class="material-icons-outlined">delete</span>
                        </a>
                        <button onclick="showInvoiceItems(this)" style="background-color: transparent ; border:none"
                            id="show-items" data-id="{{ $invoice->number }}" class="icon-section">
                            <span class="material-icons-outlined">visibility</span>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>


    </table>


</div>
