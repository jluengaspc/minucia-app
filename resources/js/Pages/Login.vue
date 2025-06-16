<template>
  <form @submit.prevent="submit">
    <input v-model="form.email" placeholder="Correo" />
    <input v-model="form.password" type="password" placeholder="Contraseña" />
    <button type="submit">Entrar</button>
    <div v-if="errors.email" style="color: red">{{ errors.email }}</div>
    <div v-if="errors.password" style="color: red">{{ errors.password }}</div>
  </form>
</template>

<script setup>
import { reactive } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
  email: '',
  password: ''
});

function submit() {
  form.post('/login');
}
</script>