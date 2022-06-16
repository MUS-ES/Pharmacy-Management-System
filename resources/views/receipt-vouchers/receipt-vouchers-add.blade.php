@extends("layouts.master")
@section('title', 'PMS')
@push('head')
    <link rel="stylesheet" href="{{ asset('css/receipt-vouchers-add.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/receipt-vouchers-add.js') }}"></script>
@endpush

@section('main')
    <!-- Main -->
    <main>
        <!-- Main Head -->
        <h1 class="title">Add a New Receipt Voucher</h1>
        <div class="container">

            <div class="bill">

                <div id="bill-header" class="bill-header">

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Voucher Number:</div>
                        <div class="input-field">1</div>
                    </div>

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Account:
                        </div>
                        <input oninput="showSuggestions(this,'/ajax/customersuggestions') autocomplete=" off"
                            id="account-name" class="input-field" type="text" placeholder="Chest" name=""
                            value="">
                    </div>

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Date:</div>
                        <input id="voucher-date" class="input-field" type="date" placeholder="Contact Number" name=""
                            value="{{ date('Y-m-d') }}">
                    </div>

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Paymet Type:</div>
                        <select id="payment-type" class="input-field1" name="">
                            <option value="Cash">Cash Payment</option>
                            <option value="Net Banking">Net Banking</option>
                        </select>
                    </div>

                </div>

                <hr class="upper-hr">

                <div class="bill-body-header">
                    <div class="headers">Creditor</div>
                    <div class="headers">Account</div>
                    <div class="headers">Description</div>
                    <div class="headers">Action</div>
                </div>

                <hr class="lower-hr">


                <div id="bill-rows" oninput="fillInvoiceDetails()" class="bill-rows">
                    <div id="bill-body" class="bill-body-values invoice-items">

                        <div id="med_input">
                            <input autocomplete="off" id="medicine"
                                oninput="showSuggestions(this,'/ajax/medicinesuggestions',fillFields,this.closest('#bill-body'));fillFields(this.closest('#bill-body'))"
                                class="body-input-field" type="number" name="medicine" value="">
                        </div>

                        <div id="med_input">
                            <input autocomplete="off" id="medicine"
                                oninput="showSuggestions(this,'/ajax/medicinesuggestions',fillFields,this.closest('#bill-body'));fillFields(this.closest('#bill-body'))"
                                class="body-input-field" placeholder="Safe" type="text" name="medicine" value="">
                        </div>

                        <div id="med_input">
                            <input autocomplete="off" id="medicine"
                                oninput="showSuggestions(this,'/ajax/medicinesuggestions',fillFields,this.closest('#bill-body'));fillFields(this.closest('#bill-body'))"
                                class="body-input-field" type="text" name="medicine" value="">
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

                <div oninput="fillInvoiceDetails()" id="final-bill" class="final-sub-bill-results">

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Total:</div>
                        <input disabled id="finaldiscount" class="input-field" value="0">
                    </div>

                    <div class="btn-adjustment">
                        <button onclick="validateAndCreate()" class="btn-decoration" id="save-btn" type="button"
                            name="button">Save</button>
                        <button class="btn-decoration" id="discard-btn" type="button" name="button">Discard</button>
                    </div>

                </div>
                <!-- End Of Final Results -->

            </div>
            <!-- End Of Bill -->

        </div>

    </main>
@endsection
    