import './bootstrap';
import AsyncAlpine from 'async-alpine';
import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
AsyncAlpine.init(Alpine);

// Define AsyncAlpine Components here

AsyncAlpine.start();
Livewire.start()
