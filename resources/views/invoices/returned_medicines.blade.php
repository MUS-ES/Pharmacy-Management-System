@extends("layouts.master")
@section('title', 'PMS')
@push('head')
    <link rel="stylesheet" href="{{ asset('css/returned_medicines.css') }}">
@endpush

@section('main')

    <!-- Main -->
    <main>
        <!-- Main Head -->
        <h1 class="title">Retruned Medicines</h1>
        <!-- End Of Main Head -->
        <div class="container">

            <div class="bill">

                <div class="bill-header">

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Invoice Number:</div>
                        <input class="input-field" type="number" name="" value="">
                    </div>

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Customer Name:
                        </div>
                        <input class="input-field" type="text" placeholder="Customer Name" name="" value="">
                    </div>

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Address:</div>
                        <input class="input-field" type="text" placeholder="Address" name="" value="">
                    </div>

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Contact:</div>
                        <input class="input-field" type="number" placeholder="Contact Number" name="" value="">
                    </div>


                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Date:</div>
                        <input class="input-field" type="date" placeholder="Contact Number" name="" value="">
                    </div>

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Paymet Type:</div>
                        <select class="input-field1" name="">
                            <option value="1">Cash Payment</option>
                            <option value="2">Card payment</option>
                            <option value="3">Net Banking</option>
                        </select>
                    </div>

                </div>

                <hr class="upper-hr">

                <div class="bill-body-header">
                    <div class="headers">Medicine Name</div>
                    <div class="headers">Unit</div>
                    <div class="headers">Quantity</div>
                    <div class="headers">Unit Price</div>
                    <div class="headers">Av.Qty</div>
                    <div class="headers">Expiry</div>
                    <div class="headers">Discount</div>
                    <div class="headers">Total</div>
                    <div class="headers">Action</div>
                </div>

                <hr class="lower-hr">


                <div class="bill-rows">

                    <div class="bill-body-values">

                        <div>
                            <input class="body-input-field" type="text" placeholder="Select a Medicine" name="" value="">
                        </div>

                        <div>
                            <input class="body-input-field" type="text" name="" value="">
                        </div>

                        <div>
                            <input class="body-input-field" type="number" name="" value="">
                        </div>

                        <div>
                            <input class="body-input-field" type="number" name="" value="">
                        </div>

                        <div>
                            <input class="body-input-field" type="number" name="" value="">
                        </div>

                        <div>
                            <input class="body-input-field" type="text" name="" value="">
                        </div>

                        <div>
                            <input class="body-input-field" type="number" name="" value="">
                        </div>

                        <div>
                            <input class="body-input-field" type="number" name="" value="">
                        </div>

                        <div class="action-section">
                            <span id="add-fields" class="material-icons-outlined">add_circle_outline</span>
                            <span id="remove-fields" class="material-icons-outlined">remove_circle_outline</span>
                        </div>

                    </div>
                    <div class="bill-body-values" id="invoice_medicine_list_div">
                        <script src="JS/invoice-add.js">
                            addRow();
                            getInvoiceNumber();
                        </script>
                    </div>


                    <hr class="horizontal-rule">




                    <div class="bill-body-values">

                        <div>
                            <input class="body-input-field" type="text" placeholder="Select a Med" name="" value="">
                        </div>

                        <div>
                            <input class="body-input-field" type="text" name="" value="">
                        </div>

                        <div>
                            <input class="body-input-field" type="number" name="" value="">
                        </div>

                        <div>
                            <input class="body-input-field" type="number" name="" value="">
                        </div>

                        <div>
                            <input class="body-input-field" type="number" name="" value="">
                        </div>

                        <div>
                            <input class="body-input-field" type="text" name="" value="">
                        </div>

                        <div>
                            <input class="body-input-field" type="number" name="" value="">
                        </div>

                        <div>
                            <input class="body-input-field" type="number" name="" value="">
                        </div>

                        <div class="action-section">
                            <span id="add-fields" class="material-icons-outlined">add_circle_outline</span>
                            <span id="remove-fields" class="material-icons-outlined">remove_circle_outline</span>
                        </div>

                    </div>

                    <hr class="horizontal-rule">

                    <div class="bill-body-values">

                        <div>
                            <input class="body-input-field" type="text" placeholder="Select a Med" name="" value="">
                        </div>

                        <div>
                            <input class="body-input-field" type="text" name="" value="">
                        </div>

                        <div>
                            <input class="body-input-field" type="number" name="" value="">
                        </div>

                        <div>
                            <input class="body-input-field" type="number" name="" value="">
                        </div>

                        <div>
                            <input class="body-input-field" type="number" name="" value="">
                        </div>

                        <div>
                            <input class="body-input-field" type="text" name="" value="">
                        </div>

                        <div>
                            <input class="body-input-field" type="number" name="" value="">
                        </div>

                        <div>
                            <input class="body-input-field" type="number" name="" value="">
                        </div>

                        <div class="action-section">
                            <span id="add-fields" class="material-icons-outlined">add_circle_outline</span>
                            <span id="remove-fields" class="material-icons-outlined">remove_circle_outline</span>
                        </div>

                    </div>

                    <hr class="horizontal-rule">

                    <div class="bill-body-values">

                        <div>
                            <input class="body-input-field" type="text" placeholder="Select a Med" name="" value="">
                        </div>

                        <div>
                            <input class="body-input-field" type="text" name="" value="">
                        </div>

                        <div>
                            <input class="body-input-field" type="number" name="" value="">
                        </div>

                        <div>
                            <input class="body-input-field" type="number" name="" value="">
                        </div>

                        <div>
                            <input class="body-input-field" type="number" name="" value="">
                        </div>

                        <div>
                            <input class="body-input-field" type="text" name="" value="">
                        </div>

                        <div>
                            <input class="body-input-field" type="number" name="" value="">
                        </div>

                        <div>
                            <input class="body-input-field" type="number" name="" value="">
                        </div>

                        <div class="action-section">
                            <span id="add-fields" class="material-icons-outlined">add_circle_outline</span>
                            <span id="remove-fields" class="material-icons-outlined">remove_circle_outline</span>
                        </div>

                    </div>

                    <hr class="horizontal-rule">
                    <div class="bill-body-values">

                        <div>
                            <input class="body-input-field" type="text" placeholder="Select a Med" name="" value="">
                        </div>

                        <div>
                            <input class="body-input-field" type="text" name="" value="">
                        </div>

                        <div>
                            <input class="body-input-field" type="number" name="" value="">
                        </div>

                        <div>
                            <input class="body-input-field" type="number" name="" value="">
                        </div>

                        <div>
                            <input class="body-input-field" type="number" name="" value="">
                        </div>

                        <div>
                            <input class="body-input-field" type="text" name="" value="">
                        </div>

                        <div>
                            <input class="body-input-field" type="number" name="" value="">
                        </div>

                        <div>
                            <input class="body-input-field" type="number" name="" value="">
                        </div>

                        <div class="action-section">
                            <span id="add-fields" class="material-icons-outlined">add_circle_outline</span>
                            <span id="remove-fields" class="material-icons-outlined">remove_circle_outline</span>
                        </div>

                    </div>

                    <hr class="horizontal-rule">


                </div>

                <div class="final-sub-bill-results">

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Total Price:</div>
                        <input class="input-field" type="number" name="" value="">
                    </div>

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Total Discount:</div>
                        <input class="input-field" type="number" name="" value="">
                    </div>

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Total Net:</div>
                        <input class="input-field" type="number" name="" value="">
                    </div>

                </div>

                <hr class="horizontal-rule">

                <div class="final-bill-results">

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Paid Amount:</div>
                        <input class="input-field" type="number" name="" value="">
                    </div>

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Rest:</div>
                        <input class="input-field" type="number" name="" value="">
                    </div>

                    <div class="btn-adjustment">
                        <button class="btn-decoration" id="save-btn" type="button" name="button">Save</button>
                        <button class="btn-decoration" id="discard-btn" type="button" name="button">Discard</button>
                    </div>

                </div>








            </div>



        </div>



    </main>
    <!-- End Of Main -->


@endsection
@push('scripts')
    <script src="js/returned-medicines.js"></script>
@endpush
