<nav>

    <span class="toggle-sidebar material-icons-outlined">menu</span>


    <div class="nav-profile">

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
    </div>
</nav>
