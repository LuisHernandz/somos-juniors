<template>
  <header class="text-white sj-blue hidden md:block">
    <div class="flex justify-between items-center mx-12 py-2">
      <p><i>Nuevas vacantes dentro de 25 días!</i></p>
      <div class="text-3xl">
        <a href="#" class="mx-2"><i class="fa-brands fa-square-instagram"></i></a>
        <a href="#" class="mx-2"><i class="fa-brands fa-square-x-twitter"></i></a>
        <a href="#" class="mx-2"><i class="fa-brands fa-square-whatsapp"></i></a>
      </div>
    </div>
  </header>

  <nav class="sj-white py-4">
    <div class="mx-12 flex justify-between items-center">
      <div class="sj-blue text-white p-2">
        <p><b>SOMOS <span class="text-sj-skyblue">JUNIORS</span></b></p>
      </div>

      <button @click="toggleMenu" class="text-sj-blue block md:hidden focus:outline-none">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
        </svg>
      </button>

      <div class="hidden md:flex space-x-6">
        <router-link to="/" class="text-sj-blue hover:text-gray-500 border-b-4 border-emerald-500">Inicio</router-link>
        <a href="#" class="text-sj-blue hover:text-gray-500 border-b-4 border-emerald-500">Servicios</a>
        <a href="#" class="text-sj-blue hover:text-gray-500 border-b-4 border-emerald-500">Nosotros</a>
        <router-link v-if="!isLoggedIn" to="/acceso" class="flex items-center text-sj-green sj-skyblue px-4 font-bold rounded-md text-xs"> ACCESO </router-link>

        <button v-if="isLoggedIn" @click="logout" class="flex items-center text-sj-green sj-skyblue px-4 font-bold rounded-md text-xs">CERRRAR SESIÓN</button>
    </div>


    </div>
  </nav>

  <div v-if="mobileMenuVisible" class="fixed inset-0 sj-blue flex flex-col items-center justify-center z-50">
    <button @click="closeMobileMenu" class="absolute top-5 right-14 text-white text-3xl">
      &times;
    </button>
    <div class="flex flex-col items-center">
      <router-link to="/" class="text-white text-2xl py-4">Inicio</router-link>
      <a href="#" class="text-white text-2xl py-4">Servicios</a>
      <a href="#" class="text-white text-2xl py-4">Nosotros</a>
      <a href="#" class="text-white text-2xl py-4">Contacto</a>


      <router-link v-if="!isLoggedIn" to="/acceso" class="flex items-center text-sj-green sj-skyblue py-4 px-8 font-bold rounded-md text-xs"> ACCESO </router-link>
      <button v-if="isLoggedIn" @click="logout" class="flex items-center text-sj-green sj-skyblue py-4 px-8 font-bold rounded-md text-xs">CERRRAR SESIÓN</button>
    </div>
  </div>

  <main>
    <router-view></router-view>
  </main>

  <footer class="sj-blue justify-between align-center text-sj-white p-8 md:flex">
        <div class="text-2xl text-center w-5/5 p-4 md:flex md:justify-center md:items-center lg:w-2/5">
            <a href="#" class="mx-2"><i class="fa-brands fa-square-instagram"></i></a>
            <a href="#" class="mx-2"><i class="fa-brands fa-square-x-twitter"></i></a>
            <a href="#" class="mx-2"><i class="fa-brands fa-square-whatsapp"></i></a>
        </div>

        <div class="grid grid-cols-3 p-4 gap-12 w-5/5 lg:w-3/5">
            <div>
                <p><b>SOMOS JUNIORS</b></p><br>
                <ul>
                  <li><router-link to="/">Inicio</router-link></li>
                  <li>Servicios</li>
                  <li>Nosotros</li>
                  <li>Contacto</li>
                  <li><router-link to="/acceso">Acceso</router-link></li>
                </ul>
            </div>

            <div>
                <p><b>LEGALES</b></p><br>
                <ul>
                  <li><a href="#">Términos y condiciones</a></li>
                  <li><a href="#">Aviso de privacidad</a></li>
                </ul>
            </div>

            <div>
                <p><b>DIRECCIÓN</b></p><br>
                <p><b>Ubicación:</b></p>
                <p>Av. Insurgentes Sur 674, Del Valle Norte, Benito Juárez, C.P 03103 Ciudad de México, CDMX Oficina 12 del cuarto piso</p>
            </div>
        </div>
        
  </footer>
</template>


<script>
  export default {
    data() {
      return {
        mobileMenuVisible: false, 
      };
    },
    computed: {
      isLoggedIn() {
        return !!localStorage.getItem('token');
      },
    },
    methods: {
      toggleMenu() {
        this.mobileMenuVisible = !this.mobileMenuVisible; 
      },
      closeMobileMenu() {
        this.mobileMenuVisible = false; 
      },
      logout() {
        localStorage.removeItem('token'); // Eliminar el token de localStorage
        this.$router.push('/acceso'); 
        window.location.reload(); 
      },
    },
  };
</script>

<style>
  /* Normalización */
  *,
  *::after,
  *::before{
      box-sizing: border-box;
      margin: 0;
      padding: 0;
  }

  body{
      font-family: 'Noto Sans', Arial, Helvetica, sans-serif;
  }

  /* Minimalista */

  .sj-black{
      background-color: #000;
  }

  .sj-blue{
      background-color: #112E40;
  }

  .text-sj-blue{
      color: #112E40;
  }


  .sj-white{
      background-color: #C8D3D9;
  }

  .text-sj-white{
      color: #C8D3D9;
  }


  .sj-green{
      background-color: #025949;
  }

  .text-sj-green{
      color: #025949;
  }

  .sj-cyan{
      background-color: #1FBF91;
  }

  .text-sj-cyan{
      color: #1FBF91;
  }

  .sj-skyblue{
    background-color: #6CD9BA;
  }

  .text-sj-skyblue{
    color: #6CD9BA;
  }
</style>