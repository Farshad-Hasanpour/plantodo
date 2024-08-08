@props([
	'hAlign' => 'left', // left | right
	'vAlign' => 'bottom', // top | bottom
])

<div
	x-data="dropdown"
	{{ $attributes->merge([
    	'class' => 'relative'
    ]) }}
	x-on:click.outside="close"
>
	<div x-on:click="toggle">{{$trigger}}</div>
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
