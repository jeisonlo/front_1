<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Perfil</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Perfil-Profesional/PerfilProfesional.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Header/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Footer/inicio/styles.css') }}">
</head>
<body>
     <!-- Lugar donde se cargará el header -->
     <div id="header-container"></div>
     @include('atencion-profesional.PROFESIONAL.Header.header')
    
    <main>
    <section id="inicio" class="inicio">
        <div class="contenido-banner">
            <div class="contenido-img">
                <img src="../Imagenes/maradona.png" alt="Foto de perfil del usuario">
            </div>
            <h1>Diego Maradona</h1>
            <h2>Psicologo - Experto</h2>
            <div class="redes">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
            </div>
        </div>
    </section>
    
<!-- seccion sobre mi -->
    <section id="sobremi" class="sobremi">
        <div class="contenido-seccion">
            <h2>Sobre Mi</h2>
            <p><span>Hola, soy Diego Maradona.</span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis minus nemo, molestiae, ratione odio voluptatem voluptatum cum beatae ipsum saepe tempore laboriosam assumenda laudantium. Consequatur accusamus enim aliquam voluptas quos?</p>

            <div class="fila">
                <div class="col">
                     <h3>Datos Personales</h3>
                     <ul>
                        <li>
                            <strong>Cumpleaños</strong>
                            15-03-1972
                        </li>
                        <li>
                            <strong>Telefono</strong>
                            312 8753719
                        </li>
                        <li>
                            <strong>Email</strong>
                            diegodona@gmail.com
                        </li>
                        <li>
                            <strong>Website</strong>
                            www.dona10.com
                        </li>
                        <li>
                            <strong>Direccion</strong>
                            123 San Luis, Argentina
                        </li>
                        <li>
                            <strong>Cargo</strong>
                            <span>Psicologo</span>
                        </li>
                     </ul>
                </div>
    
                <div class="col">
                    <h3>Intereses</h3>
                    <div class="contenedor-intereses">
                        <div class="intereses">
                            <i class="fa-solid fa-gamepad"></i>
                            <span>Juegos</span>
                        </div>
                        <div class="intereses">
                            <i class="fa-solid fa-headphones"></i>
                            <span>Musica</span>
                        </div>
                        <div class="intereses">
                            <i class="fa-solid fa-plane"></i>
                            <span>Viajar</span>
                        </div>
                        <div class="intereses">
                            <i class="fa-brands fa-apple"></i>
                            <span>Mac Os</span>
                        </div>
                        <div class="intereses">
                            <i class="fa-solid fa-person-hiking"></i>
                            <span>Deporte</span>
                        </div>
                        <div class="intereses">
                            <i class="fa-solid fa-book"></i>
                            <span>Leer</span>
                        </div>
                        <div class="intereses">
                            <i class="fa-solid fa-car"></i>
                            <span>Autos</span>
                        </div>
                        <div class="intereses">
                            <i class="fa-solid fa-camera"></i>
                            <span>Fotos</span>
                        </div>
                    </div>
                </div>
            </div>
            <button id="btnActualizar">
                Actualizar <i class="fa-regular fa-pen-to-square"></i>
               <span class="overlay"></span>
            </button>
        </div>
    </section>

    <!-- Modal de Actualización -->
<div id="modalActualizar" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Actualizar Información</h2>
        <form id="formActualizar">
            <div class="form-group">
                <div class="form-item">
                    <label for="foto">Foto</label>
                    <input type="file" id="foto" name="foto">
                </div>
                <div class="form-item">
                    <label for="cumple">Cumpleaños</label>
                    <input type="date" id="cumple" name="cumple">
                </div>
            </div>
            <div class="form-group">
                <div class="form-item">
                    <label for="telefono">Teléfono</label>
                    <input type="tel" id="telefono" name="telefono">
                </div>
                <div class="form-item">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email">
                </div>
            </div>
            <div class="form-group">
                <div class="form-item">
                    <label for="direccion">Dirección</label>
                    <input type="text" id="direccion" name="direccion">
                </div>
                <div class="form-item">
                    <label for="website">Website</label>
                    <input type="url" id="website" name="website">
                </div>
            </div>
            <div class="form-group">
                <div class="form-item">
                    <label for="cargo">Cargo</label>
                    <input type="text" id="cargo" name="cargo">
                </div>
                <div class="form-item">
                    <label for="intereses">Intereses</label>
                    <input type="text" id="intereses" name="intereses" placeholder="Separar por comas">
                </div>
            </div>
            <div class="form-group">
                <div class="form-item">
                    <label for="cv">Currículum</label>
                    <input type="file" id="cv" name="cv">
                </div>
            </div>
                <button type="submit" class="btn-centrado">Guardar Cambios</button>
        </form>
    </div>
</div>
<!-- seccion habilidades -->
    <section class="skills" id="skills">
        <div class="contenido-seccion">
            <h2>Habilidades</h2>
            <div class="fila">
                <div class="col">
                    <h3>Tecnico Habilidad</h3>
                    <div class="skill">
                        <span>Resolver Problemas</span>
                        <div class="barra-skill">
                            <div class="progreso">
                                <span>75%</span>
                            </div>
                        </div>
                    </div>
                    <div class="skill">
                        <span>Trabajo & Tiempo</span>
                        <div class="barra-skill">
                            <div class="progreso">
                                <span>89%</span>
                            </div>
                        </div>
                    </div>
                    <div class="skill">
                        <span>Observacion</span>
                        <div class="barra-skill">
                            <div class="progreso">
                                <span>95%</span>
                            </div>
                        </div>
                    </div>
                    <div class="skill">
                        <span>Manejo de Fuentes de Informacion</span>
                        <div class="barra-skill">
                            <div class="progreso">
                                <span>81%</span>
                            </div>
                        </div>
                    </div>
                    <div class="skill">
                        <span>Capacidad de Analizar</span>
                        <div class="barra-skill">
                            <div class="progreso">
                                <span>85%</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <h3>Profesional Habilidad</h3>
                    <div class="skill">
                        <span>Comunicacion</span>
                        <div class="barra-skill">
                            <div class="progreso">
                                <span>80%</span>
                            </div>
                        </div>
                    </div>
                    <div class="skill">
                        <span>Trabajo en Equipo</span>
                        <div class="barra-skill">
                            <div class="progreso">
                                <span>70%</span>
                            </div>
                        </div>
                    </div>
                    <div class="skill">
                        <span>Creatividad</span>
                        <div class="barra-skill">
                            <div class="progreso">
                                <span>95%</span>
                            </div>
                        </div>
                    </div>
                    <div class="skill">
                        <span>Dedicacion</span>
                        <div class="barra-skill">
                            <div class="progreso">
                                <span>71%</span>
                            </div>
                        </div>
                    </div>
                    <div class="skill">
                        <span>Administar Proyecto</span>
                        <div class="barra-skill">
                            <div class="progreso">
                                <span>80%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- seccion curriculum -->
    <section id="curriculum" class="curriculum">
        <div class="contenido-seccion">
            <h2>Curriculum</h2>
            <div class="fila">
                <div class="col izquierda">
                    <h3>Educacion</h3>
                    <div class="item izq">
                        <h4>Arte y Multimedia</h4>
                        <span class="casa">Universidad de Oxford</span>
                        <span class="fecha">2005 - 2008</span>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente repellendus animi aliquam, vel incidunt quis cupiditate eum ipsa libero earum quos inventore vero aliquid, dolor reprehenderit architecto assumenda! Ullam, ea.</p>
                        <div class="conectori">
                            <div class="circuloi"></div>
                        </div>
                    </div>
                    <div class="item izq">
                        <h4>Arte y Multimedia</h4>
                        <span class="casa">Universidad de Oxford</span>
                        <span class="fecha">2005 - 2008</span>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente repellendus animi aliquam, vel incidunt quis cupiditate eum ipsa libero earum quos inventore vero aliquid, dolor reprehenderit architecto assumenda! Ullam, ea.</p>
                        <div class="conectori">
                            <div class="circuloi"></div>
                        </div>
                    </div>
                    <div class="item izq">
                        <h4>Arte y Multimedia</h4>
                        <span class="casa">Universidad de Oxford</span>
                        <span class="fecha">2005 - 2008</span>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente repellendus animi aliquam, vel incidunt quis cupiditate eum ipsa libero earum quos inventore vero aliquid, dolor reprehenderit architecto assumenda! Ullam, ea.</p>
                        <div class="conectori">
                            <div class="circuloi"></div>
                        </div>
                    </div>
                </div>

                <div class="col derecha">
                    <h3>Experiencia de Trabajo</h3>
                    <div class="item der">
                        <h4>Agendar Citas</h4>
                        <span class="casa">Nombre de  Compañia</span>
                        <span class="fecha">2005 - 2008</span>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente repellendus animi aliquam, vel incidunt quis cupiditate eum ipsa libero earum quos inventore vero aliquid, dolor reprehenderit architecto assumenda! Ullam, ea.</p>
                        <div class="conectord">
                            <div class="circulod"></div>
                        </div>
                    </div>
                    <div class="item der">
                        <h4>Agendar Citas</h4>
                        <span class="casa">Nombre de  Compañia</span>
                        <span class="fecha">2005 - 2008</span>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente repellendus animi aliquam, vel incidunt quis cupiditate eum ipsa libero earum quos inventore vero aliquid, dolor reprehenderit architecto assumenda! Ullam, ea.</p>
                        <div class="conectord">
                            <div class="circulod"></div>
                        </div>
                    </div>
                    <div class="item der">
                        <h4>Agendar Citas</h4>
                        <span class="casa">Nombre de  Compañia</span>
                        <span class="fecha">2005 - 2008</span>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente repellendus animi aliquam, vel incidunt quis cupiditate eum ipsa libero earum quos inventore vero aliquid, dolor reprehenderit architecto assumenda! Ullam, ea.</p>
                        <div class="conectord">
                            <div class="circulod"></div>
                        </div>
                    </div>                   
                </div>
            </div>
        </div>
    </section>
<!-- seccion portafolio -->
    <section id="portfolio" class="portfolio">
        <div class="contenido-seccion">
            <h2>Portafolio</h2>
            <div class="galeria">
                <div class="proyecto">
                    <img src="../Imagenes/p1.jpg" alt="">
                    <div class="overlay">
                          <h3>Diseño Creativo</h3>
                          <p>Fotografia</p>
                    </div>
                </div>
                <div class="proyecto">
                    <img src="../Imagenes/p2.jpg" alt="">
                    <div class="overlay">
                          <h3>Diseño Creativo</h3>
                          <p>Fotografia</p>
                    </div>
                </div>
                <div class="proyecto">
                    <img src="../Imagenes/p3.jpg" alt="">
                    <div class="overlay">
                          <h3>Diseño Creativo</h3>
                          <p>Fotografia</p>
                    </div>
                </div>
                <div class="proyecto">
                    <img src="../Imagenes/p4.jpg" alt="">
                    <div class="overlay">
                          <h3>Diseño Creativo</h3>
                          <p>Fotografia</p>
                    </div>
                </div>
                <div class="proyecto">
                    <img src="../Imagenes/p5.jpg" alt="">
                    <div class="overlay">
                          <h3>Diseño Creativo</h3>
                          <p>Fotografia</p>
                    </div>
                </div>
                <div class="proyecto">
                    <img src="../Imagenes/p6.jpg" alt="">
                    <div class="overlay">
                          <h3>Diseño Creativo</h3>
                          <p>Fotografia</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--seccion contacto -->
    <section id="contacto" class="contacto">
         <div class="contenido-seccion">
            <h2>Contacto</h2>
            <div class="fila">
                <div class="col">
                     <input type="text" placeholder="Tu nombre">
                     <input type="text" placeholder="Numero telefonico">
                     <input type="text" placeholder="Direccion de correo">
                     <input type="text" placeholder="Tema">
                     <input type="text" placeholder="Mensaje">
                     <button>
                        Enviar Mensaje<i class="fa-solid fa-paper-plane"></i>
                        <span class="overlay"></span>
                     </button>
                </div>

                <div class="col">
                      <img src="../Imagenes/mapa.jpg" alt="">
                      
                </div>
            </div>
         </div>   
    </section>
</main>
 <!-- Lugar donde se cargará el footer -->
 <div id="footer-container"></div>
 @include('atencion-profesional.PROFESIONAL.Footer.inicio.inicio')
 <script src="{{ asset('js/atencion-profesional/PROFESIONAL/Header/script.js') }}"></script>
 <script src="{{ asset('js/atencion-profesional/PROFESIONAL/Perfil-Profesional/java.js') }}"></script>
</body>
</html>
