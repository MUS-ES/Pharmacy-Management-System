@extends("layouts.master")
@section('title', 'PMS')
@push('head')
    <link rel="stylesheet" href="{{ asset('css/medicine-manage.css') }}">
@endpush

@section('main')

    <!-- Main -->
    <main>
        <h1 class="title">Manage Medicine</h1>
        <div class="container">

        </div>
        <!-- End Of Container -->

    </main>
    <!-- End Of Main -->


    <section id="popup">


    </section>





@endsection

@push('head')
    <script src="js/medicine-manage.js"></script>
@endpush
