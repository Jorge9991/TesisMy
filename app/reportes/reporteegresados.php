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

$impr = new daoReporte();
$datos = $impr->egresados2();
$datos3 = $impr->egresados3();
$content = '';
$content .= '
    

        <div class="row">	
        <div class="col-md-12">
        <h1 style="text-align:center;"> Instituto Superior Tecnológico Juan Bautista Aguirre </h1>  
        <h4 style="text-align:center;"> Reporte de Egresados </h4> 
        <div>Egresados con el proceso de titulación opción tesis terminada.</div>
	<br>
         <table cellspacing="0" cellpadding="1" border="1" style="border-color:gray;">
     <thead>
          <tr bgcolor="#c9dff0">
          
                                 <th width="100" align="center">Cedula</th>           
                                 <th width="215" align="center">Nombres</th>     
                                 <th width="200" align="center">Correo</th> 
           
          </tr>
        </thead>

      
	';
foreach ($datos as $dato) {


    $content .= '
    <tr>
        <td align="center" width="100" >' . $dato['cedula'] . '</td>
        <td align="center" width="215">' . $dato['apellido'] . ' ' . $dato['nombre'] . '</td>
        <td align="center" width="200">' . $dato['correo'] . '</td>
    </tr>';
}

foreach ($datos3 as $dato) {


    $content .= '
    <tr>
        <td align="center" width="100" >' . $dato['cedula'] . '</td>
        <td align="center" width="215">' . $dato['apellido'] . ' ' . $dato['nombre'] . '</td>
        <td align="center" width="200">' . $dato['correo'] . '</td>
    </tr>';
    $content .= '
    <tr>
        <td align="center" width="100" >' . $dato['cedula2'] . '</td>
        <td align="center" width="215">' . $dato['apellido2'] . ' ' . $dato['nombre2'] . '</td>
        <td align="center" width="200">' . $dato['correo2'] . '</td>
    </tr>';
}
$content .= '</table>';

class MYPDF extends TCPDF {

    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }

    //Page header
    public function Header() {
 
        $html = '
            <h5 align="right"></h5>
     <img src="../../static/img/logoits.png" width="150" height="60"><img src="../../static/img/nada.jpg"  width="175" height="60"><img src="../../static/img/gestoria.png" width="175" height="60"> 
     ';
        $this->writeHTMLCell($w = 0, $h = 50, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = false, $align = 'C', $autopadding = true);
        $this->setPageMark();
    }

}

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

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