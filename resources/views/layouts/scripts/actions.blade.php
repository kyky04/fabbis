<script type="text/javascript">	
	$(document).on('submit', '#dataForm', function(e){
		return false;
	});

	$(document).on('keydown', '.field input', function(e){
		if(e.keyCode == 13){
			e.preventDefault();
			$( ".save.button" ).trigger( "click" );
		}
	});

	$(document).on('click', '.add.button', function(e){
		var url = "{{ url($pageUrl) }}/create";

		loadModal(url);
	});

	$(document).on('click', '.add.button.uom', function(e) {
		addUom();
	});

	$(document).on('click', '.remove.button.uom', function(e) {
		removeUom();
	});

	$(document).on('click', '.add.button.uomp', function(e) {
		addUomp();
	});

	$(document).on('click', '.remove.button.uomp', function(e) {
		removeUomp();
	});

	$(document).on('click', '.edit.button', function(e){
		var id = $(this).data('id');
		var url = "{{ url($pageUrl) }}/"+id+"/edit";

		loadModal(url);
	});

	$(document).on('click', '.delete.button', function(e){
		var id = $(this).data('id');

		swal({
			title: 'Apakah anda yakin?',
			text: "Data yang sudah dihapus, tidak dapat dikembalikan!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result) {
				$.ajax({
					url: '{{ url($pageUrl) }}/'+id,
				    type: 'POST',
				    data: {_token: "{{ csrf_token() }}", _method: "delete"},
				    success: function(resp){
						swal(
							'Terhapus!',
							'Data berhasil dihapus.',
							'success'
						).then(function(e){
							dt.draw();
						});
				    },
				    error : function(resp){
						swal(
							'Gagal!',
							'Data gagal dihapus.',
							'error'
						).then(function(e){
							dt.draw();
						});
				    }
				});
				
			}
		})
	});

	function loadModal(url) {
		$('#formModal').modal({
			// inverted: true,
			observeChanges: true,
			closable: false,
			detachable: false, 
			autofocus: false,
			onApprove : function() {
				// self.modal('refresh');
				$("#dataForm").form('validate form');

				if($("#dataForm").form('is valid')){
					$('#formModal').find('.loading.dimmer').addClass('active');
					$("#dataForm").ajaxSubmit({
						success: function(resp){
							$("#formModal").modal('hide');
							swal(
								'Tersimpan!',
								'Data berhasil disimpan.',
								'success'
								).then((result) => {
									dt.draw();
									return true;
								})
							},
							error: function(resp){
								$('#formModal').find('.loading.dimmer').removeClass('active');
								var error = $('<ul class="list"></ul>');
								console.log(resp.responseJSON);
								$.each(resp.responseJSON, function(index, val) {
									error.append('<li>'+val+'</li>');
								});

								$('#formModal').find('.ui.error.message').html(error).show();
							}
						});	
				}
				return false;
			},
			onShow: function(){
				$('#formModal').find('.loading.dimmer').addClass('active');

				$(this).draggable({
		           cancel: ".note-editable, input, select, textarea, .ui.calendar, .ui.radio"
		        });

				$.get(url, { _token: "{{ csrf_token() }}", @yield('filter_detail') } )
				.done(function( response ) {
					$('#formModal').html(response);
					$('#dataForm').form({
						inline: true,
						fields: formRules
					});

					$('.ui.dropdown').dropdown();
					initModal();
				});
			},
			onHidden: function(){
				$('#formModal').html(`<div class="ui inverted loading dimmer">
										<div class="ui text loader">Loading</div>
									</div>`);
				unModal();
			}
		}).modal('show');
	}

	$(document).on('click', '.terima.button', function(e){
		var id = $(this).data('id');

		swal({
			title: 'Apakah Data Sudah Benar?',
			// text: "Data yang sudah dihapus, tidak dapat dikembalikan!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Terima',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result) {
				$.ajax({
					url: '{{ url($pageUrl) }}/'+id,
				    type: 'POST',
				    data: {_token: "{{ csrf_token() }}", _method: "delete"},
				    success: function(resp){
						swal(
							'Berhasil!',
							'Kartu Telah Diterima',
							'success'
						).then(function(e){
							dt.draw();
						});
				    },
				    error : function(resp){
						swal(
							'Gagal!',
							'error'
						).then(function(e){
							dt.draw();
						});
				    }
				});
				
			}
		})
	});
	formatRupiah = function($val=0){
		var bilangan = $val;
		var	number_string = bilangan.toString(),
		sisa 	= number_string.length % 3,
		rupiah 	= number_string.substr(0, sisa),
		ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
		
		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}
		return rupiah;
	}
	postNewTab = function(url, param)
	{
		var form = document.createElement("form");
        form.setAttribute("method", 'POST');
        form.setAttribute("action", url);
        form.setAttribute("target", "_blank");

		$.each(param, function(key, val) {
			var inputan = document.createElement("input");
                inputan.setAttribute("type", "hidden");
                inputan.setAttribute("name", key);
                inputan.setAttribute("value", val);
            form.appendChild(inputan);
		});

		document.body.appendChild(form);
        form.submit();

        document.body.removeChild(form);
	}
</script>