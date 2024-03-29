
<!--   <link href="<?= base_url()  ?>assets/css/demo_table.css" rel="stylesheet" /> -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('')  ?>assets/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
<!--   <link rel="stylesheet" href="<?= base_url()  ?>assets/css/DT_bootstrap.css" />
 -->  
    <!--main content start-->
    <section id="main-content">

      <div class="modal fade" id="add">
        <div class="modal-dialog modal-sm">
          <div class="modal-content" style="width: 500px; justify-content: center; ">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Tambah user</h4>
            </div>
            <form method="post"  action="<?= base_url('tambah_user') ?>" class="form-user">
            <div class="modal-body">
              <label class="control-label col-md-3">ID</label>
              
              <input class="form-control form-control-inline input-medium " type="number" minlength="12" name="id" required>
               <br>
              <label class="control-label col-md-3">Password</label>
              
              <input class="form-control form-control-inline input-medium "  type="password" name="password" required>
              <br>
              <label class="control-label col-md-3">Nama</label>
              
              <input class="form-control form-control-inline input-medium " type="text" name="nama" required>
              <br>
              <label class="control-label col-md-3">Tanggal Lahir</label>
              
              <input class="form-control form-control-inline input-medium " type="date" name="tanggal_lahir" required>
              <br>
              <label class="control-label col-md-3">Alamat</label>
              
              <input class="form-control form-control-inline input-medium " type="text" name="alamat" required>
              <br>

              <label class="control-label col-md-3">Nomor HP</label>
              
              <input class="form-control form-control-inline input-medium " type="number" name="hp" required>
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

      <div class="modal fade" id="import">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Import data excel</h4>
            </div>
            <div class="modal-body">
              <form method="post" action="<?= base_url('isi_user')  ?>" enctype="multipart/form-data">
                
                  <input type="file" name="file" class="form-control" id="file" required> 
                      <hr>  
                      <input type="submit"  class="btn btn-primary" value="Import" name="import">

              </form>
              
            </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Data User</h3>

        <?php if(isset($error)){ ?>
        <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Error!</strong> <?= $error  ?> 
                  </div>          
        <?php } else if(isset($sukses)) {?>
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>Sukses!</strong> Data berhasil di import
        </div>
        <?php } else if($this->session->flashdata('admin')) {?>
        <div class="alert alert-warning">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>Admin!</strong>  Tidak bisa dihapus
        </div>
        <?php } else if($this->session->flashdata('duplikat')) {?>
          <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Duplikat!</strong> anda memasukkan value yang sama
          </div>
        <?php } ?>
        <div class="row ">
          <!-- page start-->
          <div class="content-panel" style="margin-left: 15px;margin-right: 15px; ">
            <div class="adv-table" style="margin-left: 15px; margin-right: 15px ;">
            
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <th>No</th>
                  <th>ID</th>
                  <th>Password</th>

                  <th>Nama</th>
                  <th>Tanggal Lahir</th>
                  <th>Alamat</th>
                  <th>Nomor HP</th>
                  <th>Level</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php
                    $no=1;
                   foreach ($user as $value): ?>
                    <tr>
                      <td><?= $no++  ?></td>
                      <td><?= $value->id  ?></td>
                      <td><?= $value->password  ?></td>

                      <td><?= $value->nama  ?></td>
                      <td><?= $value->tanggal_lahir  ?></td>
                      <td><?= $value->alamat  ?></td>
                      <td><?= $value->hp  ?></td>
                      <td><?= $value->level  ?></td>
                      <td>
                        <a class="btn btn-primary" data-toggle="modal" href='#<?= $value->id ?>'>Edit</a>
                        <a href="<?= base_url('hapus_user/'.$value->id.'/'.$value->level) ?>" class="btn btn-danger" 
                          onclick = "if (! confirm('apakah anda yakin ingin menghapus ?')) { return false; }">Delete</a>
                        
                      </td>
                      <div class="modal fade" id="<?= $value->id  ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Edit user</h4>
                              </div>
                              <form action="<?= base_url('ubah_user') ?>" method='POST' name='ubah_user'>
                              <div class="modal-body">
                                  <input class="form-control form-control-inline input-medium " minlength="12" type="hidden" name="id_real" value="<?= $value->id  ?>"  >
                                  <label class="control-label col-md-3">Id</label>

                                  <input class="form-control form-control-inline input-medium " minlength="12" type="number" name="id1" value="<?= $value->id  ?>"  required>
                                   <br>
                                  <label class="control-label col-md-3">Pasword</label>
                                  
                                  <input class="form-control form-control-inline input-medium " type="text" name="password1" value="<?= $value->password  ?>" required>
                                  <br>
                                  <label class="control-label col-md-3">Nama</label>
                                  
                                  <input class="form-control form-control-inline input-medium " type="text" name="nama1" value="<?= $value->nama  ?>" required>
                                  <br>
                                  <label class="control-label col-md-3">Tanggal Lahir</label>
                                  
                                  <input class="form-control form-control-inline input-medium " type="date" name="tanggal_lahir1" value="<?= $value->tanggal_lahir  ?>" required>
                                  <br>
                                  <label class="control-label col-md-3">Alamat</label>
                                  
                                  <input class="form-control form-control-inline input-medium " type="text" name="alamat1" value="<?= $value->alamat  ?>" required>
                                  <br>

                                  <label class="control-label col-md-3">Nomor HP</label>
                                  
                                  <input class="form-control form-control-inline input-medium " type="number" name="hp1" value="<?= $value->hp  ?>" required>
                                  <br>

                                  <label class="control-label col-md-3">Level </label>
                                  
                                  <select class="form-control form-control-inline input-medium " name="level1">
                                    <option value="admin" <?= $value->level == "admin" ?  "selected":  " ";  ?> >Admin</option>
                                    <option  value="atasan" <?= $value->level == "atasan" ?  "selected": " ";  ?> >Atasan</option>
                                    <option value="dosen" <?= $value->level == "dosen" ?  "selected": " ";  ?> >Dosen</option>
                                    <option value="mahasiswa" <?=  $value->level == "mahasiswa" ?  "selected": " ";  ?> >Mahasiswa</option>
                                  </select>                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary add" name="tambah" value="ganti">
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
<!-- <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"></script> -->
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
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [0],
          }],

        "aaSorting": [
            [1, 'asc']
          ],
           dom: 'Bfrtip',
        buttons: [
            {text: 'Tambah User',className: '',
              action: function ( e, dt, node, config ) {
                $('#add').modal('show');
              }
            },
              {text: 'import User',className: '',
              action: function ( e, dt, node, config ) {
                                $('#import').modal('show');
              }
            }
            ,
            {extend : 'excel',title: 'Perkalian Skor Awal dengan Bobot Mahasiswa' }

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

    });

      /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */

  </script>
</body>
</html>