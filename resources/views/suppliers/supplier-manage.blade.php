@extends("layouts.master")
@section('title', 'PMS')
@push('head')
    <link rel="stylesheet" href="{{ asset('css/supplier_manage.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/supplier_manage.js') }}"></script>
    <script src="{{ asset('js/popup.js') }}"></script>
@endpush

@section('main')
    <!-- Main -->
    <main>
        <!-- Main Head -->
        <h1 class="title">Manage Suppliers</h1>
        <!-- End Of Main Head -->
        <div class="container">
            <form action="{{ asset('supplier/download') }}" method="POST">

                <div class="bill">
                    <div class="search-area bill-header">
                        <div class="bill-labelsandinputs">
                            <div class="sub-title">Search By Supplier Number:</div>
                            <input oninput="searchPage()" id="sea-name" class="input-field" type="text"
                                placeholder="Supplier Name" name="name" value="">
                        </div>

                        <div class="pdf-file">
                            {{ csrf_field() }}
                            <button id="generate-pdf" type="submit">Generate PDF</button>

                        </div>
                    </div>

                    <hr>

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
