
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
        <?php 
        if ($this->session->flashdata('empty') == 1 ) { ?>
           
        <div class="row mt">
          <!-- page start-->

          <div class="content-panel" style="margin-left: 15px;margin-right: 15px; ">
            <div class="adv-table" style="margin-left: 15px; margin-right: 15px ;">
                <h3>Maaf data penilai maupun skor masih kurang untuk dilakukan perhitungan</h3>
            </div>
          </div>

        </div>
        <?php } else {?>
      <div class="alert alert-info">
        
       <h3> Berikut tampilan perhitungan pada tahun pelajaran <?= str_replace('_', ' Semester', $this->uri->segment(2) )  ?> </h3>
       <br>
       <h4>Untuk Hasil perangkingan bisa dilihat di tabel paling bawah atau lebih tepatnya Tabel Perhitungan skor Borda.</h4>

        <div class="alert alert-success">
          
        <h3>  Silahkan menekan tombol berikut untuk melihat hasil beserta rangking   </h3>
         <a href="<?= base_url('penilaian/'.$this->uri->segment(2))  ?>" class="btn btn-primary">Hasil</a>
        </div>
      </div>
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
                  <th>Profesional</th>
                  <th>Sosial</th>
                   
                </thead>
                <tbody>
                  <?php for ($i=1; $i <= count($atasan) ; $i++) { ?>

                    <tr>

                      <td><?= $atasan[$i]['id']  ?></td>                      
                      <td><?= $atasan[$i]['kepribadian']   ?></td>
                      <td><?= $atasan[$i]['profesional']   ?></td>
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
                  <th>Rekan</th>
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

        <h3><i class="fa fa-angle-right"></i>Perkalian Indikator dengan bobot</h3>
        
        <div class="row mt">
          <!-- page start-->

          <div class="content-panel" style="margin-left: 15px;margin-right: 15px; ">
            <div class="adv-table" style="margin-left: 15px; margin-right: 15px ;">
            
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="mahasiswa1">
                <thead >
                  <th>Mahasiswa</th>
                  <th>Kepribadian</th>
                  <th>Pendagogik</th>
                  <th>Sosial</th>
                  <th>Jumlah</th>

                   
                </thead>
                <tbody>
                  <?php for ($i=1 ;$i <= count($mahasiswa) ; $i++) { ?>
                    <tr>
                      <td><?= $mahasiswa[$i]['id']  ?></td>                      
                      <td><?= $mahasiswa[$i]['bobot_1']   ?></td>
                      <td><?= $mahasiswa[$i]['bobot_2']   ?></td>
                      <td><?= $mahasiswa[$i]['bobot_3']   ?></td>           
                      <td><?= $mahasiswa[$i]['bobot_h']   ?></td>           
                    </tr>
                  <?php }  ?>
                </tbody>
              </table>
            </div>
          </div>
          
        </div>     
      
        <div class="row mt">
          <!-- page start-->
          <div class="content-panel" style="margin-left: 15px;margin-right: 15px; ">
            <div class="adv-table" style="margin-left: 15px; margin-right: 15px ;">
            
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="atasan1">
                <thead >
                  <th>Atasan</th>
                  <th>Kepribadian</th>
                  <th>Profesional</th>
                  <th>Sosial</th>
                  <th>Jumlah</th>
                   
                </thead>
                <tbody>
                  <?php for ($i=1 ;$i <= count($atasan) ; $i++) { ?>
                    <tr>
                      <td><?= $atasan[$i]['id']  ?></td>                      
                      <td><?= $atasan[$i]['bobot_1']   ?></td>
                      <td><?= $atasan[$i]['bobot_2']   ?></td>
                      <td><?= $atasan[$i]['bobot_3']   ?></td>           
                      <td><?= $atasan[$i]['bobot_h']   ?></td>           
                    </tr>
                  <?php }  ?>
                </tbody>

              </table>
            </div>
          </div>
          
        </div>     

        <div class="row mt">
          <!-- page start-->

          <div class="content-panel" style="margin-left: 15px;margin-right: 15px; ">
            <div class="adv-table" style="margin-left: 15px; margin-right: 15px ;">
            
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="dosen1">
                <thead >
                  <th>Rekan</th>
                  <th>Kepribadian</th>
                  <th>Pendagogik</th>
                  <th>Sosial</th>
                  <th>Profesional</th>
                  <th>Jumlah</th>
                   
                </thead>
                <tbody>
                  <?php for ($i=1 ;$i <= count($dosen) ; $i++) { ?>
                    <tr>
                      <td><?= $dosen[$i]['id']  ?></td>                      
                      <td><?= $dosen[$i]['bobot_1']   ?></td>
                      <td><?= $dosen[$i]['bobot_2']   ?></td>
                      <td><?= $dosen[$i]['bobot_3']   ?></td>           
                      <td><?= $dosen[$i]['bobot_4']   ?></td>           
                      <td><?= $dosen[$i]['bobot_h']   ?></td>           
                    </tr>
                  <?php }  ?>
                </tbody>

              </table>
            </div>
          </div>
          
                  <h3><i class="fa fa-angle-right"></i>Perangkingan </h3>
        
        <div class="row mt">
          <!-- page start-->
           <div class="col-md-4">
            
            <div class="content-panel" style="margin-left: 10px ">
            <div class="adv-table" style="margin-left: 15px; margin-right: 15px ;">
            
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="mahasiswa2">
                <thead >
                  <tr>
                    <td colspan="3"><center>Mahasiswa</center></td>
                  </tr>
                  <tr>
                    
                    <th>NIK</th>
                    <th>hasil</th>
                    <th>Peringkat</th>
                  </tr>
                   
                </thead>
                <tbody>
                  <?php for ($i=1 ;$i <= count($mahasiswa) ; $i++) { ?>
                    <tr>
                      <td><?= $mahasiswa[$i]['id']   ?></td>
                      <td><?= $mahasiswa[$i]['bobot_h']   ?></td>
                      <td><?= $mahasiswa[$i]['rank']   ?></td>           
           
                    </tr>
                  <?php }  ?>
                </tbody>
              </table>
            </div>
            </div>
            </div>
           <div class="col-md-4">
           <div class="content-panel">
            <div class="adv-table" style="margin-left: 15px; margin-right: 15px ;">

            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="atasan2">
                <thead >
                  <tr>
                    <td colspan="3"><center>Atasan</center></td>
                  </tr>
                  <tr>
                    
                    <th>NIK</th>
                    <th>hasil</th>
                    <th>Peringkat</th>
                  </tr>
                   
                </thead>
                <tbody>
                  <?php for ($i=1 ;$i <= count($atasan) ; $i++) { ?>
                    <tr>
                      <td><?= $atasan[$i]['id']   ?></td>
                      <td><?= $atasan[$i]['bobot_h']   ?></td>
                      <td><?= $atasan[$i]['rank']   ?></td>           
           
                    </tr>
                  <?php }  ?>
                </tbody>
              </table>
            </div>
            </div>
            </div>
            <div class="col-md-4">
            <div class="content-panel" style="margin-right: 15px; ">
            <div class="adv-table" style="margin-left: 15px; margin-right: 15px ;">

            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="dosen2">
                <thead >
                  <tr>
                    <td colspan="3"><center>Rekan</center></td>
                  </tr>
                  <tr>
                    
                    <th>NIK</th>
                    <th>hasil</th>
                    <th>Peringkat</th>
                  </tr>
                   
                </thead>
                <tbody>
                  <?php for ($i=1 ;$i <= count($dosen) ; $i++) { ?>
                    <tr>
                      <td><?= $dosen[$i]['id']   ?></td>
                      <td><?= $dosen[$i]['bobot_h']   ?></td>
                      <td><?= $dosen[$i]['rank']   ?></td>           
           
                    </tr>
                  <?php }  ?>
                </tbody>
              </table>
            </div>
            </div>
            </div>

        </div>     

        <h3><i class="fa fa-angle-right"></i>Perhitungan skor borda</h3>
        
        <div class="row mt">

            <div class="content-panel" style="margin-left: 15px;margin-right: 15px; ">
            <div class="adv-table" style="margin-left: 15px; margin-right: 15px ;">
            
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="borda">
                <thead>
                  <tr>
                    <th></th>
                    <th colspan="<?= count($ranking)   ?>">Rangking</th>
                    <th></th>
                    <th></th>
                  </tr>

                  <tr>
                    <th>NIK</th>
                    <?php for ($i=1; $i <= count($ranking) ; $i++) { ?>
                      <th><?= $i  ?></th>
                    <?php } ?>
                    <th>Point Borda</th>
                    <th>Nilai Borda</th>
                  </tr>
                  
                   
                </thead>
                <tbody>

                      <?php for ($j=1; $j <= count($ranking) ; $j++) { ?>
                      <tr >
                        
                        <td><?=  $ranking[$j]['id'] ?></td>
                        <?php for ($i=1; $i <= count($ranking); $i++) { ?>
                            
                        <td><?=  isset($ranking[$j]['rank'][$i]) ? $ranking[$j]['rank'][$i] : 0  ?></td>
                        <?php } ?>
                    
                        <td><?= $ranking[$j]['sum']  ?></td>
                        <td><?= $ranking[$j]['score']  ?></td>
                                              
                      </tr>
                      <?php } ?>

                </tbody>
                <tfoot>

                      <tr >
                        <td>Bobot Borda</td>

                      <?php for ($i=count($ranking); $i >= 1 ; $i--) { ?>
                        <td><?=  $i ?></td>
                    
                      <?php } ?>


                        <td><?= $jumlah_borda  ?></td>
                        <td></td>

                      </tr>

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

      var oTable = $('#atasan1').dataTable({

         "scrollY": 150,
         "info": false,
         "paging": false,
         
           dom: 'Bfrtip',
        buttons: [   {extend : 'excel',title: 'Perkalian Skor Awal dengan Bobot Atasan' }     ]  });

      var oTable = $('#dosen1').dataTable({

         "scrollY": 150,
         "info": false,
         "paging": false,
         
           dom: 'Bfrtip',
        buttons: [   {extend : 'excel',title: 'Perkalian Skor Awal dengan Bobot Dosen' }     ]  });

      var oTable = $('#mahasiswa1').dataTable({

         "scrollY": 150,
         "info": false,
         "paging": false,
         
           dom: 'Bfrtip',
        buttons: [   {extend : 'excel',title: 'Perkalian Skor Awal dengan Bobot Mahasiswa' }     ]  });


      var oTable = $('#atasan2').dataTable({

         "scrollY": 150,
         "info": false,
         "paging": false,
         
           dom: 'Bfrtip',
        buttons: [   {extend : 'excel',title: 'Perkalian Skor Awal dengan Bobot Atasan' }     ]  });

      var oTable = $('#dosen2').dataTable({

         "scrollY": 150,
         "info": false,
         "paging": false,
         
           dom: 'Bfrtip',
        buttons: [   {extend : 'excel',title: 'Perkalian Skor Awal dengan Bobot Dosen' }     ]  });

      var oTable = $('#mahasiswa2').dataTable({

         "scrollY": 150,
         "info": false,
         "paging": false,
         
           dom: 'Bfrtip',
        buttons: [   {extend : 'excel',title: 'Perkalian Skor Awal dengan Bobot Mahasiswa' }     ]  });

       var oTable = $('#borda').dataTable({
        //           "scrollY":        true,
        // "scrollX":        true,
        // "scrollCollapse": true,
        //"paging":         false,
        
         "info": false,
         "paging": false,
         
           dom: 'Bfrtip',
        buttons: [   {extend : 'excel',title: 'Perkalian Skor Awal dengan Bobot Mahasiswa' }     ]  });
    });

  </script>
</body>
</html>