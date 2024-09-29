<template>
  <div class="container p-8 mx-auto">
      <h1 class="text-sj-blue text-center text-2xl font-bold mb-8">REGISTRO</h1>

      <form v-on:submit="guardar" class="max-w-sm mx-auto bg-white rounded-lg shadow dark:border p-6 rounded-md">
          <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
            <input type="text" v-model="name" @input="sanitizeInput" id="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
            <p v-if="errorMessage" class="text-red-500 text-sm mt-2">{{ errorMessage }}</p>
          </div>
          <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="email" v-model="email" @input="validateEmail" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="nombre@gmail.com" required />
            <p v-if="emailErrorMessage" class="text-red-500 text-sm">{{ emailErrorMessage }}</p>
          </div>

          <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
            <input type="password" v-model="password" @input="validatePassword" id="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
            <p v-if="passwordErrorMessage" class="text-red-500 text-sm">{{ passwordErrorMessage }}</p>
          </div>

          <!-- <div class="mb-5">
              <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Repetir contraseña</label>
              <input type="password" id="repeat-password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
          </div> -->
          <div class="flex items-start mb-5">
              <div class="flex items-center h-5">
              <input id="terms" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required />
              </div>
              <label for="terms" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Estoy de acuerdo con los <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">términos y condiciones</a></label>
          </div>
          <button type="submit" class="text-white sj-blue w-full focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">REGISTRARME</button>
      </form>

  </div>
</template>

<script>
  import {mostrarAlerta, enviarSolicitud} from './functions';

  export default{
    data(){
      return{
        name: '',
        email: '',
        url: 'http://127.0.0.1:8000/api/usuarios',
        cargando: false,
      }
    },
    methods:{
      guardar(){
        event.preventDefault();

        if(this.name.trim()===''){
            mostrarAlerta('Ingrese un nombre', 'warning', 'name')
        }else if(this.password.trim()===''){
            mostrarAlerta('Ingrese una contraseña', 'warning', 'name')
        }else{
            var parametros = {name:this.name.trim(), email:this.email.trim(), password:this.password.trim()}
            enviarSolicitud('POST', parametros, this.url, 'Estudiante registrado!')
        }
      },   
      sanitizeInput() {
        const regex = /^[a-zA-ZÀ-ÿ\s]*$/;
        if (!regex.test(this.name)) {
          this.errorMessage = 'El nombre solo debe contener letras y espacios.';
          this.name = this.name.replace(/[^a-zA-ZÀ-ÿ\s]/g, '');
        } else {
          this.errorMessage = '';
        }
      },
      validateEmail() {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(this.email)) {
          this.emailErrorMessage = 'Por favor, ingrese un correo electrónico válido.';
        } else {
          this.emailErrorMessage = '';
        }
      },
      validatePassword() {
        if (this.password.length < 8) {
          this.passwordErrorMessage = 'La contraseña debe tener al menos 8 caracteres.';
        } else if (/\s/.test(this.password)) {
          this.passwordErrorMessage = 'La contraseña no debe contener espacios.';
        } else {
          this.passwordErrorMessage = '';
        }
      },
    }
  }
</script>