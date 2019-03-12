@extends('layouts.scaffold')

@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables/jquery.dataTables.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables/smantic/dataTables.semanticui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables/smantic/responsive.semanticui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert/sweetalert2.css') }}">
@append

@section('js')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    {{-- <script src="{{ asset('plugins/datatables/smantic/dataTables.semanticui.min.js') }}"></script> --}}
    <script src="{{ asset('plugins/datatables/smantic/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/smantic/responsive.semanticui.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalert/sweetalert2.js') }}"></script>
@append

@section('scripts')
    <script type="text/javascript">
        // global
        var dt = "";
        var formRules = [];
        var initModal = function(){
            return false;
        };
        var unModal = function(){
            return false;
        };

        $.fn.form.settings.prompt = {
            empty                : '{name} tidak boleh kosong',
            checked              : '{name} harus dipilih',
            email                : '{name} tidak valid',
            url                  : '{name} tidak valid',
            regExp               : '{name} is not formatted correctly',
            integer              : '{name} must be an integer',
            decimal              : '{name} must be a decimal number',
            number               : '{name} hanya boleh berisikan angka',
            is                   : '{name} must be "{ruleValue}"',
            isExactly            : '{name} must be exactly "{ruleValue}"',
            not                  : '{name} cannot be set to "{ruleValue}"',
            notExactly           : '{name} cannot be set to exactly "{ruleValue}"',
            contain              : '{name} cannot contain "{ruleValue}"',
            containExactly       : '{name} cannot contain exactly "{ruleValue}"',
            doesntContain        : '{name} must contain  "{ruleValue}"',
            doesntContainExactly : '{name} must contain exactly "{ruleValue}"',
            minLength            : '{name} setidaknya haru memiliki {ruleValue} karakter',
            length               : '{name} must be at least {ruleValue} characters',
            exactLength          : '{name} must be exactly {ruleValue} characters',
            maxLength            : '{name} tidak boleh lebih dari {ruleValue} karakter',
            match                : '{name} must match {ruleValue} field',
            different            : '{name} must have a different value than {ruleValue} field',
            creditCard           : '{name} must be a valid credit card number',
            minCount             : '{name} must have at least {ruleValue} choices',
            exactCount           : '{name} must have exactly {ruleValue} choices',
            maxCount             : '{name} must have {ruleValue} or less choices'
        };

    </script>
    @yield('rules')
    @yield('init-modal')
    
    @include('layouts.scripts.datatable')
    @include('layouts.scripts.actions')
@append

@section('content')
    @section('content-header')
        <div class="title-container">
            <div class="ui breadcrumb">
                <a href="#" class="section">
                    <i class="home icon"></i>
                </a>
                <?php $i=1; $last=count($breadcrumb);?>
                @foreach ($breadcrumb as $name => $link)
                    <i class="right chevron icon divider"></i>
                    @if($i++ != $last)
                        <a href="{{ $link }}" class="section">{{ $name }}</a>
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
        </div>
    @show

    <div class="ui clearing divider" style="border-top: none !important; margin:10px"></div>

    @section('content-body')
    <div class="ui grid">
        <div class="sixteen wide column main-content">
            <div class="ui segments">
                <div class="ui segment">
                    <form class="ui filter form">
                        <div class="inline fields">
                            {{-- <div class="field">
                                <select name="filter[entri]" id="" class="ui compact selection dropdown">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div> --}}
                            @section('filters')
                                <div class="field">
                                    <input name="filter[kode]" placeholder="Kode Area" type="text">
                                </div>
                                <div class="field">
                                    <input name="filter[area]" placeholder="Area" type="text">
                                </div>
                                <button type="button" class="ui teal icon filter button" data-content="Cari Data">
                                    <i class="search icon"></i>
                                </button>
                                <button type="reset" class="ui icon reset button" data-content="Bersihkan Pencarian">
                                    <i class="refresh icon"></i>
                                </button>
                            @show
                            <div style="margin-left: auto; margin-right: 1px;">
                                @section('toolbars')
                                @if($pagePerms == '' || auth()->user()->can($pagePerms.'-add'))
                                    <button type="button" class="ui blue add button">
                                        <i class="plus icon"></i>
                                        Tambah Data
                                    </button>
                                @endif
                                {{-- <button type="button" class="ui green button">
                                    <i class="file excel outline icon"></i>
                                    Export Excel
                                </button> --}}
                                @show
                            </div>
                        </div>
                    </form>

                    @section('subcontent')
                        @if(isset($tableStruct))
                        <table id="listTable" class="ui celled compact red responsive table" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    @foreach ($tableStruct as $struct)
                                        <th class="center aligned">{{ $struct['label'] or $struct['name'] }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @yield('tableBody')
                            </tbody>
                        </table>
                        @endif
                    @show
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