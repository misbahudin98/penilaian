
<!--   <link href="<?= base_url()  ?>assets/css/demo_table.css" rel="stylesheet" /> -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('')  ?>assets/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
<!--   <link rel="stylesheet" href="<?= base_url()  ?>assets/css/DT_bootstrap.css" />
 -->  
    <!--main content start-->
    <section id="main-content">

      <div class="modal fade" id="add">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Tambah user</h4>
            </div>
            <form method="post"  action="<?= base_url('tambah_user') ?>" class="form-user">
            <div class="modal-body">
              <label class="control-label col-md-3">Id</label>
              
              <input class="form-control form-control-inline input-medium " type="number" minlength="12" name="id" required>
               <br>
              <label class="control-label col-md-3">Pasword</label>
              
              <input class="form-control form-control-inline input-medium " type="text" name="password" required>
              <br>
              <label class="control-label col-md-3">Nama</label>
              
              <input class="form-control form-control-inline input-medium " type="text" name="nama" required>
              <br>
              <label class="control-label col-md-3">Level </label>
              
              <select class="form-control form-control-inline input-medium " name="level" required>
                <option value="admin">Admin</option>
                <option value="atasan">Atasan</option>
                <option value="dosen">Dosen</option>
                <option value="mahasiswa">Mahasiswa</option>
              </select>

            </div>
            <div class="modal-footer">

              <button type="button" class="btn btn-default keluar" data-dismiss="modal">keluar</button>
              <input type="submit" class="btn btn-primary add" name="tambah" value="tambah">
            </div>
            </form>
          </div>
        </div>
      </div>
      <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i>Tabel Penlilaian</h3>
          <div class="alert alert-danger">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <strong>Perhatian !</strong> Nilai Terbesar = 5
                            </div>                  
        <div class="row ">
          <!-- page start-->
          <div class="content-panel" style="margin-left: 15px;margin-right: 15px; ">
            <div class="adv-table" style="margin-left: 15px; margin-right: 15px ;">
            
              <table cellpadding="0" cellspacing="0" border="0" class="display table  table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                  <th rowspan="2" style="vertical-align:middle">No</th>
                  <th rowspan="2" style="vertical-align:middle">Kuesioner</th>

                  <th colspan="5"><center>Penilaian</th>
                  </tr>
                  <tr>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                  </tr>
                </thead>
                <tbody>
                  <form method="post" action="<?= base_url('simpan_nilai')  ?>" >
                  <?php
                    $no=1;
                    // $a = '';
                   foreach ($kue as $value): ?>
                    <tr>
                      <td><?= $no++  ?></td>
                      <td><?= $value['kuesioner']  ?></td>

                      <td>

                        <input type="radio" name="<?= $value['id'] ?>" value="1" required>
                        
                      </td>
                      <td>
                        <input type="radio" name="<?= $value['id'] ?>" value="2" >
                      </td>
                      <td>
                        <input type="radio" name="<?= $value['id'] ?>" value="3">
                      </td>
                      <td>
                        <input type="radio" name="<?= $value['id'] ?>" value="4">
                      </td>
                      <td>
                        <input type="radio" name="<?= $value['id'] ?>" value="5">
                        </td>
                      

                    <input type="text" name="id" value="<?= $this->uri->segment(2)  ?>" hidden>
                    </tr>
                  <?php

                   // if ($no == 2 ) {
                   //     $a = $value['id'];
                   //  } elseif ($no > 2) {
                   //     $a = $a.','.$value['id'];
                   //  } 
                     
                   endforeach ?>
                    <tr><td colspan="3"><center><input type="submit" name="" value="Simpan" class="btn btn-success"></td></tr>
                  </form>
                </tbody>
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
  <script type="text/javascript">
    /* Formating function for row details */

    $(document).ready(function() {
      /*
       * Initialse DataTables, with no sorting on the 'details' column
       */
      var oTable = $('#hidden-table-info').dataTable({
        // 'fnDrawCallback': function (oSettings) {
        //   $('.dataTables_length').each(function () {
        //     $(this).append('&emsp;<button class="btn-info" data-toggle="modal" href="#add" type="button">Tambah User</button>');
        //   });
        // },
          "scrollY": 366,

         // "scrollX": 350s,
         "info": false,
         "paging": false,
          
      });

// $('#hidden-table-info').find('tbody').append("<tr><td><value1></td><td><value1></td></tr>");
// $('#hidden-table-info').DataTable().draw();

      // $(".add").click(function(){
      //   var data = $('.form-user').serialize();

      //   $.ajax({
      //     type: 'POST',
      //      url:  $('.form-user').attr('action'),
      //     data: data,
      //     // datatype: "json",
      //     success: function(response) {
      //      $('#add').modal('hide');
      //       // oTable.rows.add(response).draw();
      //     }

      //   });
      // });

    });

      /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */

  </script>
</body>
</html>