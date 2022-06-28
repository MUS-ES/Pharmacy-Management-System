@extends("layouts.master")
@section('title', 'PMS')
@push('head')
    <link rel="stylesheet" href="{{ asset('css/invoice_add.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/popup.js') }}"></script>
    <script src="{{ asset('js/invoice_add.js') }}"></script>
    <script src="{{ asset('js/suggestion.js') }}"></script>
@endpush

@section('main')




    <!-- Main -->
    <main>
        <!-- Main Head -->
        <h1 class="title">Add a New Invoice</h1>
        <!-- End Of Main Head -->
        <div class="container">

            <div class="bill">

                <div id="bill-header" class="bill-header">

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Invoice Number:</div>
                        <div class="input-field">{{ $invoice_number }}</div>
                    </div>

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Customer Name:
                            <button id="customer-btn" onclick="openPopup('/ajax/popup/customer/add')" type="button"
                                name="button">New
                                Customer</button>
                        </div>
                        <input oninput="showSuggestions(this,'/ajax/customersuggestions')" autocomplete="off"
                            id="customer-name" class="input-field" type="text" placeholder="Customer Name" name=""
                            value="">
                    </div>

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Date:</div>
                        <input id="invoice-date" class="input-field" type="date" placeholder="Contact Number" name=""
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
                    <div class="headers">Medicine Name</div>
                    <div class="headers">Quantity</div>
                    <div class="headers">Av.Qty</div>
                    <div class="headers">Expiry</div>
                    <div class="headers">Unit</div>
                    <div class="headers">Unit Price</div>
                    <div class="headers">Discount</div>
                    <div class="headers">Total</div>
                    <div class="headers">Action</div>
                </div>

                <hr class="lower-hr">


                <div id="bill-rows" oninput="fillInvoiceDetails()" class="bill-rows">
                    <div id="bill-body" class="bill-body-values invoice-items">

                        <div id="med_input">
                            <input autocomplete="off" id="medicine"
                                oninput="showSuggestions(this,'/ajax/medicinesuggestions',fillFields,this.closest('#bill-body'));fillFields(this.closest('#bill-body'))"
                                class="body-input-field" type="text" name="medicine" value="">
                        </div>



                        <div>
                            <input oninput="checkQuantity(this.closest('#bill-body'));calcPrice(this.closest('#bill-body'))"
                                id="qty" class="body-input-field" type="number" name="qty" value="">
                        </div>



                        <div>
                            <input disabled id="avQty" class="body-input-field" type="number" name="avqty" value="0">
                        </div>

                        <div>
                            <select oninput="fillAvQty(this.closest('#bill-body'))" class="body-input-field" name="exp_date"
                                id="exp_date">

                            </select>
                        </div>
                        <div>
                            <select oninput="fillUnitPrice(this.closest('#bill-body'));" id="type" class="body-input-field"
                                type="text" name="type">
                                <option value="pack">Package</option>
                            </select>
                        </div>
                        <div>
                            <input id="unitPrice" class="body-input-field" type="number" name="unitprice" value="">
                        </div>

                        <div>
                            <input oninput="calcPrice(this.closest('#bill-body'))" id="discount" class="body-input-field"
                                type="number" name="discount" value="0">
                        </div>

                        <div>
                            <input disabled id="total" class="body-input-field" type="number" name="total" value="0">
                        </div>

                        <div class="action-section">
                            <span onclick="addInvoice();"
                                class="material-icons-outlined add-fields">add_circle_outline</span>
                            <span onclick="removeInvoice(this);"
                                class="material-icons-outlined remove-fields">remove_circle_outline</span>
                        </div>

                    </div>
                    <hr class="horizontal-rule">
                </div>

                <div oninput="fillInvoiceDetails()" id="final-bill" class="final-sub-bill-results">

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Total Price:</div>
                        <input disabled id="finalprice" class="input-field" value="0">
                    </div>

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Total Discount:</div>
                        <input disabled id="finaldiscount" class="input-field" value="0">
                    </div>

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Total Net:</div>
                        <input disabled id="finalnet" class="input-field" value="0">
                    </div>


                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Paid Amount:</div>
                        <input id="paid" class="input-field" value="0">
                    </div>

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Rest:</div>
                        <input disabled id="paid-rest" class="input-field" value="0">
                    </div>

                    <div class="btn-adjustment">
                        <button onclick="saveInvoice()" class="btn-decoration" id="save-btn" type="button"
                            name="button">Save</button>
                        <button class="btn-decoration" id="discard-btn" type="button" name="button">Discard</button>
                    </div>

                </div>
                <div class="invalid-feedback-container">
                    <ul id="invalid-feedback-list">
                    </ul>
                </div>
                <!-- End Of Final Results -->

            </div>
            <!-- End Of Bill -->

        </div>
        <!-- End Of Container -->

    </main>
    <!-- End Of Main -->
@endsection

@section('popup')



@endsection
