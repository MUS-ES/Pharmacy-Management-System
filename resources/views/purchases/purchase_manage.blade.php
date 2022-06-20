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

            <div class="bill">
                <div class="bill-header search-area">

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Search By Purchase Number:</div>
                        <input oninput="search()" id="sea-purchase-number" class="input-field" type="number"
                            placeholder="Purchase Number" name="" value="">
                    </div>

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Search By Supplier Name:</div>
                        <input oninput="search()" id="sea-supplier-name" class="input-field" type="text"
                            placeholder="Supplier Name" name="" value="">
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
    <!-- End Of Main -->

@endsection
