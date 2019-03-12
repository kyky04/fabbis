<script type="text/javascript">
	$(document).ready(function() {
		$('button[data-content]').popup({
			hoverable: true,
			position : 'top center',
			delay: {
				show: 300,
				hide: 800
			}
		});

		dt = $('#listTable').DataTable({
	        dom: 'rt<"bottom"ip><"clear">',
			responsive: true,
			autoWidth: false,
			processing: true,
			@if(!$mockup)
			serverSide: true,
			@endif
			lengthChange: false,
			pageLength: 10,
			filter: false,
			sorting: [],
			language: {
				url: "{{ asset('plugins/datatables/Indonesian.json') }}"
			},
			@if(!$mockup)
			ajax:  {
				url: "{{ url($pageUrl) }}/grid",
				type: 'POST',
				data: function (d) {
					d._token = "{{ csrf_token() }}";
					@yield('js-filters')
				}
			}, 
			@endif
			columns: {!! json_encode($tableStruct) !!},
			drawCallback: function() {
				var api = this.api();

				api.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
					cell.innerHTML = parseInt(cell.innerHTML)+i+1;
				} );
				@if(isset($footer_total))
			        var json = api.ajax.json();
			    	console.log(json);
			         $(this).append(@yield('total'));
			    @endif
				$('[data-content]').popup({
					hoverable: true,
					position : 'top center',
					delay: {
						show: 300,
						hide: 800
					}
				});

				//Calender
				// $('.ui.calendar').calendar({
				// 	type: 'date'
				// });

				//Popup							
				$('.checked.checkbox')
				  .popup({
				    popup : $('.custom.popup'),
				    on    : 'click'
				  })
				;
			}
		});

		$('.filter.button').on('click', function(e) {
			dt.draw();
			e.preventDefault();
		});
		$('.reset.button').on('click', function(e) {
			$('.dropdown .delete').trigger('click');
			$('.dropdown').dropdown('restore defaults');
			setTimeout(function(){
				dt.draw();
			}, 100);
		});
	});
</script>