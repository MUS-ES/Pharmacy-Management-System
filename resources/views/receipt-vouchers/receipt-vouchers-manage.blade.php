@extends("layouts.master")
@section('title', 'PMS')
@push('head')
    <link rel="stylesheet" href="{{ asset('css/receipt-vouchers-manage.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/receipt-vouchers-manage.js') }}"></script>
@endpush

@section('main')
    <!-- Main -->
    <main>
        <!-- Main Head -->
        <h1 class="title">Manage Receipt Vouchers</h1>

    </main>
@endsection
