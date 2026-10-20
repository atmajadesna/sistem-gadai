@extends('home15')

@section('head15')
Login - Gadai Berkah
@endsection

@section('header15')
<div class="container">
    <a class="navbar-brand" href="/">Gadai Berkah</a>
</div>
@endsection

@section('center15')

<div class="container d-flex justify-content-center">

    <div class="card" style="max-width:420px; width:100%;">

        <div class="card-header text-center">
            Login Sistem Gadai Berkah
        </div>

        <div class="card-body">

            @if ($errors->any())
            <div style="color:red; margin-bottom:20px;">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(session('success'))
            <div style="color:green; margin-bottom:20px;">
                {{ session('success') }}
            </div>
            @endif

            <form method="POST" action="{{ url('login') }}">
                @csrf

                <div class="mb-3">
                    <label>NIM (Username)</label>
                    <input type="text"
                           class="form-control"
                           name="nim"
                           value="{{ old('nim') }}"
                           placeholder="Masukkan NIM">
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password"
                           class="form-control"
                           name="password"
                           placeholder="Masukkan Password">
                </div>

                <button type="submit" class="btn btn-success w-100">
                    Login
                </button>

            </form>

        </div>
    </div>

</div>

@endsection

@section('footer15')
Kelompok 15 &copy; {{ date('Y') }}
@endsection