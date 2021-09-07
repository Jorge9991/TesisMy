<?php

include '../view/session.php';
if ($Sesion->getIdTipoUsuario() != 1 and $Sesion->getIdTipoUsuario() != 4) {
    header('Location: principal.php');
}
?>
<?php

error_reporting(E_ALL ^ E_NOTICE);
require_once('../../lib/tcpdf/tcpdf.php');
require_once '../dao/daoReporte.php';
$suma1 = 0;
$suma2 = 0;
$entre78 = 0;
$entre910 = 0;
$impr = new daoReporte();
$datos = $impr->notas();
$datos3 = $impr->notas2();
$datos2 = $impr->jurados();
$content = '';
$content .= '
    

        <div class="row">	
        <div class="col-md-12">
        <h1 style="text-align:center;"> Instituto Superior Tecnológico Juan Bautista Aguirre </h1>  
        <h4 style="text-align:center;"> Reporte de Calificaciones por grupos</h4> 
	
    <h5>Lista de grupos</h5>
         <table cellspacing="0" cellpadding="1" border="1" style="border-color:gray;">
     <thead>
          <tr bgcolor="#c9dff0">
           
           <th width="300" align="center">Equipo-nombres</th>  
           <th width="200" align="center">Notas</th> 
          </tr>
        </thead>

      
	';
foreach ($datos as $dato) {
    if ($dato['nota'] >= 7 and $dato['nota'] <= 8.99) {
        $entre78 = $entre78 + 1;
    }
    if ($dato['nota'] >= 9 and $dato['nota'] <= 10) {
        $entre910 = $entre910 + 1;
    }

    $suma1 = $dato['nota'] + $suma1;

    $content .= '
    <tr>
    <td align="center" width="300">' . $dato['nombres'] . '</td>
        <td align="center" width="200" >' . $dato['nota'] . '</td>
        

    </tr>';
}

foreach ($datos3 as $dato) {
    if ($dato['nota'] >= 7 and $dato['nota'] <= 8) {
        $entre78 = $entre78 + 1;
    }
    if ($dato['nota'] >= 9 and $dato['nota'] <= 10) {
        $entre910 = $entre910 + 1;
    }

    $suma2 = $dato['nota'] + $suma2;

    $content .= '
    <tr>
    <td align="center" width="300">' . $dato['nombres'] . '</td>
        <td align="center" width="200" >' . $dato['nota'] . '</td>
        
    </tr>';
}
$promedio = ($suma1 + $suma2) / (count($datos) + count($datos3));
$totall = $entre78 +$entre910;

$porcentaje1 = bcdiv(($entre78 * 100)/$totall, '1', 2);
$porcentaje2 = bcdiv(($entre910 * 100)/$totall, '1', 2);
$content .= '</table>';
//estadistica
$content .= '

<h5>Promedio general </h5>
         <table cellspacing="0" cellpadding="1" border="1" style="border-color:gray;">
     <thead>
          <tr bgcolor="#c9dff0">
           
           <th width="500" align="center">Promedio General</th> 
           
          </tr>
        </thead>
';

$content .= '
    <tr>
        <td align="center" width="500" >' . $promedio . '</td>
        

    </tr>';

$content .= '</table>';




$content .= '<br>
<h5>Porcentajes</h5>
         <table cellspacing="0" cellpadding="1" border="1" style="border-color:gray;">
     <thead>
          <tr bgcolor="#c9dff0">
           
           <th width="200" align="center">Descripción</th> 
           <th width="150" align="center">Total-estudiantes</th>  
           <th width="150" align="center">Porcentaje</th>  
          </tr>
        </thead>
';

$content .= '
    <tr>
        <td align="center" width="200" >entre 7 y 8</td>
        <td align="center" width="150" >'.$entre78.'</td>
        <td align="center" width="150" >'.$porcentaje1.'%</td>
    </tr>
    <tr>
        <td align="center" width="200" >entre 9 y 10</td>
        <td align="center" width="150" >'.$entre910.'</td>
        <td align="center" width="150" >'.$porcentaje2.'%</td>
    </tr>
    <tr>
        <td align="center" width="200" >suma</td>
        <td align="center" width="150" >'.$totall.'</td>
        <td align="center" width="150" >100%</td>
    </tr>';

$content .= '</table>';

$content .= '
    <h4 style="text-align:center;"> Reporte de Calificaciones jurados </h4> 
    <h5>Promedio de calificaciones por jurados</h5>
         <table cellspacing="0" cellpadding="1" border="1" style="border-color:gray;">
     <thead>
          <tr bgcolor="#c9dff0">
           
           <th width="300" align="center">Jurado</th> 
           <th width="200" align="center">Promedio-notas</th>  
          </tr>
        </thead>
';

foreach ($datos2 as $dato) {


    $content .= '
    <tr>
    <td align="center" width="300">' . $dato['nombres'] . '</td>
        <td align="center" width="200" >' . $dato['nota'] . '</td>
        
    </tr>';
}

$content .= '</table>';

class MYPDF extends TCPDF
{

    public function Footer()
    {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }

    //Page header
    public function Header()
    {

        $html = '
            <h5 align="right"></h5>
     <img src="../../static/img/logoits.png" width="150" height="60"><img src="../../static/img/nada.jpg"  width="175" height="60"><img src="../../static/img/gestoria.png" width="175" height="60"> 
     ';
        $this->writeHTMLCell($w = 0, $h = 50, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = false, $align = 'C', $autopadding = true);
        $this->setPageMark();
    }
}

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Krigare');
$pdf->setPrintHeader(true);
$pdf->setPrintFooter(true);
$pdf->SetMargins(15, 15, 15, 15);
$pdf->SetAutoPageBreak(true, 30);
$pdf->SetFont('Helvetica', '', 14);
$pdf->addPage();
$pdf->writeHTML($content, true, 0, true, 0);
$pdf->lastPage();
$pdf->Output('reporte_egresados', 'I');
?>