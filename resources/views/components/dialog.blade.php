@props([
	'id',
	'open' => false,
	'is_form' => false,
	'persistent' => false,
	'title' => '',
	'width' => '700px',
	'height' => 'auto',
	'on_save' => ''
])

<template x-teleport="body">
	<div
		x-data="dialog(
			'{{$id}}',
			{{$open ? 'true' : 'false'}},
			{{$persistent ? 'true' : 'false'}}
		)"
		x-ref="{{$id}}"
		id="{{$id}}"
		x-show="open"
		x-transition.opacity
		class="h-screen w-screen fixed top-0 left-0 z-5000 box-center bg-black/50"
		:class="!persistent ? 'cursor-pointer' : ''"
		@mousedown.stop="readyToBeClosed = !persistent"
		@mouseup.stop="closeByClick"
	>
		<{{$is_form ? 'form' : 'div'}}
			x-show="open"
			x-transition.scale
			class="dialog-content max-w-[90%] max-h-[90%] rounded-lg cursor-default w-full h-full bg-white flex flex-col items-stretch overflow-hidden"
			:style="`width: {{$width}}; height: {{$height}}`"
			@mouseup.stop
			@mousedown.stop
			@if($is_form)
				@submit.prevent="{{$on_save}}"
			@endif
		>
			<div class="shrink grow-0 flex items-center justify-between space-x-2 border-b-2 p-4">
				<div class="flex items-center space-x-2 text-gray-600">
					{{$header_icon ?? null}}
					<h3 class="dialog-title text-xl text-bold mb-0" x-text="{{ $title }}"></h3>
				</div>
				<x-button
					variant="icon"
					class="w-8 h-8 text-gray-600 flex items-center justify-center"
					ripple="gray-600"
					@click="open = false"
				>
					<x-icons.close class="w-4 h-4"></x-icons.close>
				</x-button>
			</div>

			<div class="p-4 overflow-x-hidden overflow-y-auto grow">
				<div class="max-width-[1500px] my-0 mx-auto">
					{{$content ?? null}}
				</div>
			</div>

			@isset($actions)
				<div
					class="shrink grow-0 flex flex-col lg:flex-row items-stretch justify-center p-4 space-y-4 lg:space-y-0 lg:space-x-4"
				>
					{{$actions}}
				</div>
			@endisset
		</{{$is_form ? 'form' : 'div'}}>
	</template>
</div>

@pushonce('styles')
<style>
.dialog-content {
	box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
}
</style>
@endpushonce
