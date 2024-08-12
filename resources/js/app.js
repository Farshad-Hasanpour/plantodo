import './bootstrap';
import AsyncAlpine from 'async-alpine';
import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import {
	Ripple,
	initTWE
} from "tw-elements";

initTWE({
	Ripple
});

AsyncAlpine.init(Alpine);

document.addEventListener('alpine:init', () => {
	Alpine.store('modals', {});
});

Alpine.data('dropdown', () => ({
	dropdownOpen: false,
	close(){
		this.dropdownOpen = false;
	},
	toggle() {
		this.dropdownOpen = !this.dropdownOpen;
	}
}));

Alpine.data('dialog', (id, open, persistent) => ({
	open: !!open,
	persistent: !!persistent,
	readyToBeClosed: false,
	init(){
		this.$store.modals[id] = Alpine.$data(this.$refs[id]);
	},
	closeByClick(){
		if(this.readyToBeClosed) this.open = false;
		this.readyToBeClosed = false;
	},
}));

// Define AsyncAlpine Components here

AsyncAlpine.start();
Livewire.start()
