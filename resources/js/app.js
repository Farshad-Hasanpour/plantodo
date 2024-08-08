import './bootstrap';
import AsyncAlpine from 'async-alpine';
import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
AsyncAlpine.init(Alpine);

// Define AsyncAlpine Components here
Alpine.data('dropdown', () => ({
	dropdownOpen: false,
	close(){
		this.dropdownOpen = false;
	},
	toggle() {
		this.dropdownOpen = !this.dropdownOpen;
	}
}));

AsyncAlpine.start();
Livewire.start()
