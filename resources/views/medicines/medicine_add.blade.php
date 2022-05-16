@extends("layouts.master")
@section('title', 'PMS')
@push('head')
    <link rel="stylesheet" href="{{ asset('css/medicine-add.css') }}">
@endpush

@section('content')


    <!-- Content -->
    <section id="content">

        <x-Nav />



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
                <a onclick="save()" id="save-btn" href="#">SAVE</a>
            </div>
            <!-- End Of Container -->

        </main>
        <!-- End Of Main -->

    </section>

    <section id="popup">


    </section>




@endsection

@push('scripts')
    <script src="js/medicine-add.js"></script>
@endpush
