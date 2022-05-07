@extends("layouts.master")
@section('title', 'PMS')
@push('head')
    <link rel="stylesheet" href="{{ asset('css/invoice-manage.css') }}">
@endpush

@section('content')
    <!-- Content -->
    <section id="content">

        <x-Nav />



        <!-- Main -->
        <main>
            <!-- Main Head -->
            <h1 class="title">Manage Invoices</h1>
            <!-- End Of Main Head -->
            <div class="container">

                <div class="bill">

                    <div class="bill-header">

                        <div class="bill-labelsandinputs">
                            <div class="sub-title">Search By Invoice Number:</div>
                            <input class="input-field" type="number" name="" value="">
                        </div>

                        <div class="bill-labelsandinputs">
                            <div class="sub-title">Search By Customer Name:</div>
                            <input class="input-field" type="text" placeholder="Customer Name" name="" value="">
                        </div>

                        <div class="bill-labelsandinputs">
                            <div class="sub-title">Search By Date:</div>
                            From:
                            <input class="input-field" type="date" name="" value="">
                        </div>

                        <div class="bill-labelsandinputs">
                            <div class="sub-title">Search By Date:</div>
                            To:
                            <input class="input-field" type="date" name="" value="">
                        </div>

                        <div class="refresh-btn">
                            <span class="material-icons-outlined">autorenew</span>
                        </div>

                    </div>

                    <div class="table-data">
                        <table>
                            <thead>
                                <tr>
                                    <td>Inv-Num</td>
                                    <td>Customer Name</td>
                                    <td>Num-of-Pur</td>
                                    <td>Date</td>
                                    <td>Total Price</td>
                                    <td>Total Discount</td>
                                    <td>Total Net</td>
                                    <td>Actions</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Jouel Johnson</td>
                                    <td>5</td>
                                    <td>22/04/2022</td>
                                    <td>20000</td>
                                    <td>500</td>
                                    <td>19500</td>
                                    <td class="action-section">
                                        <div class="icon-section">
                                            <span class="material-icons-outlined">delete</span>
                                        </div>
                                        <div class="icon-section">
                                            <span id="customer-btn" class="material-icons-outlined">visibility</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>

                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Jouel Johnson</td>
                                    <td>5</td>
                                    <td>22/04/2022</td>
                                    <td>20000</td>
                                    <td>500</td>
                                    <td>19500</td>
                                    <td class="action-section">
                                        <div class="icon-section">
                                            <span class="material-icons-outlined">delete</span>
                                        </div>
                                        <div class="icon-section">
                                            <span class="material-icons-outlined">visibility</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>

                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Jouel Johnson</td>
                                    <td>5</td>
                                    <td>22/04/2022</td>
                                    <td>20000</td>
                                    <td>500</td>
                                    <td>19500</td>
                                    <td class="action-section">
                                        <div class="icon-section">
                                            <span class="material-icons-outlined">delete</span>
                                        </div>
                                        <div class="icon-section">
                                            <span class="material-icons-outlined">visibility</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>

                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Jouel Johnson</td>
                                    <td>5</td>
                                    <td>22/04/2022</td>
                                    <td>20000</td>
                                    <td>500</td>
                                    <td>19500</td>
                                    <td class="action-section">
                                        <div class="icon-section">
                                            <span class="material-icons-outlined">delete</span>
                                        </div>
                                        <div class="icon-section">
                                            <span class="material-icons-outlined">visibility</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>

                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Jouel Johnson</td>
                                    <td>5</td>
                                    <td>22/04/2022</td>
                                    <td>20000</td>
                                    <td>500</td>
                                    <td>19500</td>
                                    <td class="action-section">
                                        <div class="icon-section">
                                            <span class="material-icons-outlined">delete</span>
                                        </div>
                                        <div class="icon-section">
                                            <span class="material-icons-outlined">visibility</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>

                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Jouel Johnson</td>
                                    <td>5</td>
                                    <td>22/04/2022</td>
                                    <td>20000</td>
                                    <td>500</td>
                                    <td>19500</td>
                                    <td class="action-section">
                                        <div class="icon-section">
                                            <span class="material-icons-outlined">delete</span>
                                        </div>
                                        <div class="icon-section">
                                            <span class="material-icons-outlined">visibility</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>


                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Jouel Johnson</td>
                                    <td>5</td>
                                    <td>22/04/2022</td>
                                    <td>20000</td>
                                    <td>500</td>
                                    <td>19500</td>
                                    <td class="action-section">
                                        <div class="icon-section">
                                            <span class="material-icons-outlined">delete</span>
                                        </div>
                                        <div class="icon-section">
                                            <span class="material-icons-outlined">visibility</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>

                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Jouel Johnson</td>
                                    <td>5</td>
                                    <td>22/04/2022</td>
                                    <td>20000</td>
                                    <td>500</td>
                                    <td>19500</td>
                                    <td class="action-section">
                                        <div class="icon-section">
                                            <span class="material-icons-outlined">delete</span>
                                        </div>
                                        <div class="icon-section">
                                            <span class="material-icons-outlined">visibility</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>

                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Jouel Johnson</td>
                                    <td>5</td>
                                    <td>22/04/2022</td>
                                    <td>20000</td>
                                    <td>500</td>
                                    <td>19500</td>
                                    <td class="action-section">
                                        <div class="icon-section">
                                            <span class="material-icons-outlined">delete</span>
                                        </div>
                                        <div class="icon-section">
                                            <span class="material-icons-outlined">visibility</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>

                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Jouel Johnson</td>
                                    <td>5</td>
                                    <td>22/04/2022</td>
                                    <td>20000</td>
                                    <td>500</td>
                                    <td>19500</td>
                                    <td class="action-section">
                                        <div class="icon-section">
                                            <span class="material-icons-outlined">delete</span>
                                        </div>
                                        <div class="icon-section">
                                            <span class="material-icons-outlined">visibility</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>

                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Jouel Johnson</td>
                                    <td>5</td>
                                    <td>22/04/2022</td>
                                    <td>20000</td>
                                    <td>500</td>
                                    <td>19500</td>
                                    <td class="action-section">
                                        <div class="icon-section">
                                            <span class="material-icons-outlined">delete</span>
                                        </div>
                                        <div class="icon-section">
                                            <span class="material-icons-outlined">visibility</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>


                    </div>

                </div>



            </div>
            <!-- End Of Container -->

        </main>
        <!-- End Of Main -->

    </section>


    <section id="popup">

        <div class="container1">

            <div class="popup-window">

                <div class="popup-header">

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Invoice Number:</div>
                        <div class="input-field">1</div>
                    </div>

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Customer Name:
                        </div>
                        <div class="input-field">Joel Johnson</div>
                    </div>

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Address:</div>
                        <div class="input-field">4025-100-Washington</div>
                    </div>

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Contact:</div>
                        <div class="input-field">0952525252</div>
                    </div>


                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Date:</div>
                        <div class="input-field">25-08-2022</div>
                    </div>

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Paymet Type:</div>
                        <div class="input-field">Cash Payment</div>
                    </div>
                </div>
                <!-- End Of Popup Header -->

                <hr class="upper-hr">

                <!-- Popup Body  -->
                <!-- <div class="popup-body-header">
                                                                                                              <div class="headers">Med Name</div>
                                                                                                              <div class="headers">Unit</div>
                                                                                                              <div class="headers">Quantity</div>
                                                                                                              <div class="headers">Unit Price</div>
                                                                                                              <div class="headers">Av.Qty</div>
                                                                                                              <div class="headers">Expiry</div>
                                                                                                              <div class="headers">Discount</div>
                                                                                                              <div class="headers">Total</div>
                                                                                                            </div> -->
                <!-- End Of Popup Body -->

                <!-- <hr class="lower-hr"> -->

                <div class="bill-rows">
                    <div class="table-data">
                        <table class="popup-table">
                            <thead>
                                <tr>
                                    <td>Med-Name</td>
                                    <td>Unit</td>
                                    <td>Quantity</td>
                                    <td>Unit Price</td>
                                    <td>Price</td>
                                    <td>Av.Qty</td>
                                    <td>Expiry</td>
                                    <td>Discount</td>
                                    <td>Total</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Cirosin 500</td>
                                    <td>piece</td>
                                    <td>5</td>
                                    <td>2000</td>
                                    <td>10000</td>
                                    <td>15</td>
                                    <td>04-2023</td>
                                    <td>500</td>
                                    <td>9500</td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td>Rose Flex 200</td>
                                    <td>piece</td>
                                    <td>1</td>
                                    <td>10000</td>
                                    <td>10000</td>
                                    <td>50</td>
                                    <td>08-2022</td>
                                    <td>0</td>
                                    <td>10000</td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td>Face Washing Soup</td>
                                    <td>piece</td>
                                    <td>2</td>
                                    <td>5000</td>
                                    <td>10000</td>
                                    <td>78</td>
                                    <td>10-2024</td>
                                    <td>0</td>
                                    <td>10000</td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td>Skincare Cream</td>
                                    <td>piece</td>
                                    <td>5</td>
                                    <td>3000</td>
                                    <td>15000</td>
                                    <td>55</td>
                                    <td>04/2025</td>
                                    <td>1000</td>
                                    <td>14000</td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td>Skincare Liquid</td>
                                    <td>piece</td>
                                    <td>2</td>
                                    <td>3000</td>
                                    <td>6000</td>
                                    <td>22</td>
                                    <td>04/2026</td>
                                    <td>500</td>
                                    <td>5500</td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td>Gentamisine</td>
                                    <td>Bottle</td>
                                    <td>2</td>
                                    <td>11000</td>
                                    <td>22000</td>
                                    <td>28</td>
                                    <td>05/2023</td>
                                    <td>1000</td>
                                    <td>21000</td>
                                </tr>
                            </tbody>

                        </table>


                    </div>
                    <!-- <div class="bill-body-values">

                                                                                                                <div>
                                                                                                                  <input class="body-input-field" type="text" name="" value="">
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

                                                                                                              </div> -->
                    <!-- End Of Bill Body Values -->

                    <!-- <hr class="horizontal-rule"> -->

                </div>
                <!-- End Of Bill Rows -->

                <hr class="horizontal-rule">
                <div class="final-sub-bill-results">

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Total Price:</div>
                        <div class="input-field">73000</div>
                    </div>

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Total Discount:</div>
                        <div class="input-field">3000</div>
                    </div>

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Total Net:</div>
                        <div class="input-field">70000</div>
                    </div>

                </div>
                <!-- End Of Final Sub-Results -->

                <hr class="horizontal-rule">

                <!-- Final Results -->
                <div class="final-bill-results">

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Paid:</div>
                        <div class="input-field">70000</div>
                    </div>

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Rest:</div>
                        <div class="input-field">0</div>
                    </div>

                    <div class="btn-adjustment">
                        <button class="btn-decoration" id="close-btn" type="button" name="button">Close</button>
                    </div>

                </div>
                <!-- End Of Final Results -->

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


        document.getElementById("close-btn").addEventListener("click",
            function() {
                document.querySelector(".container1").style.display = "none";
            });
    </script>
@endsection

@push('scripts')
    <script src="JS/invoice-manage.js"></script>
@endpush
