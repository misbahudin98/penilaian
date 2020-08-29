
<!--   <link href="<?= base_url()  ?>assets/css/demo_table.css" rel="stylesheet" /> -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('')  ?>assets/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
<!--   <link rel="stylesheet" href="<?= base_url()  ?>assets/css/DT_bootstrap.css" />
 -->  
    <!--main content start-->

    <style type="text/css">
      div.dataTables_wrapper{
        width: 800;
        margin: 0 auto;
      }
    </style>
    <section id="main-content">


      <section class="wrapper site-min-height">
        <?php if ($this->session->flashdata('empty')  == 1){ ?>
          
        <div class="row mt">
          <!-- page start-->

          <div class="content-panel" style="margin-left: 15px;margin-right: 15px; ">
            <div class="adv-table" style="margin-left: 15px; margin-right: 15px ;">
                <h3>Maaf data penilai maupun skor masih kurang untuk dilakukan perhitungan</h3>
            </div>
          </div>

        </div>
        <?php }else { ?>

        <h3><i class="fa fa-angle-right"></i>Perhitungan skor borda</h3>
        
           <div class="row mt">

        <div class="content-panel" style="margin-left: 15px;margin-right: 15px; ">
            <div class="adv-table" style="margin-left: 15px; margin-right: 15px ;">
            
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="borda">
                <thead>

                  <tr>
                    <th>Rangking</th>
                    <th>NIK</th>
                    <th>Point Borda</th>
                    <th>Nilai Borda</th>
                  </tr>
                  
                   
                </thead>
                <tbody>

                      <?php

                       for ($j=1; $j <= count($ranking) ; $j++) { ?>
                      <tr >
                        <td></td>
                        <td><?=  $ranking[$j]['id'] ?></td>
                       
                    
                        <td><?= $ranking[$j]['sum']  ?></td>
                        <td><?= $ranking[$j]['score']  ?></td>
                                              
                      </tr>
                      <?php } ?>

                </tbody>
                <tfoot>
                  <th>  </th>
                  <th> Jumlah Point Borda </th>
                  <th> <?= $jumlah_borda  ?> </th>
                  <th>  </th>

                </tfoot>

              </table>

            </div>
          </div>
        </div>
        <?php } ?>
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
          Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
        </div>
        <a href="blank.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="<?= base_url(''); ?>assets/js/jquery.min.js"></script>
  <!-- <script src="<?= base_url();?>assets/js/jquery.min.js"></script> -->
  <script src="<?= base_url();?>assets/js/bootstrap.min.js"></script>
  <script src="<?= base_url();?>assets/js/jquery-ui-1.9.2.custom.min.js"></script>
  <script src="<?= base_url();?>assets/js/jquery.ui.touch-punch.min.js"></script>
  <script class="include" type="text/javascript" src="<?= base_url();?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
  <script src="<?= base_url();?>assets/js/jquery.scrollTo.min.js"></script>
  <script src="<?= base_url();?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="<?= base_url();?>assets/js/common-scripts.js"></script>

  <!--script for this page-->
    <script type="text/javascript" language="javascript" src="<?= base_url('')  ?>assets/js/jquery.dataTables.js"></script>
  <!-- <script type="text/javascript" src="<?= base_url()  ?>assets/js/DT_bootstrap.js"></script> -->
    <script type="text/javascript" src="<?= base_url('')  ?>assets/js/dataTables.buttons.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"> </script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"> </script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"> </script>
 --><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"> </script>  
  <script type="text/javascript">
    /* Formating function for row details */

    $(document).ready(function() {
      /*
       * Initialse DataTables, with no sorting on the 'details' column
       */

       var t = $('#borda').dataTable({
        //           "scrollY":        true,
        // "scrollX":        true,
        // "scrollCollapse": true,
        //"paging":         false,
        
         "info": false,
         "paging": false,
         "columnDefs": [{
    "targets": '_all',
    "createdCell": function(cell, cellData, rowData, rowIndex, colIndex) {
        $(cell).attr({'data-pk': rowData[0]});
    }
}],
         "aaSorting": [
            [3, 'desc']
          ],
           dom: 'Bfrtip',
        buttons: [   {extend : 'excel',title: 'Perkalian Skor Awal dengan Bobot Mahasiswa' }     ]  });
        // t.on( 'order.dt search.dt', function () {
        //     t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        //         cell.innerHTML = i+1;
        //     } );
        // } ).draw();
         $('#borda tbody tr').each(function (idx) {
               $(this).children("td:eq(0)").html(idx + 1);
           });
    });

  </script>
</body>
</html>