@extends("layouts.master")
@section('title', 'PMS')

@section('main')
    <!-- Sidebar Compoenent -->



    <!-- Main -->
    <main>
        <!-- Main Head -->
        <h1 class="title">Dashboard</h1>
        <!-- End Of Main Head -->

        <!-- Cards -->
        <div class="cardBox">

            <div class="card">
                <div>
                    <div class="numbers">{{ $card['TotalCustomer'] }}</div>
                    <div class="cardName">Total Customers</div>
                </div>
                <div class="iconBx">
                    <span class="material-icons-outlined">group_add</span>
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="numbers">{{ $card['TotalSuppliers'] }}</div>
                    <div class="cardName">Total Suppliers</div>
                </div>
                <div class="iconBx">
                    <span class="material-icons-outlined">groups</span>
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="numbers">{{ $card['TotalMedicines'] }}</div>
                    <div class="cardName">Total Medicine </div>
                </div>
                <div class="iconBx">
                    <span class="material-icons-outlined">medical_services</span>
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="numbers">{{ $card['TotalSales'] }}sp</div>
                    <div class="cardName">Chest</div>
                </div>
                <div class="iconBx">
                    <span class="material-icons-outlined">monetization_on</span>
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="numbers">{{ $card['OutOfStock'] }}</div>
                    <div class="cardName">Out Of Stock</div>
                </div>
                <div class="iconBx">
                    <span class="material-icons-outlined">vaccines</span>
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="numbers">{{ $card['ExpMed'] }}</div>
                    <div class="cardName">Expired Medicines</div>
                </div>
                <div class="iconBx">
                    <span class="material-icons-outlined">assignment_late</span>
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="numbers">{{ $card['TotalPurchasesToday'] }}sp</div>
                    <div class="cardName">Total Purchase Today</div>
                </div>
                <div class="iconBx">
                    <span class="material-icons-outlined">add_shopping_cart</span>
                </div>
            </div>


            <div class="card">
                <div>
                    <div class="numbers">{{ $card['safe'] }}sp</div>
                    <div class="cardName">Safe</div>
                </div>
                <div class="iconBx">
                    <span class="material-icons-outlined">price_change</span>
                </div>
            </div>

        </div>
        <!-- End Of Cards -->

        <!-- Lower Data Section -->
        <div class="data">
            <!-- Chart -->
            <div id="right-adjustment" class="content-data">
                <div class="head">
                    <h3>Sales & Purchase Report</h3>
                    <div class="menu">
                        {{-- <span class="icon material-icons-outlined">more_horiz</span> --}}
                        <ul class="menu-link">
                            <li><a href="{{ asset('#') }}">Edit</a></li>
                            <li><a href="{{ asset('#') }}">Save</a></li>
                            <li><a href="{{ asset('#') }}">Remove</a></li>
                        </ul>
                    </div>
                </div>
                <div class="chart">
                    <div id="chart">
                    </div>
                </div>
            </div>
            <!-- End Of Chart -->

            <!-- Reecent Orders -->
            <div class="details content-data">
                <div class="recentOrders">
                    <div id="adjustment" class="cardHeader head">
                        <h3>Recent Orders</h3>
                        <a href="{{ asset('#') }}" class="btn">View All</a>
                    </div>

                    <table id="adjustment">

                        <thead>
                            <tr>
                                <td>Medicine Name</td>
                                <td>Quantity</td>
                                <td>Unit Price</td>
                                <td>Total Price</td>
                                <td>Payment</td>
                            </tr>
                        </thead>
                        @foreach ($RecentOrders as $order)
                            <tr>
                                <td>{{ $order->medicine->name }}</td>
                                <td>{{ $order->qty }}</td>
                                <td>{{ $order->medicine->price }}</td>
                                <td>{{ $order->invoice->total_net }}</td>
                                @if ($order->status == 'paid')
                                    <td><span class="status-paid">Paid</span></td>
                                @else
                                    <td><span class="status-due">Due</span></td>
                                @endif
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <!-- End Of Recent Orders -->

        </div>
        <!-- End Of Lower Data Section -->

    </main>
    <!-- End Of Main -->



    <!-- Apex Charts -->
    {{-- <script>

    </script> --}}
    @push('scripts')
        <script src="{{ asset('js/apexchart.js') }}">

        </script>
    @endpush
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/apexcharts') }}"></script>


@endsection
