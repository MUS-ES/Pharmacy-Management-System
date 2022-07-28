@extends("layouts.master")
@section('title', 'PMS')
@push('head')
    <link rel="stylesheet" href="{{ asset('css/medicine_manage.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('js/medicine_manage.js') }}"></script>
    <script src="{{ asset('js/popup.js') }}"></script>
@endpush

@section('main')

    <!-- Main -->
    <main>
        <!-- Main Head -->
        <h1 class="title">Manage Medicine</h1>
        <!-- End Of Main Head -->
        <div class="container">
            <form action="{{ asset('medicine/download') }}" method="POST">

                <div class="bill">
                    <div class="search-area bill-header">
                        <div class="bill-labelsandinputs">
                            <div class="sub-title">Search By Medicine Name:</div>
                            <input oninput="searchPage()" id="sea-name" class="input-field" type="text"
                                placeholder="Medicine Name" name="name" value="">
                        </div>

                        <div class="bill-labelsandinputs">
                            <div class="sub-title">Search By Generic Name:</div>
                            <input oninput="searchPage()" id="sea-generic" class="input-field" type="text"
                                placeholder="Generic Name" name="generic" value="">
                        </div>
                        <div class="pdf-file">
                            {{ csrf_field() }}
                            <button id="generate-pdf" type="submit">Generate PDF</button>

                        </div>
                    </div>
                    <hr>
                    <div id="table-area" class="table-data">
                        @push('scripts')
                            <script>
                                searchPage()
                            </script>
                        </div>
                    @endpush
                </div>
            </form>


        </div>
        <!-- End Of Container -->

    </main>
    <!-- End Of Main -->

@endsection
