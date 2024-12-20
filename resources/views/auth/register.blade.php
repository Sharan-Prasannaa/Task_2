<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <div class="form-container">
        <h2 class="form-title">Create Account</h2>



        <form method="POST" action="{{ url('/create') }}">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
          @endif
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
                <label for="name" class="form-label">Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-input @error('name') border-red-500 @enderror"
                    value="{{ old('name') }}"
                    required
                    placeholder="Enter your name"
                >
                @error('name')
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

            <div class="form-group">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input
                    type="password"
                    id="confirm_password"
                    name="confirm_password"
                    class="form-input"
                    required
                    placeholder="Confirm your password"
                >
            </div>

            <button type="submit" class="submit-button">
                Create Account
            </button>
        </form>

        <div class="login-link">
            Already have an account? <a href="{{ url('/login') }}">Sign in</a>
        </div>
    </div>
</body>
</html>
