@props([
	'hAlign' => 'left',
	'vAlign' => 'bottom'
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
		@class([
			'left-0' => $hAlign === 'left',
			'right-0' => $hAlign === 'right',
            'bottom-full' => $vAlign === 'top',
            'top-full' => $vAlign === 'bottom',
			'menu-shadow absolute z-40 my-2 rounded-md bg-white py-1 transition-all'
		])
	>
		{{$list}}
	</div>
</div>
