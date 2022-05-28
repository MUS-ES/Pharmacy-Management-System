<table>
    <thead>
        <tr>

            <th>Customer Name</th>
            <th>Contact</th>
            <th>Address</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach ($customers as $customer)
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->contact }}</td>
                <td>{{ $customer->address }}</td>
                <td><span data-id="{{ $customer->id }}" id="edit-customer-btn" class="material-icons-outlined">
                        edit
                    </span>
                    <span onclick="deleteCustomer(this)" data-id="{{ $customer->id }}" id="delete-customer-btn"
                        class="material-icons-outlined">
                        delete
                    </span>
                </td>
        </tr>
        @endforeach
    </tbody>
</table>
