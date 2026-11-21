<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Master Kamar</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">

                    <h3 class="text-center mb-2">Login</h3>
                    <p class="text-center text-muted mb-4">
                        SIlakan masuk ke MAster Kamar
                    </p>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form action="{{ route('login.proses') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="username" class="form-label">
                                Username
                            </label>
                            <input
                                type="text"
                                class="form-control"
                                id="username"
                                name="username"
                                value="{{ old('username') }}"
                                required
                                autofocus
                            >
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">
                                Password
                            </label>
                            <input
                                type="password"
                                class="form-control"
                                id="password"
                                name="password"
                                required
                            >
                        </div>

                        <div class="form-check mb-4">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="remember"
                                name="remember"
                            >
                            <label class="form-check-label" for="remember">
                                Ingat saya
                            </label>
                        </div>

                        <button type="submit" class="btn btn-secondary w-100">
                            Masuk
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
