<?php
      require_once("db.php");
       ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>FORM PERSON</title>
      <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="assets/css/buttons.dataTables.min.css">
      <link rel="stylesheet" href="assets/css/bootstrap.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/sb-admin.css">
   </head>
   <body>
       <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" >

       </div>

      <div class="col-md-12" id="page-wrapper">
         <table class="table table-hover table-bordered" id="myTable">
            <thead class="">
               <tr>
                  <th >NIPEG</th>
                  <th >NAMA</th>
                  <th >TANGGAL LAHIR</th>
                  <th >TMTKERJA</th>
                  <th >E_MAIL</th>
                  <th >KODPEN</th>
                  <th >STSPEG</th>
                  <th >KDKRJ</th>
                  <th >IDJOB</th>
                  <th >NIPEG_UP</th>
                  <th >PANGKAT</th>
                  <th >P_NILAI</th>
                  <th >K_NILAI</th>
                  <th >STATUS_PK</th>
                  <th >PK_UPDATE</th>
                  <th>ACTION</th>
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
                  <td><?php echo $break['STSPEG']; ?></td>
                  <td><a><?php echo $break['KDKRJ']; ?></a></td>
                  <td><a><?php echo $break['IDJOB']; ?></a></td>
                  <td><?php echo $break['NIPEG_UP']; ?></td>
                  <td><?php echo $break['PANGKAT']; ?></td>
                  <td>
                     <?php echo $break['P_NILAI']; ?>

                  </td>
                  <td>
                     <?php echo $break['K_NILAI']; ?>

                  </td>
                  <td><?php echo $break['STATUS_PK']; ?></td>
                  <td><?php echo $break['PK_UPDATE']; ?></td>
                  <td align = "center">
                     <a id="edit_value" data-toggle="modal" data-target="#edit" data-id="<?php echo $break['NIPEG'];?>" data-nama="<?php echo $break['NAMA'];?>" data-kdkrj="<?php echo $break['KDKRJ'];?>" data-Pnilai="<?php echo $break['P_NILAI'];?>" data-Knilai="<?php echo $break['K_NILAI'];?>" data-statusPK="<?php echo $break['STATUS_PK'];?>">
                        <button class="btn btn-info btn-xs " ><i class="fa fa-edit"></i> edit</button>
                     </a>
                  </td>
               </tr>
               <?php } ?>
            </tbody>
         </table>
      </div>

      <div id="edit" class="modal fade" role="dialog">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">x</button>

                  <h2 align="center" class="modal-title">INPUT VALUE P&K </h2>
               </div>
               <form class="form-horizontal" enctype="multipart/form-data" id="form">
                  <div class="modal-body">
                     <input type="hidden" name="NIPEG" id="NIPEG">
                     <div class="form-group">
                        <label class="control-label col-sm-2" for="NAMA">NAMA</label>
                        <div class="col-sm-10">
                           <input type="text" name="NAMA" class="form-control" id="NAMA">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-sm-2" for="KDKRJ">KODE KERJA</label>
                        <div class="col-sm-10">
                           <input type="text" name="KDKRJ" class="form-control" id="KDKRJ">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-sm-2" for="P_NILAI">P NILAI</label>
                        <div class="col-sm-10">
                           <input type="number" name="P_NILAI" class="form-control" id="P_NILAI">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-sm-2" for="K_NILAI">K NILAI</label>
                        <div class="col-sm-10">
                           <input type="number" name="K_NILAI" class="form-control" id="K_NILAI">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-sm-2" for="STATUS_PK">STATUS_PK</label>
                        <div class="col-sm-10">
                           <select class="form-control" name="STATUS_PK" id="STATUS_PK">
                              <option value="SEL">SEL</option>
                              <option value="HRD">HRD</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="submit" class="btn btn-success" name="save" value="simpan">SAVE</button>
                  </div>
               </form>
               <?php

               ?>
            </div>
         </div>
      </div>
      <script src="assets/js/jquery-1.10.2.js"></script>
      <script type="text/javascript">
      $(document).on("click", "#edit_value", function() {
         var NIPEG = $(this).data('id');
         var NAMA = $(this).data('nama');
         var KDKRJ = $(this).data('kdkrj');
         var P_NILAI = $(this).data('Pnilai');
         var K_NILAI = $(this).data('Knilai');
         var STATUS_PK = $(this).data('statusPK');
         $(".modal-body #NIPEG").val(NIPEG);
         $(".modal-body #NAMA").val(NAMA);
         $(".modal-body #KDKRJ").val(KDKRJ);
         $(".modal-body #P_NILAI").val(P_NILAI);
         $(".modal-body #K_NILAI").val(K_NILAI);
         $(".modal-body #STATUS_PK").val(STATUS_PK);
      })

      $(document).ready(function(e) {
         $("#form").on("submit", (function(e) {
            e.preventDefault();
            $.ajax({
               url : 'models/edit-data.php',
               type : 'POST',
               data : new FormData(this),
               contentType : false,
               cache : false,
               processData : false,
               success : function(msg) {
                  $('.table').html(msg);
               }
            })
         }))
      })
      </script>

   </body>
   <script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>
   <script type="text/javascript" src="assets/js/datatables.min.js"></script>
   <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
   <script type="text/javascript" src="assets/js/dataTables.buttons.min.js"></script>

   <script>
      $(document).ready(function() {
         $('#myTable').DataTable();
      } );


   </script>
</html>
<tbody>
   <?php $ambil=$conn->query("SELECT * FROM person LIMIT 10") ?>
   <?php while($break = $ambil->fetch_assoc()) { ?>
   <tr>
      <td align="center">
         <button  name="view" class="btn btn-info btn-xs view-data" id="<?php echo $break['NIPEG'];?>"><i class="fa fa-folder-open-o"></i>view</button>

         <a id="edit_value" data-toggle="modal" data-target="#edit" data-id="<?php echo $break['NIPEG'];?>" data-nama="<?php echo $break['NAMA'];?>" data-kdkrj="<?php echo $break['KDKRJ'];?>" data-Pnilai="<?php echo $break['P_NILAI'];?>" data-Knilai="<?php echo $break['K_NILAI'];?>" data-statusPK="<?php echo $break['STATUS_PK'];?>">
            <button class="btn btn-danger btn-xs " ><i class="fa fa-edit"></i>edit</button>
         </a>
      </td>
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


var btn = "<button  name=\"view\" class=\"btn btn-info btn-xs view-data\" id=" + echo $break['NIPEG']; + "><i class=\"fa fa-folder-open-o\"></i>view</button>"

var btn = "<a id=\"edit_value\" data-toggle=\"modal\" data-target=\"#edit\" data-id=" + echo $break['NIPEG'] + " data-nama=" + echo $break['NAMA'] + " data-kdkrj="+ echo $break['KDKRJ']+" data-Pnilai="++ echo $break['P_NILAI']+" data-Knilai="+ echo $break['K_NILAI']+" data-statusPK="+ echo $break['STATUS_PK']+"><button class=\"btn btn-danger btn-xs\" ><i class=\"fa fa-edit\"></i></button></a>"


/*var btn = "<button  name="view" class="btn btn-info btn-xs view-data" id="<?php echo $break['NIPEG'];?>"><i class="fa fa-folder-open-o"></i>view</button>"
return btn*/

"render"       : function(data, type, row) {
   var btn = "<center><a name=\"view\" id=\" +data+ "\" class=\"btn btn-info btn-xs view-data\"><i class=\"fa fa-folder-open-o\"></i>view</a> <a name=\"view\" id=\"+data+"\" class=\"btn btn-info btn-xs view-data\"><i class=\"fa fa-folder-open-o\"></i>view</a></center>";
   return btn;
