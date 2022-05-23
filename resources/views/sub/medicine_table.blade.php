<table>
    <thead>
        <tr>

            <th>Medicine Name</th>
            <th>Strip</th>
            <th>Generic Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach ($medicines as $medicine)
                <td>{{ $medicine->name }}</td>
                <td>{{ $medicine->strip_unit }}</td>
                <td>{{ $medicine->generic_name }}</td>
                <td>{{ $medicine->price }}</td>
                <td><span data-id="{{ $medicine->id }}" id="edit-medicine-btn" class="material-icons-outlined">
                        edit
                    </span>
                    <span onclick="deleteMedicine(this)" data-id="{{ $medicine->id }}" id="delete-medicine-btn"
                        class="material-icons-outlined">
                        delete
                    </span>
                </td>
        </tr>
        @endforeach
    </tbody>
</table>
