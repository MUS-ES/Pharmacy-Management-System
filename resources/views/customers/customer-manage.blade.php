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
            <div class= "bill">
             <div class="search-area bill-header">
                <div class="bill-labelsandinputs">
                    <div class="sub-title">Search By Customer Number:</div>
                    <input oninput="search()" id="sea-name" class="input-field" type="text" placeholder="Customer Name" name="" value="">
                  </div>

                  <div class="refresh-btn">
                    <span id="refresh-btn" onclick="search()" class="material-icons-outlined">autorenew</span>
                  </div>
             </div>

             <hr>
             
             <div id="table-area" class="table-data">
                @push('scripts')
                    <script>
                        search();
                    </script>
                @endpush
            </div>
          </div>
        </div>
        <!-- End Of Container -->

    </main>
@endsection
