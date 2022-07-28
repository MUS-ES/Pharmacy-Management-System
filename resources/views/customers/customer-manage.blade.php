@extends("layouts.master")
@section('title', 'PMS')
@push('head')
    <link rel="stylesheet" href="{{ asset('css/customer_manage.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/customer_manage.js') }}"></script>
    <script src="{{ asset('js/popup.js') }}"></script>
@endpush

@section('main')
    <!-- Main -->
    <main>
        <!-- Main Head -->
        <h1 class="title">Manage Customers</h1>
        <!-- End Of Main Head -->
        <div class="container">
            <div class="bill">
                <form action="{{ asset('customer/download') }}" method="POST">
                    <div class="search-area bill-header">
                        <div class="bill-labelsandinputs">
                            <div class="sub-title">Search By Customer Name:</div>
                            <input oninput="searchPage()" id="sea-name" class="input-field" type="text"
                                placeholder="Customer Name" name="name" value="">
                        </div>

                        <div class="pdf-file">
                            {{ csrf_field() }}
                            <button id="generate-pdf" type="submit">Generate PDF</button>

                        </div>
                </form>
            </div>

            <hr>

            <div id="table-area" class="table-data">
                @push('scripts')
                    <script>
                        searchPage();
                    </script>
                @endpush
            </div>
        </div>
        </div>
        <!-- End Of Container -->

    </main>
@endsection
