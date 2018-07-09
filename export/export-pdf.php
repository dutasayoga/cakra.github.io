<?php
require_once('../db.php');

$content = '
<style>
.tabel { border-collapse:collapse; }
.tabel th { padding:5px 5px;}
</style>
';
$content .= '
<page>
   <div style="padding:4mm;" align="center">
      <span style="font-size:25px;"> Form Person</span>
   </div>

   <div align="center">
      <table border="1px" class="tabel">
            <tr>
               <th>NIPEG</th>
               <th>NAMA</th>
               <th>TANGGAL LAHIR</th>
               <th>TMTKERJA</th>
               <th>E_MAIL</th>
               <th>KODPEN</th>
               <th>STSPEG</th>
               <th>KDKRJ</th>
               <th>IDJOB</th>
               <th>NIPEG_UP</th>
               <th>PANGKAT</th>
               <th>P_NILAI</th>
               <th>K_NILAI</th>
               <th>STATUS_PK</th>
               <th>PK_UPDATE</th>
            </tr>';
            $ambil=$conn->query("SELECT * FROM person");
            while($break = $ambil->fetch_assoc()) {
            $content .= '
            <tr>
               <td>'.$break['NIPEG'].'</td>
               <td>'.$break['NAMA'].'</td>
               <td> '.$break['TGLLAHIR'].'</td>
               <td> '.$break['TMTKERJA'].'</td>
               <td> '.$break['E_MAIL'].'</td>
               <td>'.$break['KODPEN'].'</td>
               <td  align="center">'.$break['STSPEG'].' </td>
               <td>'.$break['KDKRJ'].'</td>
               <td>'.$break['IDJOB'].'</td>
               <td>'.$break['NIPEG_UP'].'</td>
               <td align="center">'.$break['PANGKAT'].'</td>
               <td align="center">'.$break['P_NILAI'].'</td>
               <td align="center">'.$break['K_NILAI'].'</td>
               <td align="center">'.$break['STATUS_PK'].'</td>
               <td>'.$break['PK_UPDATE'].' </td>
               </tr>
            ';
         }
         $content .= '
      </table>
   </div>
</page>
';

require_once('../assets/html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('L','A2','en');
$html2pdf->pdf->SetDisplayMode('fullpage');
$html2pdf->WriteHTML($content);
$html2pdf->Output('formperson.pdf');
?>
