{{-- Loops to a depth of 5. A maximum for chart of accounts --}}
<h4><strong>{{ $account['identifier'] }}</strong> - {{ $account['name'] }}
	<span class="pull-right small"><a href="/chart-of-accounts/{{ $account['id'] }}/add">Add Account</a></span>
</h4>
@if(isset($account['children']))
	@foreach($account['children'] as $children)
		<h5>
			&nbsp&nbsp&nbsp<strong>{{ $children['identifier'] }}</strong> - 
			<i class="glyphicon glyphicon-edit"></i> &nbsp&nbsp<a href="/chart-of-accounts/{{ $children['id'] }}/edit">{{ $children['name'] }}</a>
			<span class="pull-right small"><a href="/chart-of-accounts/{{ $children['id'] }}/add">Add Account</a></span>
		</h5>
		@if(isset($children['children']))
			@foreach($children['children'] as $children)
				<h5>
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<strong>{{ $children['identifier'] }}</strong> - 
					<i class="glyphicon glyphicon-edit"></i> &nbsp&nbsp<a href="/chart-of-accounts/{{ $children['id'] }}/edit">{{ $children['name'] }}</a>
					<span class="pull-right small"><a href="/chart-of-accounts/{{ $children['id'] }}/add">Add Account</a></span>
				</h5>
				@if(isset($children['children']))
					@foreach($children['children'] as $children)
						<h5>
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							<strong>{{ $children['identifier'] }}</strong> - 
							<i class="glyphicon glyphicon-edit"></i> &nbsp&nbsp<a href="/chart-of-accounts/{{ $children['id'] }}/edit">{{ $children['name'] }}</a>
						</h5>
						@if(isset($children['children']))
							@foreach($children['children'] as $children)
								<h5>
									&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspnbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
									<strong>{{ $children['identifier'] }}</strong> - 
									<i class="glyphicon glyphicon-edit"></i> &nbsp&nbsp<a href="/chart-of-accounts/{{ $children['id'] }}/edit">{{ $children['name'] }}</a>
								</h5>
								@if(isset($children['children']))
									@foreach($children['children'] as $children)
										<h5>
											&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspnbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
											&nbspnbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
												<strong>{{ $children['identifier'] }}</strong> - 
											<i class="glyphicon glyphicon-edit"></i> &nbsp&nbsp<a href="/chart-of-accounts/{{ $children['id'] }}/edit">{{ $children['name'] }}</a>
										</h5>
									@endforeach
								@endif
							@endforeach
						@endif
					@endforeach
				@endif
			@endforeach
		@endif
	@endforeach
@endif