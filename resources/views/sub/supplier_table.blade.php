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
                <td>{{ $supplier->email }}</td>
                <td>{{ $supplier->contact }}</td>
                <td>{{ $supplier->address }}</td>
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
