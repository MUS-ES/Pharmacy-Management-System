@extends("layouts.main")
@section('head')
    <link rel="stylesheet" href="{{ asset('css/panel.css') }}">
@endsection
@section('title', 'Admin Panel')

@section('header')

    <header>
        <div class="container">
            <i class="fa-brands fa-vaadin"></i>
            <h2>Admin Panel</h2>
            <form action="{{ route('admin.logout') }}">
                @csrf
                <button class="logout" href="{{ route('admin.logout') }}" type="submit">Sign out</a>
            </form>
        </div>
        </div>
    </header>
@endsection

@section('content')
    <main>
        <div class="container">

            @if (count($users) == 0)

                <h2>No Registerd Users</h2>
            @else
                <table>
                    <tr>
                        <th>Pharmacy Name</th>
                        <th>Licence ID</th>
                        <th>Email</th>
                        <th colspan="2">Action</th>
                    </tr>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->ph_name }}</td>
                            <td>{{ $user->licence }}</td>
                            <td>{{ $user->email }}</td>
                            <td>

                                @if ($user->active == 0)
                                    <a href="{{ route('admin.panel.activeUser', $user->id) }}" class="conf-btn">
                                        <i class="fa-solid fa-check"></i>
                                        activate

                                    </a>
                                @else
                                    <a href="{{ route('admin.panel.deActiveUser', $user->id) }}" class="conf-btn">
                                        <i class="fa-solid fa-check"></i>
                                        deactivate

                                    </a>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.panel.deleteUser', $user->id) }}" class="del-btn">
                                    <i class="fa-solid fa-x"></i>
                                    Delete

                                </a>
                            </td>
                        </tr>
                    @endforeach
            @endif
            </table>

        </div>
    </main>
@endsection
