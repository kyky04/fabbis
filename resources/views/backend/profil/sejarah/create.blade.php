<div class="ui inverted loading dimmer">
		<div class="ui text loader">Loading</div>
</div>
<div class="header">Buat Data Sejarah Baru</div>
<div class="content">
	<form class="ui data form" id="dataForm" action="{{ url($pageUrl) }}" method="POST">
		{!! csrf_field() !!}
		<div class="field">
			<label for="nama">Judul</label>
			<input type="text" name="judul" placeholder="Judul">
		</div>
		<div class="field">
			<label for="">Konten</label>
			<textarea name="konten" rows="8" class="editor" style="height: 200px; resize:none;"></textarea>
		</div>
		<div class="field">
			<label for="">Keterangan</label>
			<textarea name="keterangan" rows="4" style="height: 100px; resize:none;"></textarea>
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