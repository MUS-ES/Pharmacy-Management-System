@if (count($medicines))

    <table>
        <thead>
            <tr>

                <th>Medicine Name</th>
                <th>Strip</th>
                <th>Generic Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Action</th>
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
@else
<h3 style="color:#FF6D55;text-align:center;padding:20px;">Sorry no data until yet</h3>
@endif
