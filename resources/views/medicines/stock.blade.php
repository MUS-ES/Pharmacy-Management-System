@extends("layouts.master")
@section('title', 'PMS')
@push('head')
    <link rel="stylesheet" href="{{ asset('css/stock.css') }}">
@endpush
@push('scripts')
    <script src="js/stock_manage.js"></script>
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

            <button onclick="openWindow('#popup','.new-entry')" id="add-entry-btn">Add New Entry</button>

        </div>
        <!-- End Of Container -->

    </main>
    <!-- End Of Main -->

@endsection

@section('popup')
    <div class="new-entry">
        <div class="popup-container">
            <div class="header">
                <h3>New Entry</h3>
                <span onclick="closeWindow('#popup','.new-entry')"
                    class="cancel-btn material-icons-outlined">highlight_off</span>
            </div>
            <div class="body">
                <div class="input-container">
                    <div class="input-header-container">
                        <label for="">Medicine Name</label>
                        <span>+add new</span>
                    </div>
                    <input id="stock-medicine-name" oninput="autoCompleteMed(this);" type="text">
                    <span class="invlaid-feedback"></span>
                    <ul id="list-medicine" class="list">

                    </ul>
                    <span class="invlaid-feedback"></span>
                </div>
                <div class="input-container merge">
                    <label for="">Mfd</label>
                    <input id="stock-mfd" type="date">
                    <span class="invlaid-feedback"></span>
                </div>
                <div class="input-container merge">
                    <label for="">Exp</label>
                    <input id="stock-exp" type="date">
                    <span class="invlaid-feedback"></span>
                </div>
                <div class="input-container merge">
                    <label for="">Qty</label>
                    <input id="stock-qty" type="number">
                    <span class="invlaid-feedback"></span>
                </div>
                <div class="input-container">
                    <div class="input-header-container">
                        <label for="">Supplier Name</label>
                        <span>+add new</span>
                    </div>
                    <input id="stock-supplier" type="text">
                    <span class="invlaid-feedback"></span>
                </div>
                <button onclick="saveStock()" id="add-entry-btn">Submit</button>
            </div>
        </div>
    </div>
@endsection
