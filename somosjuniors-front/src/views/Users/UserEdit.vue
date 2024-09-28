<template>
    <div class="container p-8 mx-auto">
        <h1 class="text-sj-blue text-center text-2xl font-bold mb-8">EDITAR USUARIO</h1>
  
        <form v-on:submit="actualizar" class="max-w-sm mx-auto sj-white p-6 rounded-md">
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                <input type="text" v-model="name"  id="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
            </div>
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="email" v-model="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="nombre@gmail.com" required />
            </div>
            <!-- <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
                <input type="password" v-model="password"  id="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
            </div> -->
            <!-- <div class="mb-5">
                <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Repetir contraseña</label>
                <input type="password" id="repeat-password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
            </div> -->

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Actualizar</button>
        </form>
  
    </div>
  </template>
  
  <script>
    import {mostrarAlerta, enviarSolicitud} from '../functions';
    import { useRoute, useRouter} from 'vue-router';
    import axios from 'axios';

    export default{
      data(){
        return{
          id: 0,
          name: '',
          email: '',
          url: 'http://127.0.0.1:8000/api/usuarios',
          cargando: false,
        }
      },
      mounted(){
        const route = useRoute();
        this.id = route.params.id;
        this.url += '/'+this.id;
        this.getEstudiante();
      },
      methods:{
        getEstudiante(){+
            axios.get(this.url).then(
                res =>{
                    this.name = res.data.data.name;
                    this.email = res.data.data.email;
                }
            );
        },

        actualizar(){
          event.preventDefault();
  
          if(this.name.trim()===''){
              mostrarAlerta('Ingrese un nombre', 'warning', 'name')
          }else{
              var parametros = {name:this.name.trim(), email:this.email.trim()}
              enviarSolicitud('PUT', parametros, this.url, 'Estudiante actualizado!')
          }
        },   
      }
    }
  </script>