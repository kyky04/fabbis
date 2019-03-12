@foreach($items as $item)
	@if(is_null($item->perms) || auth()->user()->can($item->perms.'-view'))
		@if(!$item->hasChildren())
			<a href="{!! $item->url() !!}" class="item" tabindex="{{ $item->id }}">
				<i class=" icon"></i>
				<i class="{{ $item->icon }} icon"></i>{!! $item->title !!}
			</a>
		@else
			<div class="ui title" tabindex="{{ $item->id }}">
				<i class="dropdown icon"></i>
				<i class="{{ $item->icon }} icon"></i>
				{!! $item->title !!}
			</div>
			<div class="ui content" tabindex="-1">
				@foreach ($item->children() as $child)
					@if(is_null($child->perms) || auth()->user()->can($child->perms.'-view'))
						@if(!$child->hasChildren())
							<a href="{!! $child->url() !!}" class="item">
								<i class="{{ $child->icon }} icon"></i>{!! $child->title !!}
							</a>
						@else
							<div class="ui menu-dropdown item">
								<i class="dropdown icon"></i>
								<i class="{{ $child->icon }} icon"></i>{!! $child->title !!} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<div class="stackable menu">
									@foreach ($child->children() as $grandChild)
										@if(is_null($grandChild->perms) || auth()->user()->can($grandChild->perms.'-view'))
											<a href="{!! $grandChild->url() !!}" class="item">{!! $grandChild->title !!}</a>
										@endif
									@endforeach
								</div>
							</div>
						@endif
					@endif
				@endforeach
			</div>
		@endif
	@endif
@endforeach