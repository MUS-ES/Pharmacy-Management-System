@if (count($vouchers))
    <table>
        <thead>
            <tr>
                <th>Voucher Number</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vouchers as $voucher)
                <tr>
                    <td>{{ $voucher->id }}</td>
                    <td>{{ $voucher->type }}</td>
                    <td>{{ $voucher->amount }}</td>
                    <td>{{ $voucher->date }}</td>
                    <td>{{ $voucher->description }}</td>
                    <td class="action-section">
                        <span onclick="deleteVoucher(this)" data-id="{{ $voucher->id }}"
                            class="material-icons-outlined">delete</span>
                        <span onclick="showvoucherItems(this)" id="show-items" data-id="{{ $voucher->id }}"
                            class="material-icons-outlined">visibility</span>
                    </td>
                </tr>
            @endforeach
        </tbody>


    </table>
    {{-- {!! $vouchers->render() !!} --}}
@else
    <h3 style="color:#FF6D55;text-align:center;padding:20px;">Sorry no data until yet</h3>
@endif
