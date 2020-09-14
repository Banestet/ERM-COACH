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

$ClieBMI = new Model();
$css = file_get_contents('../Reportes/style.css');

$lista = $ClieBMI->getBMI();

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
        </div>

        <div id="invoice">
          <div class="date">Fecha: '.$fecha.'</div>
        </div>
      </div>




        <h1>Tabla de Batidos</h1>
        <table border="0" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th class="no">id</th>
                <th class="desc">Nombre</th>
                <th class="unit">fecha</th>

                <th class="qty">peso</th>
                <th class="unit">altura</th>

                <th class="qty">resultado</th>
                <th class="unit">estado</th>
                <th class="qty">sistema</th>
            </tr>
        </thead>        ';
foreach($lista['items'] as $item){
    //echo $item['nombres'];
    $html .= 
    '<tbody>
        <tr>
            <td class="no">'.$item['id'].'</td>
            <td class="desc">'.$item['nombre'].'</td>
            <td class="unit">'.$item['fecha'].'</td>

            <td class="qty">'.$item['peso'].'</td>
            <td class="unit">'.$item['altura'].'</td>

            <td class="qty">'.$item['resultado'].'</td>
            <td class="unit">'.$item['estado'].'</td>
            <td class="qty">'.$item['sistema'].'</td>
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