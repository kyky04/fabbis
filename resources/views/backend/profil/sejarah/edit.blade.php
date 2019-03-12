<div class="ui inverted loading dimmer">
		<div class="ui text loader">Loading</div>
</div>
<div class="header">Edit Data Jenis Obat</div>
<div class="content">
	<form class="ui data form" id="dataForm" action="{{ url($pageUrl.$record->id) }}" method="POST">
		{!! csrf_field() !!}
	    <input type="hidden" name="_method" value="PUT">
	    <input type="hidden" name="id" value="{{ $record->id }}">
		<div class="field">
			<label for="nama">Judul</label>
			<input type="text" name="judul" placeholder="Judul" value="{{ $record->judul }}">
		</div>
		<div class="field">
			<label for="">Konten</label>
			<textarea name="konten" rows="8" class="editor" style="height: 200px; resize:none;">{!! $record->konten !!}</textarea>
		</div>
		<div class="field">
			<label for="">Keterangan</label>
			<textarea name="keterangan" rows="4" style="height: 100px; resize:none;">{!! $record->keterangan !!}</textarea>
		</div>
		<div class="ui error message"></div>
	</form>
</div>
<div class="actions">
	<div class="ui negative button">
		Batal
	</div>
	<div class="ui positive right labeled icon save button">
		Simpan
		<i class="checkmark icon"></i>
	</div>
</div>