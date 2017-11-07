<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Decoratos</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/estilos.css')}}" type="text/css" rel="stylesheet">
         <link href="{{ asset('css/font-awesome.min.css')}}" type="text/css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

   

        </style>
    </head>
    <body>
      <header>
          <img src="img/Logo.png" alt="imgLogo">
          <nav>
              <ul>
                  <li><a href="#">Inicio</a></li>
                  <li><a href="#">Nosotros</a></li>
                  <li class="btnContactoResp  "><a href="#">Contacto</a></li>
                  <li><a href="/admin/login">Administración</a></li>
                  <div class="btnResp cerrado">
                      <div class="primero"></div>
                      <div class="segundo"></div>
                      <div class="tercero"></div>
                  </div>
              </ul>
              
          </nav>
          <div class="menuResp">
              <ul>
                  <li><a href="#">Inicio</a></li>
                  <li><a href="#">Nosotros</a></li>
                  <li class="btnContactoResp"><a href="#">Contacto</a></li>
              </ul>
          </div>
      </header>
      <div class="slider">
          <div class="box-slider activo">
              <div class="filtroSlider">
                  <div class="msj">
                      <h3>Lorem ipsum dolor sit amet, consectetur</h3>
                      <div class="linea"></div>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam porro est praesentium saepe quas, quaerat similique dolore. Saepe voluptates, ipsum, hic similique sit harum facere cumque id incidunt nam magnam.</p>
                </div>
              </div>
              <div class="imgSlide" style="background-image: url(img/slide2.jpg)"></div>
          </div>
          <div class="box-slider">
              <div class="filtroSlider">
                  <div class="msj">
                      <h3>Lorem ipsum dolor sit amet, consectetur</h3>
                      <div class="linea"></div>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam porro est praesentium saepe quas, quaerat similique dolore. Saepe voluptates, ipsum, hic similique sit harum facere cumque id incidunt nam magnam.</p>
                </div>
              </div>
              <div class="imgSlide" style="background-image: url(img/slide1.jpg)"></div>
          </div>
          <div class="box-slider">
              <div class="filtroSlider">
                  <div class="msj">
                      <h3>Lorem ipsum dolor sit amet, consectetur</h3>
                      <div class="linea"></div>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam porro est praesentium saepe quas, quaerat similique dolore. Saepe voluptates, ipsum, hic similique sit harum facere cumque id incidunt nam magnam.</p>
                </div>
              </div>
              <div class="imgSlide" style="background-image: url(img/slide3.jpg)"></div>
          </div>
          
      </div>
      <div class="seccion2">
          <div class="box-nosotros">
              <h3>Nosotros</h3>
              <div class="imgNosotros" style="background-image: url(img/slide3.jpg)"></div>
              <div class="todo">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt repellendus, temporibus illo sapiente illum non, quis deserunt molestias possimus minus nam. Molestiae facilis rem, soluta explicabo quod voluptate ullam provident.
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat quo magnam alias aliquam eveniet accusamus nihil enim ex aut sed in odio sequi adipisci saepe, voluptas voluptatum pariatur similique! Quod?</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt repellendus, temporibus illo sapiente illum non, quis deserunt molestias possimus minus nam. Molestiae facilis rem, soluta explicabo quod voluptate ullam provident.</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt repellendus, temporibus illo sapiente illum non, quis deserunt molestias possimus minus nam. Molestiae facilis rem, soluta explicabo quod voluptate ullam provident.</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt repellendus, temporibus illo sapiente illum non, quis deserunt molestias possimus minus nam. Molestiae facilis rem, soluta explicabo quod voluptate ullam provident. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae ducimus maxime debitis blanditiis non quam, cum sint vero nobis necessitatibus. Minus, dolore voluptatibus fuga repellat! Quidem officiis ullam placeat odio. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ipsam a, rem autem ad dolor, alias, expedita molestias fugit iste iure optio distinctio commodi maiores odio recusandae nostrum esse vitae.</p>
              </div>

          </div>
      </div>
      <footer>
          <div class="pie">
              <img src="img/Logo.png" alt="imgLogo">
              <h3>Decoratos</h3>
              <div class="simContact">
                  <a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
              </div>
          </div>
      </footer>
       
      <div class="contacto btnContacto">
          <i class="fa fa-envelope" aria-hidden="true"></i>
      </div>
      <div class="box-contacto">
          <div class="filtroContact"></div>
          <div class="formContact">
              <h1>X</h1>
              <h3>Contáctanos</h3>
              <input type="tex" name="txtNombre" value="" placeholder="Nombre...">
              <input type="tex" name="txtEmail" value="" placeholder="Email...">
              <label>Algún comentario</label>
              <textarea name="txtArea" ></textarea>
              <input type="button" name="btnEnviar" value="Enviar" class="btn btn-warning btn-sm">
          </div>
      </div>
      
      <script src="js/jquery.js" type="text/javascript"></script>
      <script src="js/main.js" type="text/javascript"></script>
    </body>
</html>

