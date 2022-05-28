    <!-- Sidebar Section -->
    <section id="sidebar" class="active">
        <!-- Sidebar Brand -->
        <a href="#" class="active brand">
            <span class="icon material-icons-outlined">local_hospital</span>
            <h3 id="brand-txt">PMS</h3>
        </a>
        <!-- End Of Sidebar Brand -->

        <!-- Sidebar Elements -->
        <ul class="side-menu">

            <li>
                <a href="{{ asset('dashboard') }}">
                    <span class="icon material-icons-outlined">space_dashboard</span>
                    <h3>Dashboard</h3>
                </a>
            </li>

            <li>
                <a href="#">
                    <span class="icon material-icons-outlined">list_alt</span>
                    <h3>Invoices</h3>
                    <span class="icon-right material-icons-outlined">expand_more</span>
                </a>
                <ul class="side-dropdown">
                    <li><a href="{{ asset('/invoice/add') }}"><span class="material-icons-outlined">add</span>New
                            Invoice</a>
                    </li>
                    <li><a href="{{ asset('/invoice/manage') }}"><span
                                class="material-icons-outlined">edit</span>Manage
                            Invoice</a></li>
                    <li><a href="{{ route('returnedMedicines') }}"><span
                                class="material-icons-outlined">assignment_return</span>Returned Medicines</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#">
                    <span class="icon material-icons-outlined">personal_injury</span>
                    <h3>Customers</h3>
                    <span class="icon-right material-icons-outlined">expand_more</span>
                </a>
                <ul class="side-dropdown">
                    <li><a href="{{ asset('/customer/add') }}"><span class="material-icons-outlined">add</span>Add
                            Customer</a></li>
                    <li><a href="{{ asset('/customer/manage') }}"><span
                                class="material-icons-outlined">edit</span>Manage Customer</a></li>
                </ul>
            </li>

            <li>
                <a href="#">
                    <span class="icon material-icons-outlined">medication</span>
                    <h3>Medicines</h3>
                    <span class="icon-right material-icons-outlined">expand_more</span>
                </a>
                <ul class="side-dropdown">
                    <li><a href="{{ asset('medicine/add') }}"><span class="material-icons-outlined">add</span>Add
                            Medicine</a></li>
                    <li><a href="{{ asset('medicine/manage') }}"><span
                                class="material-icons-outlined">edit</span>Manage
                            Medicine</a></li>
                    <li><a href="{{ asset('/stock/manage') }}"><span
                                class="material-icons-outlined">inventory_2</span>Manage
                            Medicine Stock</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#">
                    <span class="icon material-icons-outlined">airport_shuttle</span>
                    <h3>Suppliers</h3>
                    <span class="icon-right material-icons-outlined">expand_more</span>
                </a>
                <ul class="side-dropdown">
                    <li><a href="#"><span class="material-icons-outlined">add</span>Add Supplier</a></li>
                    <li><a href="#"><span class="material-icons-outlined">edit</span>Manage Supplier</a></li>
                </ul>
            </li>

            <li>
                <a href="#">
                    <span class="icon material-icons-outlined">point_of_sale</span>
                    <h3>Purchase</h3>
                    <span class="icon-right material-icons-outlined">expand_more</span>
                </a>
                <ul class="side-dropdown">
                    <li><a href="{{ asset('/purchase/add') }}"><span class="material-icons-outlined">add</span>Add
                            Purchase</a></li>
                    <li><a href="{{ asset('/purchase/manage') }}"><span
                                class="material-icons-outlined">edit</span>Manage Purchase</a></li>
                    <li><a href="#"><span class="material-icons-outlined">assignment_returned</span>Returned
                            Purchases</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#">
                    <span class="icon material-icons-outlined">receipt_long</span>
                    <h3>Vouchars</h3>
                    <span class="icon-right material-icons-outlined">expand_more</span>
                </a>
                <ul class="side-dropdown">
                    <li><a href="#"><span class="material-icons-outlined">attach_money</span>Payment Voucher</a></li>
                    <li><a href="#"><span class="material-icons-outlined">money_off_csred</span>Receipt Voucher</a></li>
                </ul>
            </li>

            <li>
                <a href="#">
                    <span class="icon material-icons-outlined">perm_contact_calendar</span>
                    <h3>Reports</h3>
                    <span class="icon-right material-icons-outlined">expand_more</span>
                </a>
                <ul class="side-dropdown">
                    <li><a href="#"><span class="material-icons-outlined">summarize</span>Sales Report</a></li>
                    <li><a href="#"><span class="material-icons-outlined">summarize</span>Purchase Report</a></li>
                </ul>
            </li>

            <li>
                <a href="#">
                    <span class="icon material-icons-outlined">manage_search</span>
                    <h3>Search</h3>
                    <span class="icon-right material-icons-outlined">expand_more</span>
                </a>
                <ul class="side-dropdown">
                    <li><a href="#"><span class="icon material-icons-outlined">list_alt</span>Invoice</a></li>
                    <li><a href="#"><span class="icon material-icons-outlined">personal_injury</span>Customer</a></li>
                    <li><a href="#"><span class="icon material-icons-outlined">medication</span>Medicine</a></li>
                    <li><a href="#"><span class="icon material-icons-outlined">airport_shuttle</span>Supplier</a></li>
                    <li><a href="#"><span class="icon material-icons-outlined">point_of_sale</span>Purchase</a></li>
                </ul>
            </li>

            <li>
                <a href="#">
                    <span class="icon material-icons-outlined">people_alt</span>
                    <h3>About Us</h3>
                </a>
            </li>

            <li>
                <a href={{ route('signout') }}>
                    <span class="icon material-icons-outlined">logout</span>
                    <h3>Sign Out</h3>
                </a>
            </li>

        </ul>
        <!-- End Of Sidebar Elements -->
    </section>
    <!-- End Of Sidebar -->
