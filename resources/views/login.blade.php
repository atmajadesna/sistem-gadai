@extends('home15')

@section('head15')
Masuk
@endsection

@section('center15')

<div class="auth">
    <div class="auth__head">
        <h1>Masuk</h1>
        <p>Masuk dengan akun yang sudah terdaftar di sistem.</p>
    </div>

    <div class="panel">
        <div class="panel__body">

            @if ($errors->any())
                <div class="notice">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div class="notice notice--ok">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ url('login') }}">
                @csrf

                <div class="field">
                    <label for="nim">Username</label>
                    <input type="text"
                           id="nim"
                           name="nim"
                           value="{{ old('nim') }}"
                           placeholder="Masukkan username"
                           autocomplete="username"
                           required
                           autofocus>
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <input type="password"
                           id="password"
                           name="password"
                           placeholder="Masukkan password"
                           autocomplete="current-password"
                           required>
                </div>

                <button type="submit" class="btn btn--primary btn--block">
                    Masuk
                </button>
            </form>

        </div>
    </div>

    <p class="auth__hint">Akun demo — <code>admin</code> / <code>admin123</code> atau <code>petugas</code> / <code>petugas123</code></p>
</div>

@endsection
