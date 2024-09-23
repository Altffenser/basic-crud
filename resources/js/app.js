import './bootstrap';
import 'flowbite';
import '@tabler/icons-webfont/dist/tabler-icons.css';

import Alpine from 'alpinejs';
import Animate from '@charrafimed/alpine-animation'
import Ajax from "@imacrayon/alpine-ajax";
import {Tooltip} from "flowbite";


window.Alpine = Alpine;

Alpine.plugin(Animate)
Alpine.plugin(Ajax)

Alpine.start();
