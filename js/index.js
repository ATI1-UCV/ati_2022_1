$("#len").change(function () {
  $.ajax({
    type: "GET",
    url: window.location.pathname + 'getDatos.php',
    data: { len: this.value },
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.success === 1) {
        console.log("Idioma cambiado");
        var getUrl = window.location;
        var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + "/" + getUrl.pathname.split('/')[2];
        location.href = baseUrl
      } else {
        alert('Error cambiando idioma.');
      }
    },
    error: function (request, status, error) {
      alert(request.responseText);
    }
  })
});
let datos = listado;
let res = document.querySelector('#data');
res.innerHTML = '';

for (let item of datos) {
  res.innerHTML += " <div class=\"carousel-item col\" style='width: 20%'> <div class=\"panel panel-default\"> <div class=\"panel-thumbnail\">" + "<img src=" + item.imagen + "><div><a href='#' onclick='viewProfile(" + item.ci + ")'>" + item.nombre + "</a></div></div></div></div>";
}
document.getElementsByClassName("carousel-item")[0].classList.add("active");

function mibuscador() {
  res.innerHTML = '';
  var buscador = document.getElementById('config_placeholder').value;
  if (buscador.length <= 0) {  //mostrar toda la lista
    for (let item of datos) {
      res.innerHTML += " <div class=\"carousel-item col\"> <div class=\"panel panel-default\"> <div class=\"panel-thumbnail\">" + "<img src=" + item.imagen + "><div><a href='#' onclick='viewProfile(" + item.ci + ")'>" + item.nombre + "</a></div></div></div></div>";
    }
    document.getElementsByClassName("carousel-item")[0].classList.add("active");
  } else {
    let noconsiguio = 0;
    for (let item of datos) {
      let item_upper = item.nombre.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toUpperCase(); //quita tildes y pasa a mayúsculas
      if (item_upper.includes(buscador.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toUpperCase())) {
        res.innerHTML += " <div class=\"carousel-item col\"> <div class=\"panel panel-default\"> <div class=\"panel-thumbnail\">" + "<img src=" + item.imagen + "><div><a href='#' onclick='viewProfile(" + item.ci + ")'>" + item.nombre + "</a></div></div></div></div>";
        noconsiguio = 1;
      }
    }
    document.getElementsByClassName("carousel-item")[0].classList.add("active");
    if (noconsiguio == 0) {
      res.innerHTML += '<p class="error">' + /*config.error +*/ buscador + "</p>";
    }
  }
}

function viewProfile(ci) {
  document.getElementById("div_info").classList.add("d-none");
  let text = ci.toString();
  //console.log(typeof text)

  var estudiante = datos.filter(
    (element) => element.ci === text
  )
  //

  var scripts = document.getElementsByTagName("script"),
    src = scripts[scripts.length - 1].src;
  $.ajax({
    type: "GET",
    url: window.location.pathname + 'getDatos.php',
    data: { ci: ci.toString() },
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.success === 1) {

        document.getElementById("div_info").classList.remove("d-none");
        console.log(jsonData.data.nombre)
        /*$('#perfil_nombre').text(jsonData.data.nombre)*/
        document.getElementById('perfil_nombre').innerHTML = jsonData.data.nombre
        document.getElementById('imagen').src = document.getElementById('imagen').src = estudiante[0].imagen
        document.getElementById("perfil_descripcion").innerHTML = jsonData.data.descripcion;
        //document.getElementById("conf_color").innerHTML = config.color;
        document.getElementById("perfil_color").innerHTML = jsonData.data.color;
        //document.getElementById("conf_libro").innerHTML = config.libro;
        document.getElementById("perfil_libro").innerHTML = jsonData.data.libro;
        //document.getElementById("conf_musica").innerHTML = config.musica;
        document.getElementById("perfil_musica1").innerHTML = jsonData.data.musica.join(", ");
        //document.getElementById("conf_video_juego").innerHTML = config.video_juego
        document.getElementById("perfil_video_juego1").innerHTML = jsonData.data.video_juego.join(", ");
        //document.getElementById("conf_lenguajes").innerHTML = config.lenguajes;
        document.getElementById("perfil_lenguajes1").innerHTML = jsonData.data.lenguajes.join(", ");
        document.getElementById("perfil_email").innerHTML = jsonData.data.email

        //document.getElementById("conf_email").innerHTML = config.email.replace('[email]', '<a href="#"><span id="perfil_email">' + jsonData.data.email + '</span></a>');
        //document.getElementById("conf_copyRight").innerHTML = config.copyRight;
      } else {
        alert('Error, JSON invalido o no se encuentra.');
      }
    },
    error: function (request, status, error) {
      alert(request.responseText);
    }
  })
}

// Carousel
$('#carouselExample').on('slide.bs.carousel', function (e) {
  var $e = $(e.relatedTarget);
  var idx = $e.index();
  var itemsPerSlide = 5;
  var totalItems = $('.carousel-item').length;

  if (idx >= totalItems - (itemsPerSlide - 1)) {
    var it = itemsPerSlide - (totalItems - idx);
    for (var i = 0; i < it; i++) {
      // append slides to end
      if (e.direction == "left") {
        $('.carousel-item').eq(i).appendTo('.carousel-inner');
      }
      else {
        $('.carousel-item').eq(0).appendTo('.carousel-inner');
      }
    }
  }
});


$('#carouselExample').carousel({
  interval: 2000
});


$(document).ready(function () {
  /* show lightbox when clicking a thumbnail */
  $('a.thumb').click(function (event) {
    event.preventDefault();
    var content = $('.modal-body');
    content.empty();
    var title = $(this).attr("title");
    $('.modal-title').html(title);
    content.html($(this).html());
    $(".modal-profile").modal({ show: true });
  });

});


// Source https://bootsnipp.com/snippets/dl6ez