@extends("layouts.master")
@section('title', 'PMS')
@push('head')
    <link rel="stylesheet" href="{{ asset('css/voucher_manage.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/voucher_manage.js') }}"></script>
    <script src="{{ asset('js/popup.js') }}"></script>
@endpush

@section('main')
    <!-- Main -->
    <main>
        <!-- Main Head -->
        <h1 class="title">Payment Vouchers Manage</h1>
        <!-- End Of Main Head -->
        <div class="container">
            <form action="{{ asset('voucher/download') }}" method="POST">

                <div class="bill">
                    <div class="bill-header search-area">

                        <div class="bill-labelsandinputs">
                            <div class="sub-title">Search By Voucher Number:</div>
                            <input oninput="searchPage()" id="sea-voucher-number" class="input-field" type="number"
                                placeholder="Voucher Number" name="id" value="{{ old('voucher_id') }}">
                        </div>
                        <div class="bill-labelsandinputs">
                            <div class="sub-title">Search By Voucher Type:</div>

                            <select oninput="searchPage()" id="sea-voucher-type" class="input-field" type="text"
                                placeholder="Voucher Type" name="type" value="{{ old('voucher_type') }}">
                                <option value="">All</option>
                                <option value="Payment">Payment</option>
                                <option value="Receipt">Receipt</option>
                                <option value="Cash">Cash</option>
                            </select>
                        </div>

                        <div class="bill-labelsandinputs">
                            <div class="sub-title">Search By Date:</div>
                            From:
                            <input oninput="searchPage()" id="sea-from-date" class="input-field" type="date" name="from"
                                value="{{ old('voucher_fdate') }}">
                        </div>

                        <div class="bill-labelsandinputs">
                            <div class="sub-title">Search By Date:</div>
                            To:
                            <input oninput="searchPage()" id="sea-to-date" class="input-field" type="date" name="to"
                                value="{{ old('voucher_tdate') }}">
                        </div>

                        <div class="pdf-file">
                            {{ csrf_field() }}
                            <button id="generate-pdf" type="submit">Generate PDF</button>

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
            </form>

        </div>
        <!-- End Of Container -->

    </main>
@endsection
