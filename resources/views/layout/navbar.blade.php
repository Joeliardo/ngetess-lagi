<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Hello, {{ Auth::user()->name }}</a>
           
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link @yield('activeHome')" href="{{ route('user.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('activeRequest')" href="{{ route('friend-request.index') }}">Requests</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('activeFriend')" href="{{ route('friend.index') }}">Friends</a>
                </li>
                
            </ul>
            <form method="GET" action="{{ route('user.index') }}" class="mb-4">
                <div class="row">
                    <div class="col-md-8">
                        <input type="text" name="search" class="form-control" placeholder="Search by name"
                            value="{{ request('search') }}">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary w-100">Search</button>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </nav>
    <main class="container mt-5">
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
