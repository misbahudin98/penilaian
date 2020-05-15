
<!--   <link href="<?= base_url()  ?>assets/css/demo_table.css" rel="stylesheet" /> -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('')  ?>assets/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url(' ')  ?> assets/css/buttons.dataTables.min.css">
<!--   <link rel="stylesheet" href="<?= base_url()  ?>assets/css/DT_bootstrap.css" />
 -->  
    <!--main content start-->
    <?php $this->session->set_flashdata( [ 'type' => $this->uri->segment(2) ] );  ?>
    <section id="main-content">

      <section class="wrapper site-min-height">
      <div class="modal fade" id="add">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Tambah kuesioner</h4>
            </div>
            <form method="post" name="add" action="<?= base_url('tambah_que') ?>" class="form-user">
            <div class="modal-body">
              
              <label class="control-label col-md-3">kuesioner</label>
                <textarea class="form-control form-control-inline input-medium " name="kuesioner"></textarea>

              <br>
             <?php if($this->uri->segment(2) == 'mahasiswa'){ ?>
              <label class="control-label col-md-3">Kriteria</label>
                <select class="form-control form-control-inline input-medium " name="kriteria" required>
                  <option value="1">Kepribadian</option>
                  <option value="2">Pendagogik</option>
                  <option value="3">Sosial</option>
                </select>
             <?php } else if($this->uri->segment(2) == 'rekan'){?>
                <label class="control-label col-md-3">Kriteria</label>
                <select class="form-control form-control-inline input-medium " name="kriteria" required>
                  <option value="4">Kepribadian</option>
                  <option value="5">Pendagogik</option>
                  <option value="6">Profesional</option>
                  <option value="7">Sosial</option>
                </select>
            <?php } ?>
 
            </div>
            <div class="modal-footer">

              <button type="button" class="btn btn-default keluar" data-dismiss="modal">keluar</button>
              <input type="submit" class="btn btn-primary add" name="tambah" value="tambah">
            </div>
            </form>
          </div>
        </div>
      </div>
        <h3><i class="fa fa-angle-right"></i>Kusioner <?= ucfirst($this->uri->segment(2))  ?></h3>
        <div class="row mt">
          <!-- page start-->
          <div class="content-panel" style="margin-left: 15px;margin-right: 15px; ">
            <div class="adv-table" style="margin-left: 15px; margin-right: 15px ;">
            
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="kriteria">
                <thead>
                  <th>No</th>
                  <th>Kuesioner</th>
                  <?php  if($this->uri->segment(2) != 'atasan') {?>
                  <th>Kriteria</th>
                  <?php } ?>
                  <th>Aksi</th>
                </thead>
                <tbody>
                  <?php
                    $no =1;
                   foreach ($que as $value): ?>
                    <tr>
                      <td><?= $no++  ?></td>
                      <td><?= $value->kuesioner  ?></td>
                  <?php if($this->uri->segment(2) != 'atasan') {?>
                      <td><?= $value->kriteria ?></td>
                  <?php } ?>
                      <td>
                        <a class="btn btn-primary" data-toggle="modal" href='#<?= $value->id ?>'>Edit</a>
                        <a href="<?= base_url('hapus_que/'.$value->id) ?>" class="btn btn-danger" 
                          onclick = "if (! confirm('apakah anda yakin ingin menghapus ?')) { return false; }">Delete</a>
                        
                      </td>
                      <div class="modal fade" id="<?= $value->id  ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Edit user</h4>
                              </div>
                              <form method="post" action="<?= base_url('ubah_que') ?>">
                              <div class="modal-body">
                                  <label class="control-label col-md-3">Kuesioner</label>

                                  <input class="form-control form-control-inline input-medium "  type="hidden" name="id" value="<?= $value->id  ?>"  >
                                  <textarea class="form-control form-control-inline input-medium " name="kuesioner"><?= $value->kuesioner  ?></textarea>

                                   <br>
                                   <?php if($this->uri->segment(2) == 'mahasiswa'){ ?>
                                    <label class="control-label col-md-3">Kriteria</label>
                                      <select class="form-control form-control-inline input-medium " name="kriteria" required>
                                        <option value="1" <?= $value->kriteria == 'kepribadian' ? 'selected' :'';  ?>
                                        >Kepribadian</option>
                                        <option value="2" <?= $value->kriteria == 'pendagogik' ? 'selected' :'';  ?>
                                        >Pendagogik</option>
                                        <option value="3"<?= $value->kriteria == 'sosial' ? 'selected' :'';  ?>
                                        >Sosial</option>
                                      </select>
                                   <?php } else if($this->uri->segment(2) == 'rekan'){?>
                                      <label class="control-label col-md-3">Kriteria</label>
                                      <select class="form-control form-control-inline input-medium " name="kriteria" required>
                                        <option value="4"  <?= $value->kriteria == 'kepribadian' ? 'selected' :'';  ?>
                                        >Kepribadian</option>
                                        <option value="5" <?= $value->kriteria == 'pendagogik' ? 'selected' :'';  ?>
                                        >Pendagogik</option>
                                          <option value="6" <?= $value->kriteria == 'profesional' ? 'selected' :'';  ?>
                                          >Profesional</option>
                                        <option value="7" <?= $value->kriteria == 'sosial' ? 'selected' :'';  ?>
                                        >Sosial</option>
                                      </select>
                                  <?php } ?>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary add" name="tambah" value="tambah1">
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>

          </div>

        </div>

      </section>
      <!-- /wrapper -->
      
  
      <!-- /wrapper -->
    </section>
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
      var oTable = $('#kriteria').dataTable({
        // 'fnDrawCallback': function (oSettings) {
        //   $('.dataTables_length').each(function () {
        //     $(this).append('&emsp;<button class="btn-info" data-toggle="modal" href="#add" type="button">Tambah User</button>');
        //   });
        // },
          "scrollY": 400,

         // "scrollX": 350s,
         "info": false,
         "paging": false,
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [0],
          }],

        "aaSorting": [
            [1, 'asc']
          ],
           dom: 'Bfrtip',
        buttons: [
            {text: 'Tambah ',className: 'btn btn-info',
              action: function ( e, dt, node, config ) {
                $('#add').modal('show');
              }
            }
        ]  
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
      var oTable = $('#kuesioner').dataTable({

          "scrollY": 210,

         // "scrollX": 350s,
         "info": false,
         "paging": false,
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [0],
          }],

        "aaSorting": [
            [1, 'asc']
          ],
           dom: 'Bfrtip',
        buttons: [
            {text: 'Tambah Kuesioner',className: 'btn btn-info',
              action: function ( e, dt, node, config ) {
                $('#add1').modal('show');
              }
            }
        ]  
      });

    });

      /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */

  </script>
</body>
</html>