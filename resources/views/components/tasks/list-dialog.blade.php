<x-dialog
	id="new-list-modal"
	title="Add a List"
	is_form
	on_save="addList"
>
	<x-slot:content>
		<div class="w-full" @close-list-dialog.window="open = false">
			<input
				wire:model.defer="new_list_form.name"
				type="text"
				class="rounded-lg bg-gray-100 w-full focus:ring-0 border-2 @error('new_list_form.name') border-error focus:border-error @else focus:border-primary @enderror"
				maxlength="255"
				placeholder="Enter the list name and press enter"
			/>
			<span class="block w-full text-error min-h-[24px]">
				@error('new_list_form.name') {{$message}} @enderror
			</span>
		</div>
	</x-slot:content>

	<x-slot:actions>
		<x-button type="submit" class="min-w-[100px]">
			<span wire:loading.remove wire:target="addList">Add</span>
			<x-icons.loading
				wire:loading
				wire:target="addList"
				class="w-6 h-6"
			></x-icons.loading>
		</x-button>
		<x-button
			variant="outline"
			class="min-w-[100px] text-error hover:bg-error"
			ripple="red"
			@click="open = false"
		>Close</x-button>
	</x-slot:actions>

	<x-slot:header_icon>
		<x-icons.pencil-plus-outline class="w-6 h-6"></x-icons.pencil-plus-outline>
	</x-slot:header_icon>
</x-dialog>
