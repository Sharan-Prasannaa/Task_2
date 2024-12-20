<!DOCTYPE html>
<html>
<head>
    <title>Customer Page</title>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
        <div class="welcome-text">
            Welcome Customer
            {{-- Welcome, {{$userData->name}} --}}
        </div>
        <form method="POST" action="">
            @csrf
            <button type="submit" class="logout-button">
                Logout
            </button>
        </form>
    </nav>

    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="main-content">
            <!-- Add your dashboard content here -->
        </div>
    </div>
</body>
</html>
