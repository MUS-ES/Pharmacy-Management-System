@extends("layouts.master")
@section('title', 'PMS')
@push('head')
    <link rel="stylesheet" href="{{ asset('css/medicine-manage.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('js/medicine-manage.js') }}"></script>
@endpush

@section('main')

    <!-- Main -->
    <main>
        <!-- Main Head -->
        <h1 class="title">Manage Medicine</h1>
        <!-- End Of Main Head -->
        <div class="container">
            <div class="search-area">
                <span>Search</span>
                <input oninput="search()" id="sea-name" type="text" placeholder="By Medicine Name">
                <input oninput="search()" id="sea-generic" type="text" placeholder="By Generic Name">
                <input oninput="search()" id="sea-supplier" type="text" placeholder="By Supplier Name">
            </div>


            <hr>
            <div id="table-area">
                @push('scripts')
                    <script>
                        search()
                    </script>
                </div>
            @endpush
        </div>
        <!-- End Of Container -->

    </main>
    <!-- End Of Main -->

@endsection
