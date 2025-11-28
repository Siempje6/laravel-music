<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Music App</title>
    <style>
        body { font-family: Arial, sans-serif; margin:0; padding:0; background:#f5f5f5; }
        nav { background:#333; color:white; padding:1rem; }
        nav a { color:white; margin-right:1rem; text-decoration:none; }
        table { width:100%; border-collapse: collapse; margin-top:1rem; }
        th, td { border:1px solid #ccc; padding:0.5rem; text-align:left; }
        th { background:#eee; }
        a.button { padding:0.4rem 0.8rem; background:#007BFF; color:white; text-decoration:none; border-radius:4px; }
        a.button:hover { background:#0056b3; }
        form { display:inline; }
        button { padding:0.4rem 0.8rem; background:#dc3545; color:white; border:none; border-radius:4px; cursor:pointer; }
        button:hover { background:#a71d2a; }
        .container { width:90%; margin:2rem auto; }
    </style>
</head>
<body>
    <nav>
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ route('bands.index') }}">Bands</a>
        <a href="{{ route('albums.index') }}">Albums</a>
    </nav>
    <div class="container">
        @if(session('success'))
            <div style="background:#d4edda;color:#155724;padding:0.5rem;border-radius:4px;margin-bottom:1rem;">
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </div>
</body>
</html>
