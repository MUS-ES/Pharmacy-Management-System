@if (count($stocks))
    <table>
        <thead>
            <tr>

                <th>Medicine Name</th>
                <th>Strip</th>
                <th>Generic Name</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Ex.Date</th>
                <th>Supplier Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($stocks as $stock)
                    <td>{{ $stock->medicine->name }}</td>
                    <td>{{ $stock->medicine->unit }}</td>
                    <td>{{ $stock->medicine->generic }}</td>
                    <td>{{ $stock->qty }}</td>
                    <td>{{ $stock->medicine->price }}</td>
                    <td>{{ $stock->exp }}</td>
                    <td>
                        {{ $stock->supplier ? $stock->supplier->name : 'No Supplier Name' }}
                    </td>
                    <td><span data-id="{{ $stock->id }}" id="edit-medicine-btn" class="material-icons-outlined">
                            edit
                        </span>
                        <span onclick="deleteStock(this)" data-id="{{ $stock->id }}" id="delete-medicine-btn"
                            class="material-icons-outlined">
                            delete
                        </span>
                    </td>
            </tr>
@endforeach
</tbody>
</table>
@else
<h3 style="color:#FF6D55;text-align:center;padding:20px;">Sorry no data until yet</h3>
@endif
