
<template>
    <div class="container p-8 mx-auto">
        <h1 class="text-sj-blue text-center text-2xl font-bold mb-8">GESTIÓN DE USUARIOS</h1>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Registro
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-if="this.cargando">
                        <td colspan="6"><h3>Cargando...</h3></td>
                    </tr>
                    <tr v-else v-for="usu, i in this.usuarios" :key="usu.id" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td v-text="usu.id" scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"></td>
                        <td v-text="usu.name" class="px-6 py-4"></td>
                        <td v-text="usu.email" class="px-6 py-4"></td>
                        <td v-text="new Date(usu.created_at).toLocaleDateString('en-US')" class="px-6 py-4"></td>
                        <td class="px-6 py-4">
                            <router-link :to="{path:'showU/'+usu.id}" class="">
                                <i class="fa fa-solid fa-eye"></i>
                            </router-link>
                            &nbsp;
                            <router-link :to="{path:'editU/'+usu.id}" class="">
                                <i class="fa fa-solid fa-edit"></i>
                            </router-link>
                            &nbsp;
                            <button class="" v-on:click="eliminar(usu.id, usu.name)">
                                <i class="fa fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
  import axios from 'axios';
  import {confirmar} from '../functions';

  export default{
    data(){
      return{
        usuarios: null,
        cargando: true,
      }
    },
    mounted(){
      this.getUsuarios();
    },
    methods:{
        getUsuarios(){
        this.cargando = true
        axios.get('http://127.0.0.1:8000/api/usuarios').then(
          res => {
            this.usuarios = res.data;
            this.cargando = false;
          }
        );
      },
      eliminar(id, nombre){
        confirmar('http://127.0.0.1:8000/api/usuarios/', id, '¿Eliminar registro', 'Realmente desea eliminar a ' + nombre + '?')
        this.cargando = false;
      }
    }
  }
</script>
