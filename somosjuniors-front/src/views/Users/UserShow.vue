<template>
    <div class="container p-8 mx-auto">
        <h1 class="text-sj-blue text-center text-2xl font-bold mb-8">DETALLES DEL USUARIO</h1>

        <div class="max-w-sm mx-auto sj-white p-6 rounded-md">
            <router-link :to="{path:'/usuarios'}">
                <i></i>
                Regresar
            </router-link>
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                <p v-text="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"></p>
            </div>
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <p v-text="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"></p>
            </div>
        </div>
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