
<!--   <link href="<?= base_url()  ?>assets/css/demo_table.css" rel="stylesheet" /> -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('')  ?>assets/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
<!--   <link rel="stylesheet" href="<?= base_url()  ?>assets/css/DT_bootstrap.css" />
 -->  
    <!--main content start-->
    <section id="main-content">


      <section class="wrapper site-min-height">
   
        <h3><i class="fa fa-angle-right"></i>Nilai Rata-rata Dari Kuesioner</h3>
        
        <div class="row mt">
          <!-- page start-->

          <div class="content-panel" style="margin-left: 15px;margin-right: 15px; ">
            <div class="adv-table" style="margin-left: 15px; margin-right: 15px ;">
            
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="mahasiswa">
                <thead >
                  <th>Mahasiswa</th>
                  <th>Kepribadian</th>
                  <th>Pendagogik</th>
                  <th>Sosial</th>
                   
                </thead>
                <tbody>
                  <?php for ($i=1 ;$i <= count($mahasiswa) ; $i++) { ?>
                    <tr>
                      <td><?= $mahasiswa[$i]['id']  ?></td>                      
                      <td><?= $mahasiswa[$i]['kepribadian']   ?></td>
                      <td><?= $mahasiswa[$i]['pendagogik']   ?></td>
                      <td><?= $mahasiswa[$i]['sosial']   ?></td>           
                    </tr>
                  <?php }  ?>
                </tbody>
                <tfoot>
                       <tr>
                        <td>Bobot</td>
                        <td><?= $bobot['mahasiswa'][0]['bobot']  ?></td>
                        <td><?= $bobot['mahasiswa'][1]['bobot']  ?></td>
                        <td><?= $bobot['mahasiswa'][2]['bobot']  ?></td>
                        
                        
                      </tr>
                </tfoot>
              </table>
            </div>
          </div>


        </div>
        <div class="row mt">
                           <div class="content-panel" style="margin-left: 15px;margin-right: 15px; ">
            <div class="adv-table" style="margin-left: 15px; margin-right: 15px ;">
            
           <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="atasan">
                <thead>
                  <th>Atasan</th>
                  <th>Kepribadian</th>
                  <th>Pendagogik</th>
                  <th>Sosial</th>
                   
                </thead>
                <tbody>
                  <?php for ($i=1; $i <= count($atasan) ; $i++) { ?>

                    <tr>

                      <td><?= $atasan[$i]['id']  ?></td>                      
                      <td><?= $atasan[$i]['kepribadian']   ?></td>
                      <td><?= $atasan[$i]['pendagogik']   ?></td>
                      <td><?= $atasan[$i]['sosial']   ?></td>           
                                 
                     
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>

                      <tr >
                        <td>Bobot</td>
                        <td><?= $bobot['atasan'][0]['bobot']  ?></td>
                        <td><?= $bobot['atasan'][1]['bobot']  ?></td>
                        <td><?= $bobot['atasan'][2]['bobot']  ?></td>
                        
                      </tr>

                </tfoot>
              </table>
            </div>
          </div>
          </div>

        </div>

        <div class="row mt">

          <div class="content-panel" style="margin-left: 15px;margin-right: 15px; ">
            <div class="adv-table" style="margin-left: 15px; margin-right: 15px ;">
            
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="dosen">
                <thead>
                  <th>Dosen</th>
                  <th>Kepribadian</th>
                  <th>Pendagogik</th>
                  <th>Sosial</th>
                  <th>Profesional</th>
                   
                </thead>
                <tbody>
                  <?php for ($i=1 ;$i <= count($dosen) ; $i++) { ?>

                    <tr>
                      <td><?= $dosen[$i]['id']  ?></td>                      
                      <td><?= $dosen[$i]['kepribadian']   ?></td>
                      <td><?= $dosen[$i]['pendagogik']   ?></td>
                      <td><?= $dosen[$i]['sosial']   ?></td>           
                      <td><?= $dosen[$i]['profesional']   ?></td>           
                     
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>

                      <tr >
                        <td>Bobot</td>
                        <td><?= $bobot['dosen'][0]['bobot']  ?></td>
                        <td><?= $bobot['dosen'][1]['bobot']  ?></td>
                        <td><?= $bobot['dosen'][2]['bobot']  ?></td>
                        <td><?= $bobot['dosen'][3]['bobot']  ?></td>
                        
                      </tr>

                </tfoot>
              </table>
            </div>
          </div>
        </div>
     

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
      var oTable = $('#atasan').dataTable({

         "scrollY": 150,
         "info": false,
         "paging": false,
         
           dom: 'Bfrtip',
        buttons: [   {extend : 'excel',title: 'Skor Awal Atasan' }     ]  });

      var oTable = $('#dosen').dataTable({

         "scrollY": 150,
         "info": false,
         "paging": false,
         
           dom: 'Bfrtip',
        buttons: [   {extend : 'excel',title: 'Skor Awal Dosen' }     ]  });

      var oTable = $('#mahasiswa').dataTable({

         "scrollY": 150,
         "info": false,
         "paging": false,
         
           dom: 'Bfrtip',
        buttons: [   {extend : 'excel',title: 'Skor Awal Mahasiswa' }     ]  });

    });

  </script>
</body>
</html>