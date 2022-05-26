@extends("layouts.master")
@section('title', 'PMS')
@push('head')
    <link rel="stylesheet" href="{{ asset('css/purchase_manage.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('js/purchase-manage.js') }}"></script>
@endpush
@section('main')



    <!-- Main -->
    <main>
        <!-- Main Head -->
        <h1 class="title">Manage Invoices</h1>
        <!-- End Of Main Head -->
        <div class="container">



            <div class="search-area">
                <span>Search</span>
                <input oninput="search()" placeholder="by purchase number" id="sea-purchase-number" class="input-field"
                    type="number" name="" value="">
                <input oninput="search()" id="sea-supplier-name" class="input-field" type="text"
                    placeholder="by supplier name" name="" value="">
                <span>From</span>
                <input oninput="search()" id="sea-from-date" class="input-field" type="date" name="" value="">
                <span>To</span>
                <input oninput="search()" id="sea-to-date" class="input-field" type="date" name="" value="">
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
    <!-- End Of Main -->

@endsection
