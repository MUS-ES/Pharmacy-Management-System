@extends("layouts.master")
@section('title', 'PMS')
@push('head')
    <link rel="stylesheet" href="{{ asset('css/invoice-add.css') }}">
@endpush

@section('content')


    <!-- Content -->
    <section id="content">

        <x-Nav />



        <!-- Main -->
        <main>
            <!-- Main Head -->
            <h1 class="title">Add a New Invoice</h1>
            <!-- End Of Main Head -->
            <div class="container">

                <div class="bill">

                    <div class="bill-header">

                        <div class="bill-labelsandinputs">
                            <div class="sub-title">Invoice Number:</div>
                            <div class="input-field">1</div>
                        </div>

                        <div class="bill-labelsandinputs">
                            <div class="sub-title">Customer Name:
                                <button id="customer-btn" type="button" name="button">New Customer</button>
                            </div>
                            <input class="input-field" type="text" placeholder="Customer Name" name="" value="">
                        </div>

                        <div class="bill-labelsandinputs">
                            <div class="sub-title">Address:</div>
                            <div class="input-field">Washington</div>
                        </div>

                        <div class="bill-labelsandinputs">
                            <div class="sub-title">Contact:</div>
                            <div class="input-field">1</div>
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
                                <input class="body-input-field" type="text" placeholder="Select a Medicine" name=""
                                    value="">
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
                            <div class="input-field">1</div>
                        </div>

                        <div class="bill-labelsandinputs">
                            <div class="sub-title">Total Discount:</div>
                            <div class="input-field">1</div>
                        </div>

                        <div class="bill-labelsandinputs">
                            <div class="sub-title">Total Net:</div>
                            <div class="input-field">1</div>
                        </div>

                    </div>
                    <!-- End Of Final Sub-Results -->
                    <hr class="horizontal-rule">

                    <div class="final-bill-results">

                        <div class="bill-labelsandinputs">
                            <div class="sub-title">Paid Amount:</div>
                            <div class="input-field">1</div>
                        </div>

                        <div class="bill-labelsandinputs">
                            <div class="sub-title">Rest:</div>
                            <div class="input-field">0</div>
                        </div>

                        <div class="btn-adjustment">
                            <button class="btn-decoration" id="save-btn" type="button" name="button">Save</button>
                            <button class="btn-decoration" id="discard-btn" type="button" name="button">Discard</button>
                        </div>

                    </div>
                    <!-- End Of Final Bill Results -->

                </div>
                <!-- End Of Bill -->

            </div>
            <!-- End Of Container -->

        </main>
        <!-- End Of Main -->

    </section>

    <section id="popup">
        <div class="container1">
            <div class="popup-window">
                <div class="popup-header">
                    <div>
                        <h3>Add New Customer</h3>
                    </div>
                    <span class="cancel-btn material-icons-outlined">highlight_off</span>
                </div>
                <!-- End Of Popup Header -->
                <div class="popup-body">
                    <div class="popup-labelsandinputs">
                        <div class="sub-title">
                            Customer Name:
                        </div>
                        <input class="popup-input-field" type="text" placeholder="Name" name="" value="">
                    </div>

                    <div class="popup-labelsandinputs">
                        <div class="sub-title">
                            Contact Number:
                        </div>
                        <input class="popup-input-field" type="number" name="" value="">
                    </div>

                    <div class="popup-labelsandinputs">
                        <div class="sub-title">
                            Address:
                        </div>
                        <textarea name="address" rows="4" cols="50" placeholder="Address"></textarea>
                    </div>

                    <div class="popup-btn">
                        <button id="popup-button" type="button" name="button"><span
                                class="material-icons-outlined">person_add</span></button>
                    </div>

                </div>
                <!-- End Of Popup Body -->
            </div>
            <!-- End Of Popup Window -->
        </div>
        <!-- End Of Container1 -->
    </section>
    <script>
        //Adding  New Customer
        document.getElementById("customer-btn").addEventListener("click",
            function() {
                document.querySelector(".container1").style.display = "flex";
            });


        document.querySelector(".cancel-btn").addEventListener("click",
            function() {
                document.querySelector(".container1").style.display = "none";
            });
    </script>




@endsection

@push('scripts')
    <script src="js/invoice-add.js"></script>
@endpush
