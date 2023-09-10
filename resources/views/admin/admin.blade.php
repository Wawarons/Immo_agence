<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>@yield('title') | administration</title>
    <style>
        @layer reset {
            button {
                all: unset;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Agence</a>
    <div class="navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item"><a href="/biens" class="nav-link">biens</a></li>
            @auth
            <li class="nav-item">
                <a class="nav-link" href="/admin/property">Gérer les biens</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/option">Gérer les options</a>
            </li>
            @endauth
        </ul>

        <div class="ms-auto">
            @auth
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="nav-link">Se deconnecter</button>
                        </form>
                    </li>
                </ul>
            @endauth
        </div>
    </div>
</nav>

<div class="container mt-5">
    @include('shared.flash')
    @yield('content')
</div>

<script>
    new TomSelect('select[multiple', {plugins: {remove_button: {title: 'Supprimer'}}});
</script>
</body>
</html>
