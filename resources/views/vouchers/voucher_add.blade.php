@extends("layouts.master")
@section('title', 'PMS')
@push('head')
    <link rel="stylesheet" href="{{ asset('css/voucher_add.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/voucher_add.js') }}"></script>
    <script src="{{ asset('js/popup.js') }}"></script>
@endpush

@section('main')
    <!-- Main -->
    <main>
        <!-- Main Head -->
        <h1 class="title">Add a New Voucher</h1>

        <div class="container">

            <div class="bill">

                <div id="bill-header" class="bill-header">

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Voucher Number:</div>
                        <div class="input-field">{{$voucher_number}}</div>
                    </div>

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Date:</div>
                        <input id="voucher-date" class="input-field" type="date" placeholder="Contact Number" name=""
                            value="{{ date('Y-m-d') }}">
                    </div>



                </div>

                <hr class="upper-hr">

                <div class="bill-body-header">
                    <div class="headers">Type</div>
                    <div id="type-title" class="headers">Amount</div>
                    <div class="headers">Account</div>
                    <div class="headers">Description</div>
                    <div class="headers">Action</div>

                </div>

                <hr class="lower-hr">


                <div id="bill-rows" onchange="fillTotalFields()" class="bill-rows">
                    <div id="bill-body" class="bill-body-values voucher-items">
                        <div>
                            <Select id="voucher-type" class="body-input-field" type="text" placeholder="Chest" name=""
                                value="Payment">
                                <option value="Payment">Payment</option>
                                <option value="Receipt">Receipt</option>
                            </Select>

                        </div>
                        <div>
                            <input id="amount" class="body-input-field" type="number" name="amount" value="">
                        </div>

                        <div>
                            <input disabled class="body-input-field" placeholder="Safe" type="text" name="account" value="">
                        </div>

                        <div>
                            <textarea class="body-input-field" type="text" name="desciption" id="description" name="description" cols="10" rows="4"
                                style="height: max-content"></textarea>

                        </div>

                        <div class="action-section">
                            <span onclick="addVoucher();"
                                class="material-icons-outlined add-fields">add_circle_outline</span>
                            <span onclick="removeVoucher(this);"
                                class="material-icons-outlined remove-fields">remove_circle_outline</span>
                        </div>

                    </div>
                    <hr class="horizontal-rule">
                </div>

                <div id="final-bill" class="final-sub-bill-results">

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Total Payment:</div>
                        <input id="total-payment" disabled class="input-field" type="number" value="0">
                    </div>
                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Total Receipt:</div>
                        <input id="total-receipt" disabled class="input-field" type="number" value="0">
                    </div>

                    <div class="btn-adjustment">
                        <button onclick="save()" class="btn-decoration" id="save-btn" type="button"
                            name="button">Save</button>
                        <button class="btn-decoration" id="discard-btn" type="button" name="button">Discard</button>
                    </div>

                </div>
                <div class="invalid-feedback-container">
                    <ul id="invalid-feedback-list">
                    </ul>
                </div>
            </div>


        </div>

    </main>
@endsection
