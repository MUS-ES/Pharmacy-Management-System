@if (count($customers))
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
                    <td>{{ $customer->contact ? $customer->contact : 'No Number' }}</td>
                    <td>{{ $customer->address ? $customer->address : 'No Address' }}</td>
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
{{ $customers->links() }}
@else
<h3 style="color:#FF6D55;text-align:center;padding:20px;">Sorry no data until yet</h3>
@endif
