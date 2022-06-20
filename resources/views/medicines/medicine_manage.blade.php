@extends("layouts.master")
@section('title', 'PMS')
@push('head')
    <link rel="stylesheet" href="{{ asset('css/medicine_manage.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('js/medicine_manage.js') }}"></script>
    <script src="{{ asset('js/popup.js') }}"></script>
@endpush

@section('main')

    <!-- Main -->
    <main>
        <!-- Main Head -->
        <h1 class="title">Manage Medicine</h1>
        <!-- End Of Main Head -->
        <div class="container">
            <div class="bill">
                <div class="search-area bill-header">
                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Search By Medicine Name:</div>
                        <input oninput="search()" id="sea-name" class="input-field" type="text"
                            placeholder="Medicine Name" name="" value="">
                    </div>

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Search By Generic Name:</div>
                        <input oninput="search()" id="sea-generic" class="input-field" type="text"
                            placeholder="Generic Name" name="" value="">
                    </div>

                    <div class="bill-labelsandinputs">
                        <div class="sub-title">Search By Supplier Name:</div>
                        <input oninput="search()" id="sea-supplier" class="input-field" type="text"
                            placeholder="Supplier Name" name="" value="">
                    </div>
                </div>
                <hr>
                <div id="table-area" class="table-data">
                    @push('scripts')
                        <script>
                            search()
                        </script>
                    </div>
                @endpush
            </div>
        </div>
        <!-- End Of Container -->

    </main>
    <!-- End Of Main -->

@endsection
