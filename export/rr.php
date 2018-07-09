<?php
require_once('../db.php');

$content = '
<style>

</style>
';
$content .= '
<page>
   <div style="padding:4mm;" align="center">
      <span style="font-size:25px;"> Form Person</span>
   </div>

   
</page>
';

require_once('../assets/html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('L','A4','en');
$html2pdf->WriteHTML($content);
$html2pdf->Output('formperson.pdf');
?>
