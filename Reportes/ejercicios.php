<?php
session_start();
$fecha  = $_SESSION["ultimoAcceso"];

//require_once __DIR__ . 'vendor/autoload.php';
include "../vendor/autoload.php";
include '../Reportes/model.php';

$clientes = new Model();
$usuarios = new Model();
$css = file_get_contents('../Reportes/style.css');

$lista = $clientes->getEjer();
$lista2 = $usuarios->getEjer();

//var_dump($lista);
$html = '<img src="logo.png" width="200" />
        <div id="company">
            <h2 class="name">ERM COACH REPORTES</h2>
            <div>Florencia - Cauqeta, Colombia</div>
            <div>(+57) 315 409 7882/div>
            <div><a href="mailto:ERMCoach@gmail.com">ERMCoach@gmail.com</a></div>
            
        </div>
        <h1>Tabla de clientes</h1>
        <table border="0" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th class="no">id</th>
                <th class="desc">Nombre</th>
                <th class="qty">Descripcion</th>
               
            </tr>
        </thead>        ';
foreach($lista['items'] as $item){
    //echo $item['nombres'];
    $html .= 
    '<tbody>
        <tr>
            <td class="no">'.$item['id'].'</td>
            <td class="desc">'.$item['Nombre'].'</td>
            <td class="unit">'.$item['descripcion'].'</td>
        </tr>
    </tbody>';
}
$html .= '</table>';













$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html);

$mpdf->Output();
?>