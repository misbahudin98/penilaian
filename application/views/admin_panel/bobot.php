    <!--main content start-->
    <section id="main-content">

      <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i>Perhitungan Bobot</h3>
              <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Perhatian !!!</strong> Bobot dinyatakan konsisten bila 
                <h3>CR <= 0.1</h3>
              </div>
        <div class="row mt">
          <div class="col-sm-4">
                     <!-- page start-->
          <div class="content-panel" style="margin-left: 15px;margin-right: 15px; ">
            <div class="adv-table" style="margin-left: 15px; margin-right: 15px ;">
              <h3>Table Vektor Prioritas </h3>

              <table cellpadding="0" cellspacing="0" border="0" class="display table table-striped table-responsive table-bordered">
                <thead>
                  <th>K1</th>
                  <th>K2</th>
                  <th>K3</th>
                  <?php if (count($awal) == 4): ?>
                  <th>K4</td>
                  <?php endif ?>
                </thead>
                <tbody>
                  <?php foreach ($awal as $key ): ?>
                  <tr>
                    <td><?= $key[0]  ?></td>
                    <td><?= $key[1]  ?></td>
                    <td><?= $key[2]  ?></td>
                  <?php if (count($awal) == 4): ?>
                    <td><?= $key[3]  ?></td>
                  <?php endif ?>
                  </tr>                                            
                  <?php endforeach ?>       
                  <tr>
                    <?php foreach ($jumlah as $key => $value): ?>
                      <td><?= $value ?></td>
                    <?php endforeach ?>
                  </tr>                        
                 
                </tbody>
              </table>
            </div>
          </div>

          </div>
          <div class="col-md-7">
                    <!-- page start-->
          <div class="content-panel" style="margin-left: 15px;margin-right: 15px; ">
            <div class="adv-table" style="margin-left: 15px; margin-right: 15px ;">
              <h3>Table Sintesis</h3>
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-striped table-responsive table-bordered">
                <thead>
                  <th></th>
                  <th>K1</th>
                  <th>K2</th>
                  <th>K3</th>
                  <?php 

                  if (count($awal) == 4): ?>
                  <th>K4</td>
                  <?php endif ?>
                  <th>Eigen / bobot</th>
                </thead>
                <tbody>
                  <?php 

                  for ($i=0; $i < count($awal) ; $i++) { ?>
                  <tr>
                    <td>K<?= $i+1 ?></td>
                    <td><?= $pembagian[0][$i]  ;?></td>
                    <td><?= $pembagian[1][$i]  ;?></td>
                    <td><?= $pembagian[2][$i]  ;?></td>
                  <?php if (count($awal) == 4): ?>
                    <td><?= $pembagian[3][$i]  ?></td>
                  <?php endif ?>  
                    
                    <td><?= $pembagian[4][$i]  ?></td>
                     
                  </tr>                                            
                  <?php } ?>

                </tbody>
              </table>
            </div>
          </div>            
          </div>
        </div>
        <div class="row mt">
          <!-- page start-->
        <div class="col-md-6">
          <div class="content-panel" style="margin-left: 15px;margin-right: 15px; ">
            <div class="adv-table" style="margin-left: 15px; margin-right: 15px ;">
              <h3>Table Rasio Konsistensi</h3>
                              <table  class="display table table-striped table-responsive table-bordered">
                <thead>
                  <th>ektor Priotitas X Eigen</th>
                  <th>Bobot Prioritas</th>
                  
                </thead>
                <tbody>
                  <?php for ($i=0; $i < count($awal); $i++) {  ?>
                    <tr>
                      <td><?= $kali[$i] ?></td>
                      <td><?= $prioritas[$i] ?></td>
                    </tr>
                  <?php } ?>
                                 
                </tbody>
              </table>

              </div>
          </div>

        </div>
        <div class="col-md-6">
          <div class="content-panel" style="margin-left: 15px;margin-right: 15px; ">
            <div class="adv-table" style="margin-left: 15px; margin-right: 15px ;">
              
              <h3>Table Rasio Konsistensi</h3>
                <table  class="display table table-striped table-responsive table-bordered">
                <thead>
                  <th>-----  </th>
                  <th>----- </th>

                </thead>
                <tbody>
                    <tr>
                      <td>入 Max</td>
                      <td><?= $max ?></td>
                    </tr>
                    <tr>
                      <td>CI</td>
                      <td><?= $ci ?></td>
                    </tr>
                    <tr>
                      <td>CR</td>
                      <td><?= $cr ?></td>
                    </tr>
                </tbody>
              </table>

              </div>
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
  
</body>
</html>