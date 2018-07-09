<?php
require_once('../db.php');
//include "../index.php";

$fileName = "excel-(".date('d-m-Y').").xls";

header("Content-Disposition: attachment; filename='$fileName'");
header("Content-type: application/vnd.ms-excel");

?>

<table border="1px">
   <thead>
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
      </tr>
   </thead>
   <tbody>
      <?php $ambil=$conn->query("SELECT * FROM person") ?>
      <?php while($break = $ambil->fetch_assoc()) { ?>
      <tr>
         <td><a><?php echo $break['NIPEG']; ?></a></td>
         <td><?php echo $break['NAMA']; ?></td>
         <td><?php echo $break['TGLLAHIR']; ?>&ensp;</td>
         <td><?php echo $break['TMTKERJA']; ?></td>
         <td><?php echo $break['E_MAIL']; ?></td>
         <td><?php echo $break['KODPEN']; ?></td>
         <td  align="center"><?php echo $break['STSPEG']; ?></td>
         <td><a><?php echo $break['KDKRJ']; ?></a></td>
         <td><a><?php echo $break['IDJOB']; ?></a></td>
         <td><?php echo $break['NIPEG_UP']; ?></td>
         <td align="center"><?php echo $break['PANGKAT']; ?></td>
         <td align="center"><?php echo $break['P_NILAI']; ?></td>
         <td align="center"><?php echo $break['K_NILAI']; ?></td>
         <td align="center"><?php echo $break['STATUS_PK']; ?></td>
         <td><?php echo $break['PK_UPDATE']; ?></td>
      </tr>
      <?php } ?>
   </tbody>
</table>
