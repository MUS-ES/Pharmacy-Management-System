@extends("layouts.master")
@section('title', 'PMS')
@section('sidenav')
    <!-- Sidebar Section -->
    <section id="sidebar" class="active">
        <!-- Sidebar Brand -->
        <a href="{{ asset('#') }}" class="active brand">
            <span class="icon material-icons-outlined">local_hospital</span>
            <h3 id="brand-txt">PMS</h3>
        </a>
        <!-- End Of Sidebar Brand -->

        <!-- Sidebar Elements -->
        <ul class="side-menu">

            <li>
                <a href="{{ asset('#') }}">
                    <span class="icon material-icons-outlined">space_dashboard</span>
                    <h3>Dashboard</h3>
                </a>
            </li>

            <li>
                <a href="{{ asset('#') }}">
                    <span class="icon material-icons-outlined">list_alt</span>
                    <h3>Invoices</h3>
                    <span class="icon-right material-icons-outlined">expand_more</span>
                </a>
                <ul class="side-dropdown">
                    <li><a href="{{ asset('#') }}"><span class="material-icons-outlined">add</span>New Invoice</a></li>
                    <li><a href="{{ asset('#') }}"><span class="material-icons-outlined">edit</span>Manage Invoice</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="{{ asset('#') }}">
                    <span class="icon material-icons-outlined">personal_injury</span>
                    <h3>Customers</h3>
                    <span class="icon-right material-icons-outlined">expand_more</span>
                </a>
                <ul class="side-dropdown">
                    <li><a href="{{ asset('#') }}"><span class="material-icons-outlined">add</span>Add Customer</a></li>
                    <li><a href="{{ asset('#') }}"><span class="material-icons-outlined">edit</span>Manage Customer</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="{{ asset('#') }}">
                    <span class="icon material-icons-outlined">medication</span>
                    <h3>Medicines</h3>
                    <span class="icon-right material-icons-outlined">expand_more</span>
                </a>
                <ul class="side-dropdown">
                    <li><a href="{{ asset('#') }}"><span class="material-icons-outlined">add</span>Add Medicine</a></li>
                    <li><a href="{{ asset('#') }}"><span class="material-icons-outlined">edit</span>Manage Medicine</a>
                    </li>
                    <li><a href="{{ asset('#') }}"><span class="material-icons-outlined">inventory_2</span>Manage
                            Medicine Stock</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="{{ asset('#') }}">
                    <span class="icon material-icons-outlined">airport_shuttle</span>
                    <h3>Suppliers</h3>
                    <span class="icon-right material-icons-outlined">expand_more</span>
                </a>
                <ul class="side-dropdown">
                    <li><a href="{{ asset('#') }}"><span class="material-icons-outlined">add</span>Add Supplier</a></li>
                    <li><a href="{{ asset('#') }}"><span class="material-icons-outlined">edit</span>Manage Supplier</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="{{ asset('#') }}">
                    <span class="icon material-icons-outlined">point_of_sale</span>
                    <h3>Purchase</h3>
                    <span class="icon-right material-icons-outlined">expand_more</span>
                </a>
                <ul class="side-dropdown">
                    <li><a href="{{ asset('#') }}"><span class="material-icons-outlined">add</span>Add Purchase</a></li>
                    <li><a href="{{ asset('#') }}"><span class="material-icons-outlined">edit</span>Manage Purchase</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="{{ asset('#') }}">
                    <span class="icon material-icons-outlined">summarize</span>
                    <h3>Reports</h3>
                    <span class="icon-right material-icons-outlined">expand_more</span>
                </a>
                <ul class="side-dropdown">
                    <li><a href="{{ asset('#') }}"><span class="material-icons-outlined">summarize</span>Sales
                            Report</a></li>
                    <li><a href="{{ asset('#') }}"><span class="material-icons-outlined">summarize</span>Purchase
                            Report</a></li>
                </ul>
            </li>

            <li>
                <a href="{{ asset('#') }}">
                    <span class="icon material-icons-outlined">manage_search</span>
                    <h3>Search</h3>
                    <span class="icon-right material-icons-outlined">expand_more</span>
                </a>
                <ul class="side-dropdown">
                    <li><a href="{{ asset('#') }}"><span class="icon material-icons-outlined">list_alt</span>Invoice</a>
                    </li>
                    <li><a href="{{ asset('#') }}"><span
                                class="icon material-icons-outlined">personal_injury</span>Customer</a></li>
                    <li><a href="{{ asset('#') }}"><span
                                class="icon material-icons-outlined">medication</span>Medicine</a></li>
                    <li><a href="{{ asset('#') }}"><span
                                class="icon material-icons-outlined">airport_shuttle</span>Supplier</a></li>
                    <li><a href="{{ asset('#') }}"><span
                                class="icon material-icons-outlined">point_of_sale</span>Purchase</a></li>
                </ul>
            </li>

            <li>
                <a href="{{ asset('#') }}">
                    <span class="icon material-icons-outlined">people_alt</span>
                    <h3>About Us</h3>
                </a>
            </li>

            <li>
                <a href="{{ route('logout') }}">
                    <span class="icon material-icons-outlined">logout</span>
                    <h3>Sign Out</h3>
                </a>
            </li>

        </ul>
        <!-- End Of Sidebar Elements -->

    </section>
    <!-- End Of Sidebar -->
@endsection

@section('content')
    <!-- Content -->
    <section id="content">

        <!-- Navbar Contents -->
        <nav>

            <span class="toggle-sidebar material-icons-outlined">menu</span>

            <form action="#">
                <div class="form-group">
                    <input type="text" placeholder="Search Here...">
                    <span class="icon material-icons-outlined">search</span>
                </div>
            </form>

            <a href="{{ asset('#') }}" class="nav-link">
                <span class="icon material-icons-outlined">notifications</span>
                <span class="badge">5</span>
            </a>

            <span class="divider"></span>

            <div class="profile">
                <img src="{{ asset('images/home/profile-pec.png') }}" alt="Profile Image">
                <ul class="profile-link">

                    <li>
                        <a href="{{ asset('#') }}">
                            <span class="icon material-icons-outlined">account_circle</span>
                            <h5>Profile</h5>
                        </a>
                    </li>

                    <li>
                        <a href="{{ asset('#') }}">
                            <span class="icon material-icons-outlined">settings</span>
                            <h5>Setting</h5>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('logout') }}">
                            <span class="icon material-icons-outlined">logout</span>
                            <h5>Logout</h5>
                        </a>
                    </li>

                </ul>
            </div>
        </nav>
        <!--End Of Navbar Contents -->

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
                        <div class="cardName">Total Medicine</div>
                    </div>
                    <div class="iconBx">
                        <span class="material-icons-outlined">medical_services</span>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">{{ $card['TotalSales'] }}sp</div>
                        <div class="cardName">Total Sales Today</div>
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
                        <div class="cardName">Treasury</div>
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
                        <h3>Sales Report</h3>
                        <div class="menu">
                            <span class="icon material-icons-outlined">more_horiz</span>
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
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->qty }}</td>
                                    <td>{{ $order->price }}</td>
                                    <td>{{ $order->total }}</td>
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

    </section>
    <!-- End Of Content -->


    <!-- Apex Charts -->
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/apexcharts') }}"></script>

    <!-- JavaScript Link -->
    <script src="{{ asset('js/home.js') }}"></script>
@endsection
