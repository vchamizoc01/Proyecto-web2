<?php
session_start();
include_once ('views/header.php');
include_once ('controllers/productoscontroller.php');
include_once ('models/productosDAO.php');
include_once ('controllers/usercontrollers.php');
include_once ('models/UsuariosDAO.php');
include_once ('controllers/pedidoscontroller.php');
include_once ('models/pedidosDAO.php');
include_once ('controllers/ppcontroller.php');
include_once ('models/ppDAO.php');


//Punto de entrada a la aplicación. Si no se recibe parámetro action y controller en la url
//se muestra la página de inicio (texto HTML).
//En caso de que si se reciba, se instancia el controlador y se invoca la acción indicada.

if (isset($_REQUEST['action']) && isset($_REQUEST['controller']) ){
    $act=$_REQUEST['action'];
    $cont=$_REQUEST['controller'];

    //Instanciación del controlador e invocación del método
    $controller=new $cont();
    $controller->$act();

}
else
 echo '
 <div id="carouselExampleIndicators" class="carousel slide mx-auto" data-ride="carousel" style="max-width: 400px; margin-top: 100px; margin-bottom: 100px;">
   <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
   </ol>
   <div class="carousel-inner">
      <div class="carousel-item active">
         <img src="assets/carrusel1.jpg" class="d-block w-100" style="max-width: 410px; height: auto;" alt="...">
      </div>
      <div class="carousel-item">
         <img src="assets/carrusel2.jpg" class="d-block w-100" style="max-width: 360px; height: auto;" alt="...">
      </div>
      <div class="carousel-item">
         <img src="assets/carrusel3.jpg" class="d-block w-100" style="max-width: 400px; height: auto;" alt="...">
      </div>
   </div>
   <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
   </a>
   <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
   </a>
</div>
 ';
  require_once ("views/footer.php");

?>