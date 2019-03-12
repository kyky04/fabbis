@extends('layouts.auth')

@section('content')
    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <h2 class="ui red image header">
                {{-- <img src="{{ asset('img/grosir-logo.png') }}" class="image" style="width:16em"> --}}
                <div class="content">
                    {{ env('APP_NAME', 'Laravel') }}
                </div>
            </h2>

            @if (count($errors) > 0)
            <div class="ui negative message">
                <i class="close icon"></i>
                <div class="header">
                    <strong>Mohon Maaf, </strong>Terjadi Kesalahan<br>
                </div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form class="ui large form" role="form" method="POST" action="{{ url('/login') }}">
                {!! csrf_field() !!}
                <div class="ui stacked segment">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input type="email"  placeholder="E-mail address" name="email" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input type="password" name="password" placeholder="Password">
                        </div>
                    </div>
                    <button type="submit" class="ui fluid large blue submit button">Login</button>
                </div>

            </form>

            <div class="ui message">
                {{-- New to us? <a href="#">Sign Up</a> --}}
                Lupa Password? <a href="{{ url('/password/reset') }}">Reset Password</a>
            </div>
        </div>
    </div>
@endsection
