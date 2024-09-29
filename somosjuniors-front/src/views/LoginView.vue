<template>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-4 py-4 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-4 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight text-center tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        INICIA SESIÓN
                    </h1>
                    <form class="space-y-4 md:space-y-6" @submit.prevent="login">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input v-model="email" type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="tuemail@gmail.com" required>
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
                            <input v-model="password" type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input v-model="remember" id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remember" class="text-gray-500 dark:text-gray-300">Recuérdame</label>
                                </div>
                            </div>
                            <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">¿Se te olvidó la contraseña?</a>
                        </div>
                        <button type="submit" class="w-full text-white sj-blue focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">INGRESAR</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            ¿Aún no tienes una cuenta? <router-link to="/registro" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Regístrate Aquí</router-link>
                        </p>
                    </form>
                    <div v-if="errorMessage" class="text-red-500">{{ errorMessage }}</div>
                </div>
            </div>
            
        </div>
    </section>
</template>

<script>
export default {
  data() {
    return {
      email: '',
      password: '',
      remember: false,
      errorMessage: ''
    };
  },
  methods: {
    async login() {
        try {
            const response = await fetch('http://127.0.0.1:8000/api/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    email: this.email,
                    password: this.password
                })
            });

            const data = await response.json();
            
            if (response.ok) {
                // Almacena el token o cualquier información necesaria
                localStorage.setItem('token', data.token); // Asumiendo que tu API devuelve un token
                this.$router.push('/usuarios'); // Redirigir a la ruta /usuarios
            } else {
                this.errorMessage = data.message; // Mostrar mensaje de error
            }
        } catch (error) {
            console.error('Error:', error);
            this.errorMessage = 'An error occurred. Please try again.';
        }
    }
  }

}
</script>

<style scoped>
/* Aquí puedes agregar estilos para tu componente */
.container {
  max-width: 400px;
  margin: 0 auto;
}
</style>
