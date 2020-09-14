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

$medidas = new Model();
$css = file_get_contents('../Reportes/style.css');

$lista = $medidas->getMedidas();

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





        <h1>Tabla de Batidos</h1>
        <table border="0" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
       
        <th class="fec">Fecha</th>
        <th class="pes">peso</th>
        <th class="alt">Altura</th>
        <th class="bid">Bicep derecho</th>
        <th class="bii">Bicep izquierdo</th>
        <th class="hom">Hombros</th>
        <th class="pec">Pecho</th>
        <th class="and">Antebrazo D</th>
        <th class="ani">Antebrazo I</th>
        <th class="muñ">muñeca</th>
        <th class="abd">abdomen</th>
        <th class="cin">Cintura</th>
        <th class="cad">Cadera</th>
        <th class="mus">Muslo</th>
        <th class="rod">Rodilla</th>
        <th class="gem">Gemelos</th>
        <th class="tob">Tobillo</th>
        <th class="pie">Pierna</th>
        <th class="bdr">BicepDR</th>
        <th class="bdi">BicepDI</th>
        

    </tr>
        </thead>        ';
foreach($lista['items'] as $item){
    //echo $item['nombres'];
    $html .= 
    '<tbody>
        <tr>
            
            <td class="fec">'.$item['fecha'].'</td>
            <td class="pes">'.$item['peso'].'</td>
            <td class="alt">'.$item['altura'].'</td>
            <td class="bid">'.$item['BicepD'].'</td>
            <td class="bii">'.$item['BicepI'].'</td>
            <td class="hom">'.$item['Hombros'].'</td>
            <td class="pec">'.$item['Pecho'].'</td>
            <td class="and">'.$item['AntebrazoD'].'</td>
            <td class="ani">'.$item['AntebrazoI'].'</td>
            <td class="muñ">'.$item['Muñeca'].'</td>
            <td class="abd">'.$item['Abdomen'].'</td>
            <td class="cin">'.$item['Cintura'].'</td>
            <td class="cad">'.$item['Cadera'].'</td>
            <td class="mus">'.$item['Muslo'].'</td>
            <td class="rod">'.$item['Rodilla'].'</td>
            <td class="gem">'.$item['Gemelos'].'</td>
            <td class="tob">'.$item['Tobillo'].'</td>
            <td class="pie">'.$item['Pierna'].'</td>
            <td class="bdr">'.$item['BicepDR'].'</td>
            <td class="bdi">'.$item['BicepDI'].'</td>
            
                
        </tr>
    </tbody>';
}
$html .= '</table>
';


$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html);

$mpdf->Output();
