@extends('layouts.auth')

@section('content')
    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <h2 class="ui red image header">
                <div class="content">
                    Mohon Maaf,<br>
                    Halaman Tidak Ditemukan
                </div>
            </h2>

            <div class="ui message">
                Kehilangan Jejak? Kembali ke <a href="{{ url()->previous() }}">Halaman Sebelumnya</a>
            </div>
        </div>
    </div>
@endsection
