<?php
if(isset($_COOKIE['len'])){
  if ($_COOKIE['len'] == 'es'){
    $config = file_get_contents("conf/configES.json");
    $array_config = json_decode($config, true);
  }else if ($_COOKIE['len'] == 'en'){
    $config = file_get_contents("conf/configEN.json");
    $array_config = json_decode($config, true);
  }else{
    $config = file_get_contents("conf/configPT.json");
    $array_config = json_decode($config, true);
  }
}else{ //Default en es
  $config = file_get_contents("conf/configES.json");
  $array_config = json_decode($config, true);
}
//var_dump($array_config);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="UTF-8" />
    <link
      rel="icon"
      href="http://www.ciens.ucv.ve/portalasig2/favicon.ico"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link
      rel="stylesheet"
      href="bootstrap-4.0.0-dist\css\bootstrap.min.css"
      type="text/css"
    />
    <link rel="stylesheet" href="css/index.css" type="text/css" />
    <link rel="stylesheet" href="css/perfil.css" type="text/css" />

    <title>ATI[UCV] 2022-1</title>
  </head>
  <body>
    <header>
    <nav
        class="navbar navbar-expand-lg navbar-dark"
        style="background-color: #86b1ef"
      >
        <span class="navbar-text logo">
        <span id="conf_sitio1"><?= $array_config['sitio'][0] ?></span><span id="conf_sitio2"><?= $array_config['sitio'][1] ?></span>
          <span id="conf_sitio3"><?= $array_config['sitio'][2] ?></span>
        </span>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarText"
          aria-controls="navbarText"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto mb-1 mb-lg-0">
            <li class="nav-item active">
              <span class="navbar-text saludo">
                <div><span id="conf_saludo"><?= $array_config['saludo'] ?></span>, Luz Rico</div>
              </select>
              </span>
            </li>
          </ul>
          <!-- <span class="navbar-text mb-2 mb-lg-0 d-md-block">
            <a href="index.html"><span id="conf_home"><?= $array_config['home'] ?></span></a>
          </span> -->
          <span class="navbar-text mb-2 mb-lg-0 d-md-block">
              <input id="config_placeholder" type="text" placeholder='<?= $array_config['nombre'] ?>' /><input
                value='<?= $array_config['buscar'] ?>'
                id="config_value"
                type="button"
                onclick="mibuscador()"
            /></span>
          <span class="navbar-text busqueda mb-2 mb-lg-0 pl-lg-4">
            <select class="form-control" name="len" id="len">
              <option value="es" <?= (isset($_COOKIE['len']) && $_COOKIE['len']=='es' ? 'selected' : '') ?>>Español</option>
              <option value="en" <?= (isset($_COOKIE['len']) && $_COOKIE['len']=='en' ? 'selected' : '') ?>>English</option>
              <option value="pt" <?= (isset($_COOKIE['len']) && $_COOKIE['len']=='pt' ? 'selected' : '') ?>>Português</option>
            </select>
          </span>
        </div>
      </nav>
    </header>
    <section>
      <div class="container-fluid">
        
        <div class="card d-block mx-auto mb-3" style="width: 18rem;">
          <div class="card-body text-center">
            <h5 class="card-title">Visitas</h5>
            <p class="card-text"><?php if (!isset($_COOKIE['count'])) { ?> 
            1
          <?php 
            $cookie = 1;
            setcookie("count", $cookie);
          } else {
            $cookie = ++$_COOKIE['count'];
            setcookie("count", $cookie);
          ?> 
          <?= $_COOKIE['count'] ?>
          <?php  } ?></p>
          </div>
        </div>
        <div
          id="carouselExample"
          class="carousel slide"
          data-ride="carousel"
          data-interval="9000"
        >
          <div
            class="carousel-inner row w-100 mx-auto"
            role="listbox"
            id="data"
          ></div>
          <a
            class="carousel-control-prev"
            href="#carouselExample"
            role="button"
            data-slide="prev"
          >
            <span class="carousel-control-prev-icon"></span>
          </a>
          <a
            class="carousel-control-next text-faded"
            href="#carouselExample"
            role="button"
            data-slide="next"
          >
            <span class="carousel-control-next-icon"></span>
          </a>
        </div>
      </div>
      <div id="div_info" class="container-fluid pb-5 my-5 d-none">
        <div class="row p-2 mb-5">
          <div class="col-12 col-sm-12 col-md-6 col-lg-4 p-0 d-flex">
            <div id="grid" class="grid clearfix d-flex pr-1">
              <img id="imagen" alt="" class="img-fluid" />
              <!-- ... -->
            </div>
          </div>
          <div
            class="col-12 col-sm-12 col-md-6 col-lg-8 d-flex justify-content-around flex-column"
            id="caja"
          >
            <div class="pt-3">
              <h1 id="perfil_nombre"></h1>
              <div class="text-justify">
                <span id="perfil_descripcion" class="font-italic"></span>
              </div>
            </div>
            <div class="pt-3">
              <div>
                <span id="conf_color"><?= $array_config['color'] ?></span> <span id="perfil_color"></span>
              </div>
              <div>
                <span id="conf_libro"><?= $array_config['libro'] ?></span> <span id="perfil_libro"></span>
              </div>
              <div>
                <span id="conf_musica"><?= $array_config['musica'] ?></span>
                <span id="perfil_musica1"></span>
              </div>
              <div>
                <span id="conf_video_juego"><?= $array_config['video_juego'] ?></span>
                <span id="perfil_video_juego1"></span>
              </div>
              <div class="font-weight-bold">
                <span id="conf_lenguajes"><?= $array_config['lenguajes'] ?></span>
                <span id="perfil_lenguajes1"></span>
              </div>
            </div>
            <div class="py-3">
              <span id="conf_email"><?= str_replace('[email]', 
            '<a href="#"><span id="perfil_email"></span></a>' , $array_config['email']) ?></span>
              <span id="conf_email"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
      
      
    </section>
    <footer>
      <span id="conf_copyRight"><?= $array_config['copyRight'] ?></span>
    </footer>

    <script type="text/javascript" src="js/jquery-3.6.1.js"></script>
    <script
      type="text/javascript"
      src="bootstrap-4.0.0-dist\js\bootstrap.min.js"
    ></script>
    <script type="text/javascript" src="conf/configES.json"></script>
    <script type="text/javascript" src="datos/index.json"></script>
    <script type="text/javascript" src="js/index.js"></script>
  </body>
</html>
