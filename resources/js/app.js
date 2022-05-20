require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { createApp } from 'vue'
import RoleList from './components/roles/RoleList'

const roles = createApp(RoleList)

roles.mount('#roles')
