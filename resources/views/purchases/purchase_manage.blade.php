@extends('layouts.master')
@section('title', 'PMS')
@push('head')
    <link rel="stylesheet" href="{{ asset('css/purchase_manage.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('js/purchase_manage.js') }}"></script>
    <script src="{{ asset('js/popup.js') }}"></script>
@endpush
@section('main')



    <!-- Main -->
    <main>
        <!-- Main Head -->
        <h1 class="title">Manage Purchases</h1>
        <!-- End Of Main Head -->
        <div class="container">
            <form action="{{ asset('purchase/download') }}" method="POST">

                <div class="bill">
                    <div class="bill-header search-area">

                        <div class="bill-labelsandinputs">
                            <div class="sub-title">Search By Purchase Number:</div>
                            <input oninput="searchPage()" id="sea-purchase-number" class="input-field" type="number"
                                placeholder="Purchase Number" name="id" value="">
                        </div>

                        <div class="bill-labelsandinputs">
                            <div class="sub-title">Search By Supplier Name:</div>
                            <input oninput="searchPage()" id="sea-supplier-name" class="input-field" type="text"
                                placeholder="Supplier Name" name="supplier" value="">
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
    <!-- End Of Main -->

@endsection
