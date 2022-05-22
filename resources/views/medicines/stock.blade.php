@extends("layouts.master")
@section('title', 'PMS')
@push('head')
    <link rel="stylesheet" href="{{ asset('css/stock.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('js/stock_manage.js') }}"></script>
    <script src="{{ asset('js/popup.js') }}"></script>
@endpush
@section('main')

    <!-- Main -->
    <main>
        <h1 class="title">Manage Stock</h1>
        <div class="container">
            <div class="search-area">
                <span>Search</span>
                <input oninput="search()" id="sea-name" type="text" placeholder="By Medicine Name">
                <input oninput="search()" id="sea-generic" type="text" placeholder="By Generic Name">
                <input oninput="search()" id="sea-supplier" type="text" placeholder="By Supplier Name">
                <button onclick="addRule(this)" id="out-of-stock-btn">Out Of
                    Stock</button>
                <button onclick="addRule(this)" id="expire-btn">Expire</button>
            </div>
            <hr>
            <div id="table-area">
                @push('scripts')
                    <script>
                        search()
                    </script>
                @endpush
            </div>
            <hr>

            <button onclick="openPopup('/ajax/popup/stock/add')" id="add-entry-btn">Add New Entry</button>

        </div>
        <!-- End Of Container -->

    </main>
    <!-- End Of Main -->

@endsection

@section('popup')

@endsection
