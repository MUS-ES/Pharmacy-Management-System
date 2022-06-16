<table>
    <thead>
        <tr>
            <th>Pur-Num</th>
            <th>Supplier Name</th>
            <th>Total Price</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($purchases as $purchase)
            <tr>
                <td>{{ $purchase->id }}
                </td>
                <td>
                    @if ($purchase->supplier)
                        {{ $purchase->supplier->name }}
                    @else
                        No Supplier
                    @endif
                </td>
                <td>{{ $purchase->total }}</td>
                <td>{{ $purchase->date }}</td>
                <td class="action-section">
                    <a onclick="deletePurchase(this)" data-id="{{ $purchase->id }}"
                        style="color:#737373;margin-right:5px">
                        <span class="material-icons-outlined">delete</span>
                    </a>
                    <a onclick="showPurchaseItems(this)" id="show-items" data-id="{{ $purchase->id }}">
                        <span class="material-icons-outlined">visibility</span>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>


</table>
