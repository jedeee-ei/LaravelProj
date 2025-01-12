<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarly</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif;
     }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-image: url('{{ asset('images/background.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Adjust opacity as needed */
        z-index: 1;
    }

    .login-card {
        background: white;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 400px;
        text-align: center;
        position: relative;
        z-index: 2;
    }

    .title {
        color: #333;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 8px;
    }

    .subtitle {
        color: #666;
        font-size: 16px;
        margin-bottom: 24px;
    }

    .form {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .input {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
        transition: border-color 0.2s;
    }

    .input:focus {
        outline: none;
        border-color: #2fb344;
        box-shadow: 0 0 0 2px rgba(47, 179, 68, 0.1);
    }

    .checkbox-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 8px;
    }

    .checkbox-label {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #666;
        font-size: 14px;
    }

    .forgot-password {
        color: #2196f3;
        text-decoration: none;
        font-size: 14px;
    }

    .forgot-password:hover {
        text-decoration: underline;
    }

    .login-button {
        background: #2fb344;
        color: white;
        border: none;
        padding: 12px;
        border-radius: 4px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    .login-button:hover {
        background: #27963a;
    }

    input[type="checkbox"] {
        accent-color: #2fb344;
    }
    </style>
</head>
<body>
    <div class="login-card">
        <h1 class="title">Scholarly</h1>
        <p class="subtitle">Hello! Let's get started. Sign in to continue.</p>

        <form class="form" method="POST" action="{{ route('login') }}">
            @csrf
            <input
                type="text"
                class="input @error('username') border-red-500 @enderror"
                name="username"
                placeholder="Enter your username"
                value="{{ old('username') }}"
                required
                autocomplete="username"
            >
            @error('username')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <input
                type="password"
                class="input @error('password') border-red-500 @enderror"
                name="password"
                placeholder="Enter your password"
                required
                autocomplete="current-password"
            >
            @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <div class="checkbox-container">
                <label class="checkbox-label">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span>Keep me signed in</span>
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot-password">
                        Forgot password?
                    </a>
                @endif
            </div>

            <button type="submit" class="login-button">Login</button>
        </form>
    </div>
</body>
</html>
