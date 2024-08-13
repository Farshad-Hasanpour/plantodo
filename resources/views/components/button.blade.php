@props([
	'variant' => 'primary',
	'type' => 'button',
	'ripple' => 'white',
])

@php
	$variants = [
    	'' => '',
    	'primary' => 'btn select-none uppercase px-3 py-2 bg-primary text-white rounded-md truncate disabled:bg-gray-500 disabled:cursor-not-allowed',
		'outline' => 'btn select-none uppercase px-3 py-2 bg-transparent hover:bg-opacity-10 border-current border-2 rounded-md truncate disabled:text-gray-400 disabled:cursor-not-allowed',
		'icon' => 'btn select-none box-center hover:bg-black/5 rounded-full disabled:opacity-40 disabled:cursor-not-allowed',
	]
@endphp

<button
	{{ $attributes->merge([
    	'class' => $variants[$variant]
    ]) }}
	type="{{$type}}"
	@if(!empty($ripple))
		data-twe-ripple-init
		data-twe-ripple-color="{{$ripple}}"
	@endif
>
	{{$slot}}
</button>
