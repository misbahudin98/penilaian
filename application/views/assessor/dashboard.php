    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <div class="row mt">

          <div class="col-lg-12">
                      <div class="row content-panel">
              <div class="col-md-4 profile-text mt mb centered">
                <div class="right-divider hidden-sm hidden-xs">
                <h3><?= $profil[0]['nama']  ?></h3>
                <h6><?= $profil[0]['level']  ?></h6>              
                </div>
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 profile-text">
                <br><br>
                <p>Lahir <?= $profil[0]['tanggal_lahir'] ?> <br>
                  Alamat <?= $profil[0]['alamat'] ?> <br>
                  contact  <?= $profil[0]['hp'] ?> <br>
                </p>
                <br>
                
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 centered">
                <div class="profile-pic">
                <br><br>
                  
                    <a class="btn btn-warning" data-toggle="modal" href='#modal-id'><i class="fa fa-edit"></i>&emsp;Ganti Password</a>
                 <div class="modal fade" id="modal-id">
                   <div class="modal-dialog">
                     <div class="modal-content">
                       <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                         <h4 class="modal-title">Ganti Password</h4>
                       </div>
                         <form method="post" action="<?= base_url('ganti_password')  ?>">
                       <div class="modal-body">
                          <label>isi password baru</label><br>
                           <input type="password" name="password" required>
                       </div>
                       <div class="modal-footer">
                         <button type="button" class="btn btn-default" data-dismiss="modal">tutup</button>
                          <input type="submit" class="btn btn-success">                             
                      </div>
                         </form>
                     </div>
                   </div>
                 </div>
                  
                </div>
              </div>
              <!-- /col-md-4 -->
            </div>
                   <?php if ($skor != 0 && $sesi[0]['aksi'] == 1 ) { ?>
            <div class="row mt">
              <div class="col-lg-12">
                    <div class="panel panel-info">
                    <div class="panel-heading">
                      <h3 class="panel-title">Isi kuesioner</h3>
                    </div>
                    <div class="panel-body">
                      anda memiliki kuesioner yang belum terisi 
                    </div>
                  </div>
              </div>
            </div>
                  <?php } ?>
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
  <script src="<?= base_url();?>assets/js/jquery.min.js"></script>
  <script src="<?= base_url();?>assets/js/bootstrap.min.js"></script>
  <script src="<?= base_url();?>assets/js/jquery-ui-1.9.2.custom.min.js"></script>
  <script src="<?= base_url();?>assets/js/jquery.ui.touch-punch.min.js"></script>
  <script class="include" type="text/javascript" src="<?= base_url();?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
  <script src="<?= base_url();?>assets/js/jquery.scrollTo.min.js"></script>
  <script src="<?= base_url();?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="<?= base_url();?>assets/js/common-scripts.js"></script>
  <!--script for this page-->

</body>
</html>
