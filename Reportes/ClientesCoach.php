<?php
session_start();
$fecha  = $_SESSION["ultimoAcceso"];
$usuario  = $_SESSION["usuario"];
$codigo  = $_SESSION["codigo"];
$correo  = $_SESSION["correo"];
$direccion  = $_SESSION["direccion"];
$telefono  = $_SESSION["telefono"];


//require_once __DIR__ . 'vendor/autoload.php';
include "../vendor/autoload.php";
include '../Reportes/modelCoach.php';

$Client = new Model();
$css = file_get_contents('../Reportes/style.css');

$lista = $Client->getClientes();

//var_dump($lista);
$html = '
    <header class="clearfix">
        <div id="logo">
            <img src="logo.png" width="200" />
        </div>
        <div id="company">
            <h2 class="name">ERM COACH REPORTES</h2>
            <div>Florencia - Caqueta, Colombia</div>
            <div>(+57) 315 409 7882/div>
            <div><a href="mailto:ERMCoach@gmail.com">ERMCoach@gmail.com</a></div>
        </div>
    </header>
    <main>
        <div id="details" class="clearfix">
        <div id="client">
          <div class="to">Generado Por</div>
          <h2 class="name">'.$usuario.'</h2>
          <div class="address">Direccion :'.$direccion.'</div>
          <div class="email"><a href="mailto:john@example.com">email :'.$correo.'</a></div>
          <div class="address">Contacto :'.$telefono.'</div>
          <div class="address">Codigo :'.$telefono.'</div>
        </div>

        <div id="invoice">
          <div class="date">Fecha: '.$fecha.'</div>
        </div>
      </div>




      <h1>Tabla de Clientes</h1>
      <table border="0" cellspacing="0" cellpadding="0">
      <thead>
          <tr>
              <th class="no">Codigo</th>
              <th class="desc">Nombre</th>
              <th class="unit">Direccion</th>
              <th class="qty">Telefono</th>
              <th class="qty">correo</th>
          </tr>
      </thead>        ';
foreach($lista['items'] as $item){
  //echo $item['nombres'];
  $html .= 
  '<tbody>
      <tr>
          <td class="no">'.$item['codigo'].'</td>
          <td class="desc">'.$item['nombres'].'</td>
          <td class="unit">'.$item['direccion'].'</td>
          <td class="qty">'.$item['telefono'].'</td>
          <td class="qty">'.$item['correo'].'</td>
      </tr>
  </tbody>';
}
$html .= '</table>
';












$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html);

$mpdf->Output();
?>