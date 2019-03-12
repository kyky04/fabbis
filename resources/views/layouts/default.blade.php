@extends('layouts.scaffold')

@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.semanticui.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert/sweetalert2.css') }}">
@append

@section('js')
    {{-- <script src="{{ asset('plugins/datatables/dataTables.semanticui.js') }}"></script> --}}
    <script src="{{ asset('plugins/sweetalert/sweetalert2.js') }}"></script>
@append

@section('scripts')
    <script type="text/javascript">

    </script>
    @yield('rules')
    @yield('init-modal')
    
{{--     @include('layouts.scripts.datatable') --}}
    @include('layouts.scripts.actions')
@append

@section('content')
    @section('content-header')
    <div class="ui breadcrumb">
        <?php $i=1; $last=count($breadcrumb);?>
        @foreach ($breadcrumb as $name => $link)
            @if($i++ != $last)
                <a href="{{ $link }}" class="section">{{ $name }}</a>
                <i class="right chevron icon divider"></i>
            @else
                <div class="active section">{{ $name }}</div>
            @endif
        @endforeach
    </div>
    <h2 class="ui header">
      <div class="content">
        {!! $title or '-' !!}
        <div class="sub header">{!! $subtitle or ' ' !!}</div>
      </div>
    </h2>
    @show

    <div class="ui clearing divider" style="border-top: none !important; margin:10px"></div>

    @section('content-body')
    <div class="ui grid">
        <div class="sixteen wide column main-content">
            <div class="ui segments">
                <div class="ui segment">
                    @yield('contents')
                </div>
            </div>
        </div>
    </div>
    @show
@endsection

@section('modals')
<div class="ui {{ $modalSize or 'mini' }} modal" id="formModal">
    <div class="ui inverted loading dimmer">
        <div class="ui text loader">Loading</div>
    </div>
</div>
@append