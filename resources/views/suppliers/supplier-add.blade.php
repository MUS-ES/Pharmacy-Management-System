@extends("layouts.master")
@section('title', 'PMS')
@push('head')
    <link rel="stylesheet" href="{{ asset('css/supplier_add.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/supplier_add.js') }}"></script>
    <script src="{{ asset('js/popup.js') }}"></script>
@endpush

@section('main')
    <!-- Main -->
    <main>
        <!-- Main Head -->
        <h1 class="title">Add a New Supplier</h1>
        <div class="container">
            <div class="content">
                <div class="input-container">
                    <div class="input-header-container">
                        <label for="">Supplier Name</label>
                    </div>
                    <input id="supplier-name" type="text">
                    <span class="invalid-feedback"></span>
                </div>

                <div class="input-container">
                    <div class="input-header-container">
                        <label for="">Supplier Email</label>
                    </div>
                    <input id="supplier-email" type="text">
                    <span class="invalid-feedback"></span>
                </div>

                <div class="input-container">
                    <div class="input-header-container">
                        <label for="">Contact Number</label>
                    </div>
                    <input id="supplier-contact" type="text">
                    <span class="invalid-feedback"></span>
                </div>

                <div class="input-container">
                    <div class="input-header-container">
                        <label for="">Address</label>
                    </div>
                    <input id="supplier-address" type="text">
                    <span class="invalid-feedback"></span>
                </div>


                <div class="add-btn">
                    <button onclick="save()" id="supplier-btn" type="button" name="button">
                        <span class="material-icons-outlined">add</span>
                    </button>
                </div>
            </div>
            <div class="card">
                <span class="material-icons-outlined">person_add</span>
            </div>
        </div>
    </main>
@endsection
