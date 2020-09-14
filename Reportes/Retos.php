<?php
session_start();
$fecha  = $_SESSION["ultimoAccesoU"];
$usuario  = $_SESSION["usuario"];
$codigo  = $_SESSION["codigo"];
$correo  = $_SESSION["correo"];
$direccion  = $_SESSION["direccion"];
$telefono  = $_SESSION["telefono"];


//require_once __DIR__ . 'vendor/autoload.php';
include "../vendor/autoload.php";
include '../Reportes/model.php';

$retos = new Model();
$css = file_get_contents('../Reportes/style.css');

$lista = $retos->getRetos();

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
          <div class="address">Codigo :'.$codigo.'</div>
        </div>

        <div id="invoice">
          <div class="date">Fecha: '.$fecha.'</div>
        </div>
      </div>





        <h1>Tabla de Ejercicios</h1>
        <table border="0" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th class="no">Id</th>
                <th class="unit">title</th>
                <th class="desc">fecha</th>
            </tr>
        </thead>        ';
foreach($lista['items'] as $item){
    //echo $item['nombres'];
    $html .= 
    '<tbody>
        <tr>
            <td class="no">'.$item['id'].'</td>
            <td class="unit">'.$item['title'].'</td>
            <td class="desc">'.$item['created_at'].'</td>
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