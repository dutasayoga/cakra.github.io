<?php
require_once("../db.php");
if ($_POST['Pvalue'] == '0' && $_POST['Kvalue'] != '0') {
   $x = $_POST['Kvalue'];
   $Pvalue = array('0','1','2','3');
   $Kvalue = array($x,$x,$x,$x);
} elseif ($_POST['Kvalue'] == '0' && $_POST['Pvalue'] != '0') {
   $x = $_POST['Pvalue'];
   $Kvalue = array('0','1','2','3');
   $Pvalue = array($x,$x,$x,$x);
} else {
   $x = $_POST['Pvalue'];
   $y = $_POST['Kvalue'];
   $Kvalue = array($y,$y,$y,$y);
   $Pvalue = array($x,$x,$x,$x);
}
print_r($Kvalue[0]);

 ?>
 <html lang="en" dir="ltr">
    <head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>CAKRA</title>
       <link rel="stylesheet" href="../assets/DataTables/DataTables-1.10.16/css/jquery.dataTables.min.css">
       <link rel="stylesheet" href="../assets/DataTables/Buttons-1.5.1/css/buttons.dataTables.min.css">

       <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
       <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
       <link rel="stylesheet" href="../assets/css/sb-admin.css">
    </head>
    <body>
       <table class="display table table-bordered table-stripped" id="tablevalue">
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
                  <?php $ambil=$conn->query("SELECT * FROM person WHERE P_NILAI IN ('".$Pvalue[0]."','".$Pvalue[1]."','".$Pvalue[2]."','".$Pvalue[3]."') AND K_NILAI IN ('".$Kvalue[0]."','".$Kvalue[1]."','".$Kvalue[2]."','".$Kvalue[3]."') ") ?>
                  <?php while($break = $ambil->fetch_assoc()) { ?>
                  <tr>
                     <td><?php echo $break['NIPEG']; ?></td>
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
    </boody>
    </html>
