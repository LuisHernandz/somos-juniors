<!-- 
<template>
  <Navbar />
  <div class="home">
    <img alt="Vue logo" src="../assets/logo.png">
  </div>
</template> -->

<template>
  <section class="sj-blue py-10">
    <div class="mx-12 text-center">
        <h1 class="text-3xl uppercase font-semibold text-sj-white md:text-4xl">BIENVENIDO A <b>SOMOS <span class="text-sj-skyblue">JUNIORS</span></b></h1><br>
        <div class="md:w-4/6 md:mx-auto">
          <p class="text-2xl md:text-3xl text-white">Una empresa en busca de talento joven mexicano, queremos que formes parte de nuestro equipo! Regístrate ahora para postular a las vacantes.</p><br>
        </div>
        
        <div class="py-10">
            <a href="#" class="sj-cyan text-sj-blue p-4 rounded-lg font-semibold hover:opacity-80">REGISTRARME</a>
        </div>


        <div class="relative md:w-4/6 md:mx-auto grid py-6 font-semibold grid-cols-2 gap-8 text-sj-blue uppercase md:grid-cols-3">
          <article class="sj-cyan p-2 rounded-md">
            <div class="text-3xl my-2"><i class="fa-solid fa-briefcase"></i></div>
              <h4>Adquiere experiencia bajo proyectos reales.</h4>
          </article>
          <article class="sj-skyblue p-2 rounded-md">
              <div class="text-3xl my-2"><i class="fa-solid fa-comment-dollar"></i></div>
              <h4>Ofrecemos becas a todos los miembros de nuestra empresa. </h4>
          </article>
          <article class="sj-cyan p-2 rounded-md">
              <div class="text-3xl my-2"><i class="fa-solid fa-earth-americas"></i></div>
              <h4>Oportunidades remotas y presenciales.</h4>

              <div class="main__section-article-cards">
                  <div class="main__section-article-card"></div>
                  <div class="main__section-article-card"></div>
                  <div class="main__section-article-card"></div>
                  <div class="main__section-article-card"></div>
              </div>
          </article>
        </div>

    </div>
  </section>

  <section class="sj-white pt-14">
      <div class="mx-12 py-8">
          <h2 class="text-xl text-center font-bold text-sj-green md:text-2xl">VACANTES...</h2>

          <div class="md:w-5/6 md:mx-auto h-xl grid grid-cols-2 gap-2 my-8 text-sj-blue md:grid-cols-3 md:gap-12" id="contenido">
                <div v-if="this.cargando">
                    <p>Cargando datos...</p>
                </div>
              <div v-else v-for="vac, i in this.vacantes" :key="vac.id" class="border-2 border-solid border-slate-500 rounded-xl">
                  <div class=" p-4">
                      <div class="sj-blue h-40 rounded-md">
                          <img src="../assets/logo.png" alt="" class="w-full h-full object-cover">
                      </div>
  
                      <div class="text-sj-green text-sm flex justify-between my-4">
                          <p><b>Vacantes:</b></p>
                          <p><span v-text="vac.vacO"></span>/<span v-text="vac.vacD"></span></p>
                      </div>
                      <div class="text-sm">
                          <h4 class="my-2"><b v-text="vac.puesto"></b></h4>
                          <p v-text="vac.descripcion"></p>
                      </div>
                      <div class="text-sm mt-4">
                        <p><i>Última actualización: <span v-text="new Date(vac.updated_at).toLocaleDateString('en-US')"></span></i></p>
                      </div>
                  </div>
                  <div class="flex items-center justify-between border-t-2 border-t-slate-500 px-4 text-sj-green">
                      <a href="#" class="sj-skyblue my-2 p-2 rounded-md text-xs uppercase font-semibold">Postular</a>
                      <div class="flex">
                        <div class="sj-cyan w-4 h-4 rounded-full mx-2"></div>
                        <div class="sj-skyblue w-4 h-4 rounded-full mx-2"></div>
                        <div class="sj-cyan w-4 h-4 rounded-full mx-2"></div>
                      </div>
                  </div>
              </div>
            </div>
      </div>
  </section>

  <section class="sj-white">
      <div class="mx-12">
          <h2 class="text-xl text-center font-bold text-sj-green md:text-2xl">OFRECEMOS</h2>

          <div class="grid grid-cols-2 gap-2 py-12 text-sj-blue text-sm md:grid-cols-4 md:gap-12 md:text-lg">
              <div class="sj-cyan p-4 rounded-md"><b>Capacitación y Desarrollo Profesional:</b> Cursos, talleres o certificaciones que mejoren sus habilidades y conocimientos.</div>
              <div class="sj-skyblue p-4 rounded-md"><b>Reconocimientos y Premios:</b> Programas de reconocimiento para destacar logros individuales o en equipo.</div>
              <div class="sj-cyan p-4 rounded-md"><b>Proyectos Innovadores:</b> Participar en iniciativas que involucren innovación o mejoras dentro de la empresa.</div>
              <div class="sj-skyblue p-4 rounded-md"><b>Días de Trabajo Flexible:</b> Flexibilidad en el lugar o el horario de trabajo, como teletrabajo o jornadas reducidas.</div>
          </div>
      </div>
  </section>

  <section class="sj-white">
      <div class="mx-12 py-8">
          <h2 class="text-xl text-center font-bold text-sj-green md:text-2xl">FUNDADORES</h2>

          <div class="grid grid-cols-1 gap-16 justify-items-center my-8 text-sj-blue md:grid-cols-3">
              <div class="flex flex-col items-center text-center">
                <div class="sj-blue w-32 h-32 rounded-full overflow-hidden">
                  <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f3/%D0%92%D0%BB%D0%B0%D0%B4%D0%B8%D0%BC%D0%B8%D1%80_%D0%9F%D1%83%D1%82%D0%B8%D0%BD_%2808-03-2024%29_%28cropped%29.jpg/250px-%D0%92%D0%BB%D0%B0%D0%B4%D0%B8%D0%BC%D0%B8%D1%80_%D0%9F%D1%83%D1%82%D0%B8%D0%BD_%2808-03-2024%29_%28cropped%29.jpg" alt="Perfil" class="w-full h-full object-cover">
                </div>  
                <div class="my-4">
                  <h4><b>Juan Martínez</b></h4>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi incidunt ab autem necessitatibus aliquam sit.</p>
                </div> 
              </div> 
                
              <div class="flex flex-col items-center text-center">
                <div class="sj-blue w-32 h-32 rounded-full overflow-hidden">
                  <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f3/%D0%92%D0%BB%D0%B0%D0%B4%D0%B8%D0%BC%D0%B8%D1%80_%D0%9F%D1%83%D1%82%D0%B8%D0%BD_%2808-03-2024%29_%28cropped%29.jpg/250px-%D0%92%D0%BB%D0%B0%D0%B4%D0%B8%D0%BC%D0%B8%D1%80_%D0%9F%D1%83%D1%82%D0%B8%D0%BD_%2808-03-2024%29_%28cropped%29.jpg" alt="Perfil" class="w-full h-full object-cover">
                </div>  
                <div class="my-4">
                  <h4><b>Juan Martínez</b></h4>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi incidunt ab autem necessitatibus aliquam sit.</p>
                </div> 
              </div>   

              <div class="flex flex-col items-center text-center">
                <div class="sj-blue w-32 h-32 rounded-full overflow-hidden">
                  <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f3/%D0%92%D0%BB%D0%B0%D0%B4%D0%B8%D0%BC%D0%B8%D1%80_%D0%9F%D1%83%D1%82%D0%B8%D0%BD_%2808-03-2024%29_%28cropped%29.jpg/250px-%D0%92%D0%BB%D0%B0%D0%B4%D0%B8%D0%BC%D0%B8%D1%80_%D0%9F%D1%83%D1%82%D0%B8%D0%BD_%2808-03-2024%29_%28cropped%29.jpg" alt="Perfil" class="w-full h-full object-cover">
                </div>  
                <div class="my-4">
                  <h4><b>Juan Martínez</b></h4>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi incidunt ab autem necessitatibus aliquam sit.</p>
                </div> 
              </div>   
          </div>
      </div>
  </section>
</template>

<script>
  import axios from 'axios';

  export default{
    data(){
      return{
        vacantes: null,
        cargando: true,
      }
    },
    mounted(){
      this.getVacantes();
    },
    methods:{
        getVacantes(){
        this.cargando = true
        axios.get('http://127.0.0.1:8000/api/vacantes').then(
          res => {
            this.vacantes = res.data;
            this.cargando = false;
          }
        );
      }
    }
  }
</script>

<!-- <script>
import Navbar from '@/components/NavBar.vue'

export default {
  name: "HomeView",
  components: {
    Navbar,
  },
};
</script> -->

