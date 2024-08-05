@props([
	'hAlign' => 'left'
])

<div
	x-data="{dropdownOpen: false}"
	{{ $attributes->merge([
    	'class' => 'relative'
    ]) }}
	@click.outside="dropdownOpen = false"
>
	<div @click="dropdownOpen = !dropdownOpen">
		{{$trigger}}
	</div>
	<div
		x-cloak
		x-show="dropdownOpen"
		:class="dropdownOpen ? 'top-full' : 'top-[110%]' "
		@class([
			'left-0' => $hAlign === 'left',
			'right-0' => $hAlign === 'right',
			'menu-shadow absolute z-40 mt-2 rounded-md bg-white py-1 transition-all'
		])
	>
		{{$list}}
	</div>
</div>
