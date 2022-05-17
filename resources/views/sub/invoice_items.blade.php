<div class="container1">

    <div class="popup-window">

        <div class="popup-header">

            <div class="bill-labelsandinputs">
                <div class="sub-title">Invoice Number:</div>
                <div class="input-field">{{ $invoice->id }}</div>
            </div>

            <div class="bill-labelsandinputs">
                <div class="sub-title">Customer Name:
                </div>
                <input disabled type="text" class="input-field"
                    value="@if ($customer !== null) {{ $customer->name }}@else no name @endif">
            </div>

            <div class="bill-labelsandinputs">
                <div class="sub-title">Address:</div>
                <input disabled type="text" class="input-field"
                    value="@if ($customer !== null) {{ $customer->address }}@else no address @endif">
            </div>

            <div class="bill-labelsandinputs">
                <div class="sub-title">Contact:</div>
                <input disabled type="text" class="input-field"
                    value="@if ($customer !== null) {{ $customer->contact }}@else no number @endif">
            </div>


            <div class="bill-labelsandinputs">
                <div class="sub-title">Date:</div>
                <input disabled type="text" class="input-field" value="{{ $invoice->created_at }}">
            </div>

            <div class="bill-labelsandinputs">
                <div class="sub-title">Paymet Type:</div>
                <input disabled type="text" class="input-field" value="{{ $payment->provider }}">
            </div>
        </div>
        <!-- End Of Popup Header -->

        <hr class="upper-hr">

        <!-- Popup Body  -->
        <!-- <div class="popup-body-header">                                                                                                                                                                                                                                                                                                                                </div> -->
        <!-- End Of Popup Body -->

        <!-- <hr class="lower-hr"> -->

        <div class="bill-rows">
            <div class="table-data">
                <table class="popup-table">
                    <thead>
                        <tr>
                            <th>Med-Name</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Discount</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->medicine->name }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->medicine->price }}</td>
                                <td>{{ $item->discount }}</td>
                                <td>{{ $item->medicine->price - $item->discount }}</td>
                            </tr>
                        @endforeach

                </table>


            </div>
            <!-- <div class="bill-body-values">                                                                                                                                                                                                                                                                                                                                         </div> -->
            <!-- End Of Bill Body Values -->

            <!-- <hr class="horizontal-rule"> -->

        </div>
        <!-- End Of Bill Rows -->

        <hr class="horizontal-rule">
        <div class="final-sub-bill-results">

            <div class="bill-labelsandinputs">
                <div class="sub-title">Total Price:</div>
                <input disabled type="text" class="input-field" value="{{ $invoice->total }}">
            </div>

            <div class="bill-labelsandinputs">
                <div class="sub-title">Total Discount:</div>
                <input disabled type="text" class="input-field" value="{{ $invoice->total_discount }}">
            </div>

            <div class="bill-labelsandinputs">
                <div class="sub-title">Total Net:</div>
                <input disabled type="text" class="input-field" value="{{ $invoice->total_net }}">
            </div>

        </div>
        <!-- End Of Final Sub-Results -->

        <hr class="horizontal-rule">

        <!-- Final Results -->
        <div class="final-bill-results">

            <div class="bill-labelsandinputs">
                <div class="sub-title">Paid:</div>
                <input disabled type="text" class="input-field" value="{{ $invoice->paid }}">
            </div>

            <div class="bill-labelsandinputs">
                <div class="sub-title">Rest:</div>
                <input disabled type="text" class="input-field" value="{{ $invoice->rest }}">
            </div>

            <div class="btn-adjustment">
                <button onclick="closeWindow('#popup','.container1')" class="btn-decoration" id="close-btn"
                    type="button" name="button">Close</button>
            </div>

        </div>
        <!-- End Of Final Results -->

    </div>
    <!-- End Of Popup Window -->

</div>
<!-- End Of Container1 -->
