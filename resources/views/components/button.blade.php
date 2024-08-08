@props([
	'variant' => 'primary',
	'type' => 'button',
])

@php
	$variants = [
    	'primary' => 'btn uppercase px-3 py-2 bg-primary text-white rounded-md truncate disabled:bg-gray-500 disabled:cursor-not-allowed',
		'icon' => 'btn hover:bg-black/5 rounded-full disabled:opacity-40 disabled:cursor-not-allowed',
	]
@endphp

<button
	{{ $attributes->merge([
    	'class' => $variants[$variant]
    ]) }}
	type="{{$type}}"
>
	{{$slot}}
</button>
