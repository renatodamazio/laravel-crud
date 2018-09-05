<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel CRUD</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto text-right">
                                <li class="nav-item">
                                    <a href="/dash"class="nav-link" >Dash</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/users"class="nav-link">Usuários</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
        <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>
    <script src="{{ asset('js/vendors/jquery.js') }}"></script>
    <script src="{{ asset('js/vendors/bootstrap.js') }}"></script>
    <script src="{{ asset('js/plugins/cpf.validator.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery.mask.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/users.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
