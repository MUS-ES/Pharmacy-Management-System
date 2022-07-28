@extends("layouts.master")
@section('title', 'PMS')
@push('head')
    <link rel="stylesheet" href="{{ asset('css/invoice_manage.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('js/invoice_manage.js') }}"></script>
    <script src="{{ asset('js/popup.js') }}"></script>
@endpush
@section('main')



    <!-- Main -->
    <main>
        <!-- Main Head -->
        <h1 class="title">Manage Invoices</h1>
        <!-- End Of Main Head -->
        <div class="container">
            <form action="{{ asset('invoice/download') }}" method="POST">
                <div class="bill">
                    <div class="bill-header search-area">

                        <div class="bill-labelsandinputs">
                            <div class="sub-title">Search By Invoice Number:</div>
                            <input oninput="searchPage()" id="sea-invoice-number" class="input-field" type="number"
                                placeholder="Invoice Number" name="id" value="">
                        </div>

                        <div class="bill-labelsandinputs">
                            <div class="sub-title">Search By Customer Name:</div>
                            <input oninput="searchPage()" id="sea-customer-name" class="input-field" type="text"
                                placeholder="Customer Name" name="customer" value="">
                        </div>

                        <div class="bill-labelsandinputs">
                            <div class="sub-title">Search By Date:</div>
                            From:
                            <input oninput="searchPage()" id="sea-from-date" class="input-field" type="date" name="from"
                                value="">
                        </div>

                        <div class="bill-labelsandinputs">
                            <div class="sub-title">Search By Date:</div>
                            To:
                            <input oninput="searchPage()" id="sea-to-date" class="input-field" type="date" name="to"
                                value="">
                        </div>


                        <div class="pdf-file">
                            {{ csrf_field() }}
                            <button id="generate-pdf" type="submit">Generate PDF</button>

                        </div>
                    </div>
            </form>


            <div id="table-area" class="table-data">
                @push('scripts')
                    <script>
                        searchPage();
                    </script>
                @endpush


            </div>


        </div>
        </div>
        <!-- End Of Container -->

    </main>
    <!-- End Of Main -->

@endsection
