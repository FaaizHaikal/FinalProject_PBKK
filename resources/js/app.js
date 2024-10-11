/*
    Laravel Livewire
*/
import { Livewire } from '../../vendor/livewire/livewire/dist/livewire.esm';
Livewire.start()

// console logs
Livewire.on('ConsoleLog', message => {
    console.log(message);
});

// console error
Livewire.on('ConsoleError', message => {
    console.error(message);
});

/*
    UI Library
*/
import './bootstrap';
import 'flowbite';
