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

            <div class="bill">
                <div class="bill-header search-area">

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Search By Invoice Number:</div>
                        <input oninput="searchPage()" id="sea-invoice-number" class="input-field" type="number"
                            placeholder="Invoice Number" name="" value="">
                    </div>

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Search By Customer Name:</div>
                        <input oninput="searchPage()" id="sea-customer-name" class="input-field" type="text"
                            placeholder="Customer Name" name="" value="">
                    </div>

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Search By Date:</div>
                        From:
                        <input oninput="searchPage()" id="sea-from-date" class="input-field" type="date" name=""
                            value="">
                    </div>

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Search By Date:</div>
                        To:
                        <input oninput="searchPage()" id="sea-to-date" class="input-field" type="date" name="" value="">
                    </div>

                    <div class="refresh-btn">
                        <span id="refresh-btn" onclick="searchPage()" class="material-icons-outlined">autorenew</span>
                    </div>

                </div>

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
