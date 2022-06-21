require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { createApp } from 'vue'
import includes from './components/includes'
import RoleList from './components/roles/RoleList'

const roles = createApp(RoleList)

includes.forEach(include => {
  roles.component(include.name, include)
})

roles.mount('#roles')

