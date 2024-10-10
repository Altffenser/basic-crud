import './bootstrap';
import 'flowbite';
import '@tabler/icons-webfont/dist/tabler-icons.css';

import Alpine from 'alpinejs';
import morph from '@alpinejs/morph'
import Animate from '@charrafimed/alpine-animation'
import Ajax from "@imacrayon/alpine-ajax";
import {Tooltip} from "flowbite";


window.Alpine = Alpine;

Alpine.plugin(Animate)
Alpine.plugin(Ajax.configure({
    headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    }
}))

Alpine.start();
