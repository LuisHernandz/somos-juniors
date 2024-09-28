<template>
    <nav class="sj-white py-4">
      <div class="mx-12 flex justify-between items-center">
        <!-- Logotipo -->
        <div class="sj-blue text-white p-2">
          <p>SOMOS<b>JUNIORS</b></p>
        </div>
  
        <!-- Botón de menú para móviles -->
        <button @click="toggleMenu" class="text-sj-blue block md:hidden focus:outline-none">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
          </svg>
        </button>
  
        <!-- Enlaces del menú -->
        <div :class="menuVisible ? 'block' : 'hidden' + ' md:flex space-x-6'" id="menu">
          <a href="#" class="text-sj-blue hover:text-gray-500">Inicio</a>
          <a href="#" class="text-sj-blue hover:text-gray-500">Servicios</a>
          <a href="#" class="text-sj-blue hover:text-gray-500">Nosotros</a>
          <a href="#" class="text-sj-blue hover:text-gray-500">Contacto</a>
        </div>
      </div>
    </nav>
  </template>

<script>
export default {
  name: "Navbar",
  data() {
    return {
      menuVisible: false, // Estado para controlar la visibilidad del menú móvil
    };
  },
  methods: {
    toggleMenu() {
      this.menuVisible = !this.menuVisible;
    },
  },
};
</script>

<style scoped>
/* Aquí puedes agregar estilos adicionales si es necesario */
</style>