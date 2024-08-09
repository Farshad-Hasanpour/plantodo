import './bootstrap';
import AsyncAlpine from 'async-alpine';
import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
AsyncAlpine.init(Alpine);

Alpine.data('dropdown', () => ({
	dropdownOpen: false,
	close(){
		this.dropdownOpen = false;
	},
	toggle() {
		this.dropdownOpen = !this.dropdownOpen;
	}
}));

Alpine.data('dialog', (open, persistent) => ({
	open: !!open,
	persistent: !!persistent,
	readyToBeClosed: false,
	closeByClick(){
		if(this.readyToBeClosed) this.open = false;
		this.readyToBeClosed = false;
	},
}));

// Define AsyncAlpine Components here

AsyncAlpine.start();
Livewire.start()
