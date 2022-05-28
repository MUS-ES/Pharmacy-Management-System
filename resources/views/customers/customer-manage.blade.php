@extends("layouts.master")
@section('title', 'PMS')
@push('head')
    <link rel="stylesheet" href="{{ asset('css/customer-manage.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/customer_manage.js') }}"></script>
@endpush

@section('main')
    <!-- Main -->
    <main>
        <!-- Main Head -->
        <h1 class="title">Manage Customers</h1>
        <!-- End Of Main Head -->
        <div class="container">
            <div class="search-area">
                <span>Search</span>
                <input oninput="search()" id="sea-name" class="input-field" type="text" placeholder="by customer name"
                    name="" value="">
                <span onclick="search()" id="refresh-btn" class="material-icons-outlined">autorenew</span>
            </div>
            <hr>
            <div id="table-area">
                @push('scripts')
                    <script>
                        search();
                    </script>
                @endpush


            </div>
        </div>
        <!-- End Of Container -->

    </main>
@endsection