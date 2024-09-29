export default function auth(to, from, next) {
    const isAuthenticated = !!localStorage.getItem('token'); // Suponiendo que almacenas el token en localStorage

    if (isAuthenticated) {
        next(); // Permite el acceso a la ruta
    } else {
        next({ name: 'login' }); // Redirige a la página de inicio de sesión
    }
}
