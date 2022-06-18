@extends("layouts.master")
@section('title', 'PMS')
@push('head')
    <link rel="stylesheet" href="{{ asset('css/voucher_manage.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/voucher_manage.js') }}"></script>
@endpush

@section('main')
    <!-- Main -->
    <main>
        <!-- Main Head -->
        <h1 class="title">Payment Vouchers Manage</h1>
        <!-- End Of Main Head -->
        <div class="container">

            <div class="bill">
                <div class="bill-header search-area">

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Search By Voucher Number:</div>
                        <input oninput="search()" id="sea-voucher-number" class="input-field" type="number"
                            placeholder="Voucher Number" name="" value="">
                    </div>
                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Search By Voucher Type:</div>
                        <input oninput="search()" id="sea-voucher-type" class="input-field" type="text"
                            placeholder="Voucher Type" name="" value="">
                    </div>

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Search By Date:</div>
                        From:
                        <input oninput="search()" id="sea-from-date" class="input-field" type="date" name="" value="">
                    </div>

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Search By Date:</div>
                        To:
                        <input oninput="search()" id="sea-to-date" class="input-field" type="date" name="" value="">
                    </div>

                    <div class="refresh-btn">
                        <span id="refresh-btn" onclick="search()" class="material-icons-outlined">autorenew</span>
                    </div>

                </div>

                <div id="table-area" class="table-data">
                    @push('scripts')
                        <script>
                            search();
                        </script>
                    @endpush


                </div>

            </div>

        </div>
        <!-- End Of Container -->

    </main>
@endsection
