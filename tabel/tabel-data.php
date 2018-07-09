<table class="display table table-bordered table-responsive table-hover nowrap" id="myTable">
   <thead>
      <tr>
         <th class="first-col">ACTION</th>
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
</table>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="./assets/DataTables/datatables.min.js"></script>

<script>
   $(document).ready(function() {
      var oldExportAction = function (self, e, dt, button, config) {
             if (button[0].className.indexOf('buttons-excel') >= 0) {
                 if ($.fn.dataTable.ext.buttons.excelHtml5.available(dt, config)) {
                     $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config);
                 }
                 else {
                     $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
                 }
             } else if (button[0].className.indexOf('buttons-print') >= 0) {
                 $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
             } else if (button[0].className.indexOf('buttons-csv') >= 0) {
                if ($.fn.dataTable.ext.buttons.csvHtml5.available(dt, config)) {
                    $.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button, config);
                }
                else {
                    $.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button, config);
                }
             }
         };

      var newExportAction = function (e, dt, button, config) {
          var self = this;
          var oldStart = dt.settings()[0]._iDisplayStart;

          dt.one('preXhr', function (e, s, data) {
              // Just this once, load all data from the server...
              data.start = 0;
              data.length = 2147483647;

              dt.one('preDraw', function (e, settings) {
                  // Call the original action function
                  oldExportAction(self, e, dt, button, config);

                  dt.one('preXhr', function (e, s, data) {
                      // DataTables thinks the first item displayed is index 0, but we're not drawing that.
                      // Set the property to what it was before exporting.
                      settings._iDisplayStart = oldStart;
                      data.start = oldStart;
                  });

                  // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                  setTimeout(dt.ajax.reload, 0);

                  // Prevent rendering of the full data to the DOM
                  return false;
              });
          });

          // Requery the server with the new one-time export settings
          dt.ajax.reload();
      };
      $('#myTable').DataTable( {
         "processing": true,
         "serverSide": true,
         "ajax": "tabel/server-side.php",
         dom : "Bfrtip",
         lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
         ],
         buttons : [
            'pageLength',
            {
               extend: 'excel',
               exportOptions: {
                  columns: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15]
               },
               action: newExportAction
            },
            {
               extend: 'csv',
               exportOptions: {
                  columns: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15]
               },
               action: newExportAction
            },
            {
               extend: 'print',
               autoPrint : false,
               exportOptions: {
                  columns: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15]
               },
               action: newExportAction
            }

         ],
         "order"     : [],
         columnDefs : [
            {
               "searchable"   : false,
               "orderable"    : false,
               "targets"      : 0,
               "render"       : function(data, type, row) {
                  var btn = "<center><button  name=\"view\" class=\"btn btn-info btn-xs view-data\" id=" + data + "><i class=\"fa fa-folder-open-o\"></i>view</button> <button name=\"edit\" class=\"btn btn-danger btn-xs edit-data\" id = "+ data +"><i class=\"fa fa-edit\"></i> edit</button></center>";
                  return btn;
               }
            },
            {
               "targets"      : [-3,-4],
               "render"       : function(data, type, row) {
                  var btn = "<center><a style=\"color:red\">"+data+ "</a></center>";
                  return btn;
               }
            },
            {
               "searchable"   : false,
               "orderable"    : false,
               "targets"      : 5,
               "render"       : function(data, type, row) {
                  var btn = "<center><a >"+data+ "</a></center>";
                  return btn;
               }
            },
            {
               "targets"      : -2,
               "render"       : function(data, type, row) {
                  var btn = "<center><p style=\"font-weight: bold;\">"+data+ "</p></center>";
                  return btn;
               }
            }
         ]

      } );
   } );
</script>
