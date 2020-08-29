  <style type="text/css">
    * {
  box-sizing: border-box;
}

.slider {
  -webkit-appearance: none;
  appearance: none;
  width: 100%;
  height: 25px;
  background: #D3D3D3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  background: #FF0000;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  background: #FF0000;
  cursor: pointer;
}

.sliderticks {
  display: flex;
  justify-content: space-between;
  padding: 0 10px;
}

.sliderticks p {
  position: relative;
  display: flex;
  justify-content: center;
  text-align: center;
  width: 1px;
  background: #D3D3D3;
  height: 10px;
  line-height: 40px;
  margin: 0 0 20px 0;
}


  </style>
    <!--main content start-->
    <section id="main-content">

      <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i>Tingkat Kepentingan</h3>
        
          <?php //var_dump($bobot) or die;
          if ($this->session->flashdata('sukses') != null): ?>
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <strong>Sukses</strong> Mengganti nilai bobot 
          </div>
          <?php endif           ?>

          <?php if ($this->session->flashdata('null') == 1): ?>
            <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <strong>Perintah Ditolak !!</strong> Anda melakukan update data dengan value kosong
            </div>
          <?php endif ?>
              <div class="col-md-1">
               <br><br>
                  <h4>Kepribadian</h4>
                <br><br>  
                  <h4>Kepribadian</h4>
                <br> <br>
              <?php if ($this->uri->segment(2) == 'rekan' or $this->uri->segment(2) == 'mahasiswa') { ?>
                  <h4>Pendagogik</h4>
                <br><br>  
              <?php } elseif ($this->uri->segment(2) == 'atasan') { ?>
                  <h4>Profesional</h4>
                  <br><br>
              <?php } ?>         
               <?php if ($this->uri->segment(2) == 'rekan') { ?>
                 
                  <h4>Kepribadian</h4>
                 <br> <br>
                  <h4>Pendagogik</h4>

                 <br> <br>
                  <h4>Sosial</h4>
               <?php } ?>
              </div>
                     <!-- page start-->
              <div class="col-md-9">
              <form id="sliderData" action="<?= base_url('ubah_bobot/'.$this->uri->segment(2))  ?>" method="post">
                <div class="range" style="padding: 40px;">
                
                  <input type="range" name="0" min="0" max="16" value="<?= $bobot['0'] ?>"  class="slider">
                  <div class="sliderticks">
                    <p>9</p>
                    <p>8</p>
                    <p>7</p>
                    <p>6</p>
                    <p>5</p>
                    <p>4</p>
                    <p>3</p>
                    <p>2</p>
                    <p>1</p>
                    <p>0.5</p>                    
                    <p>0.333</p>
                    <p>0.25</p>
                    <p>0.2</p>
                    <p>0.167</p>
                    <p>0.143</p>
                    <p>0.125</p>
                    <p>0.111</p>
                  </div>
                  <br>
                  <input type="range" name="1" min="0" max="16" value="<?= $bobot['1'] ?>" class="slider">
                  <div class="sliderticks">
                   <p>9</p>
                    <p>8</p>
                    <p>7</p>
                    <p>6</p>
                    <p>5</p>
                    <p>4</p>
                    <p>3</p>
                    <p>2</p>
                    <p>1</p>
                    <p>0.5</p>                    
                    <p>0.333</p>
                    <p>0.25</p>
                    <p>0.2</p>
                    <p>0.167</p>
                    <p>0.143</p>
                    <p>0.125</p>
                    <p>0.111</p>
                  </div>
                  <br>
                  <input type="range" name="3" min="0" max="16" value="<?= $bobot['3'] ?>" class="slider">
                  <div class="sliderticks">
                   <p>9</p>
                    <p>8</p>
                    <p>7</p>
                    <p>6</p>
                    <p>5</p>
                    <p>4</p>
                    <p>3</p>
                    <p>2</p>
                    <p>1</p>
                    <p>0.5</p>                    
                    <p>0.333</p>
                    <p>0.25</p>
                    <p>0.2</p>
                    <p>0.167</p>
                    <p>0.143</p>
                    <p>0.125</p>
                    <p>0.111</p>
                  </div>
                  <?php if ($this->uri->segment(2) == 'rekan'): ?>
                    <br>
                  <input type="range" name="2" min="0" max="16" value="<?= $bobot['2'] ?>" class="slider">
                  <div class="sliderticks">
                   <p>9</p>
                    <p>8</p>
                    <p>7</p>
                    <p>6</p>
                    <p>5</p>
                    <p>4</p>
                    <p>3</p>
                    <p>2</p>
                    <p>1</p>
                    <p>0.5</p>                    
                    <p>0.333</p>
                    <p>0.25</p>
                    <p>0.2</p>
                    <p>0.167</p>
                    <p>0.143</p>
                    <p>0.125</p>
                    <p>0.111</p>
                  </div>
                  <br>
                  <input type="range" name="4" min="0" max="16" value="<?= $bobot['4'] ?>" class="slider">
                  <div class="sliderticks">
                   <p>9</p>
                    <p>8</p>
                    <p>7</p>
                    <p>6</p>
                    <p>5</p>
                    <p>4</p>
                    <p>3</p>
                    <p>2</p>
                    <p>1</p>
                    <p>0.5</p>                    
                    <p>0.333</p>
                    <p>0.25</p>
                    <p>0.2</p>
                    <p>0.167</p>
                    <p>0.143</p>
                    <p>0.125</p>
                    <p>0.111</p>
                  </div>
                  <br>
                  <input type="range" name="5" min="0" max="16" value="<?= $bobot['5'] ?>" class="slider">
                  <div class="sliderticks">
                   <p>9</p>
                    <p>8</p>
                    <p>7</p>
                    <p>6</p>
                    <p>5</p>
                    <p>4</p>
                    <p>3</p>
                    <p>2</p>
                    <p>1</p>
                    <p>0.5</p>                    
                    <p>0.333</p>
                    <p>0.25</p>
                    <p>0.2</p>
                    <p>0.167</p>
                    <p>0.143</p>
                    <p>0.125</p>
                    <p>0.111</p>
                  </div>

                  <?php endif ?>

                  <br> 
                  <input onclick = "if (! confirm('apakah anda yakin ingin mengganti bobot ?')) { return false; }" class="btn btn-success" type="submit" value="Simpan Perubahan" >
                  &emsp;
                  <a href="<?= base_url('perhitungan/'.$this->uri->segment(2))  ?>" class="btn btn-danger">Perhitungan AHP</a> 
                </div>
              </form>

              </div>
              <div class="col-md-2">
               <br><br>
              <?php if ($this->uri->segment(2) == 'rekan' or $this->uri->segment(2) == 'mahasiswa') { ?>
                  <h4>Pendagogik</h4>
                <br><br>  
              <?php } elseif ($this->uri->segment(2) == 'atasan') { ?>
                  <h4>Profesional</h4>
                  <br><br>
              <?php } ?>                
                  <h4>Sosial</h4>
                <br> <br>
                  <h4>Sosial</h4>
               <?php if ($this->uri->segment(2) == 'rekan') { ?>
                 <br> <br>
                  <h4>Profesional</h4>
                 <br> <br>
                  <h4>Profesional</h4>
                 <br> <br>
                  <h4>Profesional</h4>

               <?php } ?>
              </div>
            

`
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

</body>
</html>