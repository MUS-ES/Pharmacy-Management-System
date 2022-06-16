@extends("layouts.master")
@section('title', 'PMS')
@push('head')
    <link rel="stylesheet" href="{{ asset('css/medicine_add.css') }}">
@endpush

@section('main')






    <!-- Main -->
    <main>
        <!-- Main Head -->
        <h1 class="title">Add a New Medicine</h1>
        <!-- End Of Main Head -->

        <div class="container">
            <div class="content">
                <div class="input-container">
                    <div class="input-header-container">
                        <label for="">Medicine Name</label>
                    </div>
                    <input id="medicine-name" type="text">
                    <span class="invalid-feedback"></span>
                </div>

                <div class="input-container">
                    <div class="input-header-container">
                        <label for="">Generic Name</label>
                    </div>
                    <input id="gereric-name" type="text">
                    <span class="invalid-feedback"></span>
                </div>

                <div class="input-container">
                    <div class="input-header-container">
                        <label for="">Strip</label>
                    </div>
                    <input id="strip" type="number">
                    <span class="invalid-feedback"></span>
                </div>

                <div class="input-container">
                    <div class="input-header-container">
                        <label for="">Price</label>
                    </div>
                    <input id="price" type="number">
                    <span class="invalid-feedback"></span>
                </div>

                <div class="input-container">
                    <div class="input-header-container">
                        <label for="">Description</label>
                    </div>
                    <textarea name="" id="description" ></textarea>
                    <span class="invalid-feedback"></span>
                </div>


                <div class="add-btn">
                    <button onclick="save()" id="save-btn" type="button" name="button">
                        <span class="material-icons-outlined">add</span>
                    </button>
                </div>
            </div>
            <div class="card">
                <span class="material-icons-outlined">vaccines</span>
            </div>
        </div>
        <!-- End Of Container -->

    </main>
    <!-- End Of Main -->


@endsection
@section('popup')

@endsection
@push('scripts')
    <script src="{{ asset('js/medicine-add.js') }}"></script>
    <script src="{{ asset('js/popup.js') }}"></script>
@endpush
