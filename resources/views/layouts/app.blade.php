<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Course Area') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    @yield('css')
    <style>
        .menu {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: white;
            font-family: 'Baloo 2', cursive;
            font-size: 24px;
        }

        .sub_menu {
            float: left;
        }

        .sub_menu a,
        .drop_btn {
            display: inline-block;
            color: black;
            text-align: center;
            padding: 16px 32px;
            text-decoration: none;
        }

        .sub_menu a:hover,
        .dropdown-ls:hover .drop_btn {
            background-color: #3498fb;
            transition: 0.5s;
            text-decoration: none;
        }

        .sub_menu.dropdown-ls {
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #333;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: black;
        }

        .dropdown-ls:hover .dropdown-content {
            display: block;
        }

        .delete_this {
            display: flex;
            color: white;
            font-family: 'Arial';
            justify-content: center;
            font-size: 60px;
            margin-top: 240px;
            margin-bottom: 240px
        }

        .menu {
            border: 1px solid white;
            /* background-color: #f4f4f4; */
            -webkit-box-shadow: 0px 0px 14px 0px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: 0px 0px 14px 0px rgba(0, 0, 0, 0.75);
            box-shadow: 0px 0px 14px 0px rgba(0, 0, 0, 0.75);
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
        }
    </style>
    <style>
        .chip {
            padding: 8px 10px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 12px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, .25);
            margin: 0 10px;

            cursor: pointer;
        }

        .chip.primary {
            background: #2F4058;
            color: whitesmoke;
        }

        .chip.secondary {
            background: #242933;
            color: #777;
        }

        .chip.warning {
            background: #FEB904;
            color: whitesmoke;
        }

        .chip.danger {
            background: #DA605B;
            color: whitesmoke;
        }

        .chip.info {
            background: #5FD6D4;
            color: whitesmoke;
        }

        .chip-avatar {
            border-radius: 30px;
            justify-content: center;
            display: flex;
            align-items: center;
        }

        .chip-avatar img {
            height: 25px;
            width: 25px;
            border-radius: 50px;
        }

        .chip-avatar label {
            margin-left: 5px;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div id="app">
        <ul class="menu">
            <li class="sub_menu"><a href="{{url('home')}}">Home</a></li>
            @if (Auth::user()->u_tp_id==1)
            <li class="dropdown-ls sub_menu">
                <a href="javascript:void(0)" class="drop_btn">Manage Courses</a>
                <div class="dropdown-content">
                    <a href="{{url('add-course')}}">Add Course</a>
                    <a href="{{url('view-courses')}}">View Courses</a>
                    <a href="{{url('assign-course')}}">Assign Course</a>
                </div>
            </li>
            @else

            <li class="dropdown-ls sub_menu">
                <a href="javascript:void(0)" class="drop_btn">My Course Area</a>
                <div class="dropdown-content">
                    <a href="{{url('view-courses')}}">View Courses</a>
                </div>
            </li>

            @endif

            <li class="dropdown-ls sub_menu" style="float: right">
                <a href="javascript:void(0)" class="drop_btn">
                    @php
                    $checkUserPoints =
                    App\Models\User::checkUserPoints();
                    @endphp
                    @if (Auth::user()->u_tp_id==2)
                    <span class="chip info">
                        {{$checkUserPoints .' Points'}}
                    </span>
                    @endif
                    {{ Auth::user()->name }}</a>

                <div class="dropdown-content">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
        <main class="py-4">
            @if ($errors->any())
            <div class="col-6 m-auto">
                <div class="alert  alert-warning alert-dismissible fade show" role="alert">
                    @foreach ($errors->all() as $error)
                    <span>
                        <p>{{ $error }}</p>
                    </span>
                    @endforeach
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @endif

            @if (session('success'))
            <div class="col-6 m-auto">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @endif

            @if (session('error'))
            <div class="col-6 m-auto">
                <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @endif
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('assets/assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    @yield('js')
</body>

</html>