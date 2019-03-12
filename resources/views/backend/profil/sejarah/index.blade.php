@extends('layouts.grid')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/summernote/summernote-lite.css') }}">
@append

@section('js')
	<script src="{{ asset('plugins/summernote/summernote-lite.js') }}"></script>
@append

@section('filters')
	<div class="field">
		<input name="filter[judul]" placeholder="Judul" type="text">
	</div>
	<div class="field">
		<input name="filter[keterangan]" placeholder="Keterangan" type="text">
	</div>
	<button type="button" class="ui teal icon filter button" data-content="Cari Data">
		<i class="search icon"></i>
	</button>
	<button type="reset" class="ui icon reset button" data-content="Bersihkan Pencarian">
		<i class="refresh icon"></i>
	</button>
@endsection

@section('js-filters')
    d.judul = $("input[name='filter[judul]']").val();
    d.keterangan = $("input[name='filter[keterangan]']").val();
@endsection

@section('rules')
<script type="text/javascript">
	formRules = {
		judul: 'empty',
		konten: 'empty',
	};
</script>
@endsection

@section('init-modal')
<script>
	initModal = function(){
      $('.editor').summernote({
		  height: '200px'
	  });
	};
</script>
@endsection