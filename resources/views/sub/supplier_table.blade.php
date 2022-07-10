@if (count($suppliers))
    <table>
        <thead>
            <tr>

                <th>Supplier Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($suppliers as $supplier)
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->email ? $supplier->email : 'No Email' }}</td>
                    <td>{{ $supplier->contact ? $supplier->contact : 'No Number' }}</td>
                    <td>{{ $supplier->address ? $supplier->address : 'No Address' }}</td>
                    <td><span data-id="{{ $supplier->id }}" id="edit-customer-btn" class="material-icons-outlined">
                            edit
                        </span>
                        <span onclick="deleteSupplier(this)" data-id="{{ $supplier->id }}" id="delete-customer-btn"
                            class="material-icons-outlined">
                            delete
                        </span>
                    </td>
            </tr>
@endforeach
</tbody>
</table>
{{ $suppliers->links() }}
@else
<h3 style="color:#FF6D55;text-align:center;padding:20px;">Sorry no data until yet</h3>
@endif
