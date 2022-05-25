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
            <div class="input-container medicine">

                <label for="">Medicine Name</label>
                <input id="medicine-name" type="text" value="">
                <span class="invalid-feedback"></span>
            </div>
            <div class="input-container generic-name">

                <label for="">Generic Name</label>
                <input id="gereric-name" type="text" value="">
                <span class="invalid-feedback"></span>
            </div>
            <div class="input-container strip">

                <label for="">Strip</label>
                <input id="strip" type="number" value="">
                <span class="invalid-feedback"></span>

            </div>
            <div class="input-container price">

                <label for="">Price</label>
                <input id="price" type="number" value="">
                <span class="invalid-feedback"></span>
            </div>
            <div class="input-container description">

                <label for="">Description</label>

                <textarea name="" id="description" cols="80" rows="3"></textarea>
                <span class="invalid-feedback"></span>
            </div>
            <a onclick="save()" id="save-btn" href="#">SAVE</a>
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
