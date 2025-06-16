<!-- resources/views/login.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h2>Iniciar sesión</h2>

        @if (session('error'))
            <div style="color: red;">{{ session('error') }}</div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div>
                <label for="email">Correo:</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                @error('email')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" required>
                @error('password')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit">Ingresar</button>
        </form>
    </div>
</body>
</html>