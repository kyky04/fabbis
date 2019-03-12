@extends('layouts.auth')

@section('content')
    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <h2 class="ui red image header">
                {{-- <img src="{{ asset('img/grosir-logo.png') }}" class="image" style="width:16em"> --}}
                <div class="content">
                    SIM PREMI - MARGIE ANDALAN
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
            
            <form class="ui large form" role="form" method="POST" action="{{ route('password.email') }}">
                {!! csrf_field() !!}
                <div class="ui stacked segment">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input type="email"  placeholder="E-mail address" name="email" value="{{ old('email') }}">
                        </div>
                    </div>
                    <button type="submit" class="ui fluid large blue submit button">Send Password Reset Link</button>
                </div>

            </form>

            <div class="ui message">
                <a href="{{ url('/login') }}">Kembali ke Halaman Login</a>
            </div>
        </div>
    </div>
@endsection
