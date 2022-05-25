@extends("layouts.master")
@section('title', 'PMS')
@push('head')
    <link rel="stylesheet" href="{{ asset('css/purchase_add.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/popup.js') }}"></script>
    <script src="{{ asset('js/purchase-add.js') }}"></script>
    <script src="{{ asset('js/suggestion.js') }}"></script>
@endpush

@section('main')

    <main>
        <!-- Main Head -->
        <h1 class="title">Add a New Invoice</h1>
        <!-- End Of Main Head -->
        <div class="container">

            <div class="bill">

                <div id="bill-header" class="bill-header">

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Purchase Number:</div>
                        <div class="input-field">{{ $purchase_number }}</div>
                    </div>

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Supplier Name:
                            <button id="supplier-btn" onclick="openPopup('/ajax/popup/supplier/add')" type="button"
                                name="button">New
                                supplier</button>
                        </div>
                        <input oninput="showSuggestions(this,'/ajax/suppliersuggestions')" id="supplier-name"
                            class="input-field" type="text" placeholder="Supplier Name" name="" value="">
                    </div>

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Date:</div>
                        <input id="purchase-date" class="input-field" type="date" placeholder="Contact Number" name=""
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
                    <div class="headers">Packing</div>
                    <div class="headers">Quantity</div>
                    <div class="headers">Mfd Date</div>
                    <div class="headers">Expiry</div>
                    <div class="headers">Unit Supplier Price</div>
                    <div class="headers">Unit Sale Price</div>
                    <div class="headers">Total</div>
                    <div class="headers">Action</div>
                </div>

                <hr class="lower-hr">


                <div onchange="fillPurchaseDetails()" id="bill-rows" class="bill-rows">

                    <div id="bill-body" class="bill-body-values purchase-items">

                        <div id="med_input">
                            <span onclick="openPopup('/ajax/popup/medicine/add')" id="new-medicine-btn"
                                class="material-icons-outlined">
                                add
                            </span>
                            <input autocomplete="off" id="sub-purchase-medicine"
                                oninput="showSuggestions(this,'/ajax/medicinesuggestions',fillFields,this.closest('#bill-body'));"
                                class=" body-input-field" type="text" name="medicine" value="">

                        </div>

                        <div>
                            <input id="sub-purchase-packing" class="body-input-field" type="number" name="packing" value="">


                        </div>

                        <div>
                            <input id="sub-purchase-qty" class="body-input-field" type="number" name="qty" value="0">
                        </div>


                        <div>
                            <input class="body-input-field" type="date" name="mfd_date" id="sub-purchase-mfd-date">

                        </div>
                        <div>
                            <input class="body-input-field" type="date" name="exp_date" id="sub-purchase-exp-date">

                        </div>

                        <div>
                            <input id="sub-purchase-supplier-price" class="body-input-field" type="number"
                                name="supplier-price" value="">
                        </div>

                        <div>
                            <input id="sub-purchase-sale-price" class="body-input-field" type="number" value="0">
                        </div>

                        <div>
                            <input disabled id="sub-purchase-total" class="body-input-field" type="number" name="total"
                                value="0">
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

                <div id="final-bill" class="final-sub-bill-results">
                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Paid Amount:</div>
                        <input id="paid" class="input-field" value="0">
                    </div>
                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Total Price:</div>
                        <input disabled id="finalprice" class="input-field" value="0">
                    </div>

                    <div class="btn-adjustment">
                        <button onclick="savePurchase()" class="btn-decoration" id="save-btn" type="button"
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

@endsection

@section('popup')



@endsection
