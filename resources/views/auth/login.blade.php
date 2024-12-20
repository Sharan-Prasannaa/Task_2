<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <div class="form-container">
        @include('auth.message')
        <h2 class="form-title">Login Page</h2>
        <form method="POST" action="{{ url('/login') }}">
            @csrf
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-input @error('email') border-red-500 @enderror"
                    value="{{ old('email') }}"
                    required
                    placeholder="Enter your email"
                >
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-input @error('password') border-red-500 @enderror"
                    required
                    placeholder="Enter your password"
                >
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="submit-button">
                Login
            </button>
        </form>

        <div class="login-link">
            Don't have an account? <a href="{{ url('/register') }}">Register</a>
        </div>
    </div>
</body>
</html>
