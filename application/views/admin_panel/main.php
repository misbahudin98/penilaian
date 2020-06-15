    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
             <div class="row">
          <div class="col-lg-9 main-chart">
            <!--CUSTOM CHART START -->
               <!--custom chart end-->
            <div class="row mt">
              <!-- SERVER STATUS PANELS -->
                  <!-- /col-md-4 -->
              
                <!-- REVENUE PANEL -->
                <div class="green-panel pn" style="margin-left: 200px;margin-right: 200px; ">
                  <div class="green-header">
                    <h5>Sesi Kuesioner</h5>
                  </div>
                  <p class="mt"><h5>Sesi Sedang <b><?= $buka[0]['aksi'] == 1 ? 'dibuka' : 'ditutup' ?></b></h5>
                    <?php if ($buka[0]['aksi'] == 1) { ?>
                      <a class="btn btn-danger" href="<?= base_url('sesi/0') ?>">Tutup Sesi</a>  
                   <?php }else{ ?>
                      <a class="btn btn-success" href="<?= base_url('sesi/1')  ?>">Buka Sesi</a>
                   <?php } ?>
                </div>
              
              <!-- /col-md-4 -->
            </div>
            <!-- /row -->

            <!-- /row -->
          </div>
          <!-- /col-lg-9 END SECTION MIDDLE -->
          <!-- **********************************************************************************************************************************************************
              RIGHT SIDEBAR CONTENT
              *********************************************************************************************************************************************************** -->
          <div class="col-lg-3 ds">
            <!--COMPLETED ACTIONS DONUTS CHART-->
            
            <!--new earning end-->
            <!-- RECENT ACTIVITIES SECTION -->
            <h4 class="centered mt">Report</h4>
            <!-- First Activity -->
            <?php foreach ($skor as $key ): ?>
            <div class="desc">
              <div class="thumb">
                <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
              </div>
              <div class="details">
                <p>
                  <muted>Skor Kosong</muted>
                  <br/>
                  <a href="#"><?= $key['penilai']  ?></a> Belum Mengisi skor Dosen bernama <?= $key['objek']   ?>.<br/>
                </p>
              </div>
            </div>
            <?php endforeach ?>
            <!-- Second Activity -->
      
          </div>
          <!-- /col-lg-3 -->
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
