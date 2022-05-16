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
                            <input id="from-date" class="input-field" type="date" name="" value="{{ $from }}">
                        </div>

                        <div class="bill-labelsandinputs">
                            <div class="sub-title">Search By Date:</div>
                            To:
                            <input id="to-date" class="input-field" type="date" name="" value="{{ $to }}">
                        </div>

                        <div id="refresh-btn" class="refresh-btn">
                            <span class="material-icons-outlined">autorenew</span>
                        </div>

                    </div>
                    <div class="table-data">
                        <table>
                            <thead>
                                <tr>
                                    <td>Inv-Num</td>
                                    <td>Customer Name</td>
                                    <td>Total Price</td>
                                    <td>Total Discount</td>
                                    <td>Total Net</td>
                                    <td>Date</td>
                                    <td>Actions</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invoices as $invoice)
                                    <tr>
                                        <td>{{ $invoice->number }}
                                        </td>
                                        <td>{{ $invoice->customer }}</td>
                                        <td>{{ $invoice->total }}</td>
                                        <td>{{ $invoice->total_discount }}</td>
                                        <td>{{ $invoice->total_net }}</td>
                                        <td>{{ $invoice->invoice_date }}</td>
                                        <td class="action-section">
                                            <a href='/deleteinvoice/{{ $invoice->number }} ' class="icon-section">
                                                <span class="material-icons-outlined">delete</span>
                                            </a>
                                            <button onclick="showInvoiceItems(this)"
                                                style="background-color: transparent ; border:none" id="show-items"
                                                data-id="{{ $invoice->number }}" class="icon-section">
                                                <span class="material-icons-outlined">visibility</span>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
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


    </section>
@endsection


@push('scripts')
    <script src="js/invoice-manage.js"></script>
@endpush
