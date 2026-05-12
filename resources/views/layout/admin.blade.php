<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js', 'resources/js/viacep.js'])
    <title>Sebrae - MT</title>
</head>
<body>

    <header class="p-3 text-bg-primary">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{ route('home') }}" class="nav-link px-2 text-white">Home</a></li>
                    @if(Auth::check())
                        <li><a href="{{ route('users.index') }}" class="nav-link px-2 text-white">Usuário</a></li>
                        <li><a href="{{ route('customers.index') }}" class="nav-link px-2 text-white">Clientes</a></li>
                    @endif
                </ul>
                <div class="text-end">
                    @if(Auth::check())
                        {{ Auth::user()->name }} | 
                        <form action="{{ route('login.destroy') }}" method="POST" style="display:inline;">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-outline-light me-2">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Login</a>
                        <a href="{{ route('users.create') }}" class="btn btn-outline-light me-2">Registrar-se</a>
                    @endif
                </div>
            </div>
        </div>
    </header>

    <div class="container mt-4">
        @yield('content')
    </div>
    
</body>
</html>