
<!--   <link href="<?= base_url()  ?>assets/css/demo_table.css" rel="stylesheet" /> -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('')  ?>assets/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('')  ?>assets/css/buttons.dataTables.min.css">
<style type="text/css">
 
select {
    display: none !important;
}

.dropdown-select {
    background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.25) 0%, rgba(255, 255, 255, 0) 100%);
    background-repeat: repeat-x;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#40FFFFFF', endColorstr='#00FFFFFF', GradientType=0);
    background-color: #fff;
    border-radius: 6px;
    border: solid 1px #eee;
    box-shadow: 0px 2px 5px 0px rgba(155, 155, 155, 0.5);
    box-sizing: border-box;
    cursor: pointer;
    display: block;
    float: left;
    font-size: 14px;
    font-weight: normal;
    height: 42px;
    line-height: 40px;
    outline: none;
    padding-left: 18px;
    padding-right: 30px;
    position: relative;
    text-align: left !important;
    transition: all 0.2s ease-in-out;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    white-space: nowrap;
    width: auto;

}

.dropdown-select:focus {
    background-color: #fff;
}

.dropdown-select:hover {
    background-color: #fff;
}

.dropdown-select:active,
.dropdown-select.open {
    background-color: #fff !important;
    border-color: #bbb;
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05) inset;
}

.dropdown-select:after {
    height: 0;
    width: 0;
    border-left: 4px solid transparent;
    border-right: 4px solid transparent;
    border-top: 4px solid #777;
    -webkit-transform: origin(50% 20%);
    transform: origin(50% 20%);
    transition: all 0.125s ease-in-out;
    content: '';
    display: block;
    margin-top: -2px;
    pointer-events: none;
    position: absolute;
    right: 10px;
    top: 50%;
}

.dropdown-select.open:after {
    -webkit-transform: rotate(-180deg);
    transform: rotate(-180deg);
}

.dropdown-select.open .list {
    -webkit-transform: scale(1);
    transform: scale(1);
    opacity: 1;
    pointer-events: auto;
}

.dropdown-select.open .option {
    cursor: pointer;
}

.dropdown-select.wide {
    width: 100%;
}

.dropdown-select.wide .list {
    left: 0 !important;
    right: 0 !important;
}

.dropdown-select .list {
    box-sizing: border-box;
    transition: all 0.15s cubic-bezier(0.25, 0, 0.25, 1.75), opacity 0.1s linear;
    -webkit-transform: scale(0.75);
    transform: scale(0.75);
    -webkit-transform-origin: 50% 0;
    transform-origin: 50% 0;
    box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.09);
    background-color: #fff;
    border-radius: 6px;
    margin-top: 4px;
    padding: 3px 0;
    opacity: 0;
    overflow: hidden;
    pointer-events: none;
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 999;
    max-height: 250px;
    overflow: auto;
    border: 1px solid #ddd;
}

.dropdown-select .list:hover .option:not(:hover) {
    background-color: transparent !important;
}
.dropdown-select .dd-search{
  overflow:hidden;
  display:flex;
  align-items:center;
  justify-content:center;
  margin:0.5rem;
}

.dropdown-select .dd-searchbox{
  width:90%;
  padding:0.5rem;
  border:1px solid #999;
  border-color:#999;
  border-radius:4px;
  outline:none;
}
.dropdown-select .dd-searchbox:focus{
  border-color:#12CBC4;
}

.dropdown-select .list ul {
    padding: 0;
}

.dropdown-select .option {
    cursor: default;
    font-weight: 400;
    line-height: 40px;
    outline: none;
    padding-left: 18px;
    padding-right: 29px;
    text-align: left;
    transition: all 0.2s;
    list-style: none;
}

.dropdown-select .option:hover,
.dropdown-select .option:focus {
    background-color: #f6f6f6 !important;
}

.dropdown-select .option.selected {
    font-weight: 600;
    color: #12cbc4;
}

.dropdown-select .option.selected:focus {
    background: #f6f6f6;
}

.dropdown-select a {
    color: #aaa;
    text-decoration: none;
    transition: all 0.2s ease-in-out;
}

.dropdown-select a:hover {
    color: #666;
}

</style>

    <!--main content start-->

    <section id="main-content">

      <section class="wrapper site-min-height">
      <div class="modal fade" id="add">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Tambah Matakuliah</h4>
            </div>
            <form method="post" name="add" action="<?= base_url('tambah_matakuliah') ?>" class="form-user">
            <div class="modal-body">
              
              <label class="control-label ">Nama Matakuliah</label>
                <input type="text" class="form-control form-control-inline input-medium" name="nama">
            </div>
            <div class="modal-footer">

              <button type="button" class="btn btn-default keluar" data-dismiss="modal">keluar</button>
              <input type="submit" class="btn btn-primary add" name="tambah" value="tambah">
            </div>
            </form>
          </div>
        </div>
      </div>
       <div class="modal fade" id="add1">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Tambah Penilai</h4>

            </div>
            <form method="post" name="add" action="<?= base_url('tambah_skor') ?>" class="form-user">
            <div class="modal-body">
              <div class="alert alert-warning">Perhatian !!! Untuk Atasan Biarkan matakuliah dengan null</div>
              <label class="control-label ">Nama Dosen yang akan dinilai</label>
                <select class="form-control form-control-inline input-medium" name="dosen">
                  <?php foreach ($dosen as $key ): ?>
                    <option value="<?= $key->id  ?>"><?= $key->nama  ?></option>
                  <?php endforeach ?>

                </select>   <br><br><br><br>     
              <label class="control-label ">Nama Penilai</label>
                <select class="form-control form-control-inline input-medium" name="penilai">

                  <?php foreach ($penilai as $key ): ?>
                    <option value="<?= $key->id  ?>"><?= $key->nama.' = '.$key->level  ?></option>
                  <?php endforeach ?>
                </select>
                <br><br><br><br>
              <label class="control-label ">Matakuliah</label>
                <select class="form-control form-control-inline input-medium" name="matakuliah">

                  <option value="0"  selected>Null</option>
                    <?php foreach ($matakuliah as $key ): ?>
                    <option value="<?= $key->id  ?>"><?= $key->nama  ?></option>
                  <?php endforeach ?>
                </select>
            </div>
            <div class="modal-footer">
            <br>
              <button type="button" class="btn btn-default keluar" data-dismiss="modal">keluar</button>
              <input type="submit" class="btn btn-primary add" name="tambah" value="tambah">
            </div>
            </form>
          </div>
        </div>
      </div>

        <h3><i class="fa fa-angle-right"></i>Data Matakuliah</h3>
    
        <div class="row mt">
          <!-- page start-->
          <div class="content-panel" style="margin-left: 15px;margin-right: 15px; ">
            <div class="adv-table" style="margin-left: 15px; margin-right: 15px ;">
            
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="kriteria">
                <thead>
                  <th>No</th>
                  <th>Matakuliah</th>
                  <th>Aksi</th>
                </thead>
                <tbody>
                  <?php
                    $no =1;
                   foreach ($matakuliah as $value): ?>
                    <tr>
                      <td><?= $no++  ?></td>
                      <td><?= $value->nama  ?></td>
                      <td>
                        <a class="btn btn-primary" data-toggle="modal" href='#<?= $value->id ?>'>Edit</a>
                        <a href="<?= base_url('hapus_matakuliah/'.$value->id) ?>" class="btn btn-danger" 
                          onclick = "if (! confirm('apakah anda yakin ingin menghapus ?')) { return false; }">Delete</a>
                        
                      </td>
                      <div class="modal fade" id="<?= $value->id  ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Edit user</h4>
                              </div>
                              <form method="post" action="<?= base_url('ubah_matakuliah') ?>">
                              <div class="modal-body">
                                  <label class="control-label col-md-3">Nama Matakuliah</label>

                                  <input class="form-control form-control-inline input-medium "  type="hidden" name="id" value="<?= $value->id  ?>"  >
                                  <input type="text" class="form-control form-control-inline input-medium" name="nama" value="<?= $value->nama ?>">                              
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
          <div id="results"></div>
        <h3><i class="fa fa-angle-right"></i>Data Penilai Dosen </h3>
        <div class="row mt">
          <!-- page start-->
          <div class="content-panel" style="margin-left: 15px;margin-right: 15px; ">
            <div class="adv-table" style="margin-left: 15px; margin-right: 15px ;">
            
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="skor">
                <thead>
                  <th>No</th>
                  <th>Dosen</th>
                  <th>Matakuliah</th>
                  <th>Penilai</th>
                  <th>Sebagai</th>
                  <th>Skor</th>
                  <th>Aksi</th>
                </thead>
                <tbody>
                  <?php
                    $no =1;
                   foreach ($skor as $value): ?>
                    <tr>
                      <td><?= $no++  ?></td>
                      <td><?= $value->dosen  ?></td>
                      <td><?= $value->nama  ?></td>
                      <td><?= $value->penilai  ?></td>
                      <td><?= $value->level  ?></td>
                      <td><?= $value->skor  ?></td>
                      <td>

                        <a href="<?= base_url('hapus_skor/'.$value->id) ?>" class="btn btn-danger" 
                          onclick = "if (! confirm('apakah anda yakin ingin menghapus ?')) { return false; }">Delete</a>
                        
                      </td>
           
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
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"> </script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"> </script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"> </script>
 --><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"> </script>  
  <script type="text/javascript">


    $(document).ready(function() {

      var oTable = $('#kriteria').dataTable({
          "scrollY": 210,
          // "scrollX": 210,

         "info": false,
         "paging": false,
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [0],
          }],

        "aaSorting": [
            [0, 'asc']
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

      var Table = $('#skor').dataTable({
          "scrollY": 400,

         "info": false,
         "paging": false,
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [0],
          }],

        "aaSorting": [
            [0, 'asc']
          ],
           dom: 'Bfrtip',
        buttons: [ 'excel',
            {text: 'Tambah ',className: 'btn btn-info',
              action: function ( e, dt, node, config ) {
                $('#add1').modal('show');
              }
            }
        ]  
      });

function create_custom_dropdowns() {
    $('select').each(function (i, select) {
        if (!$(this).next().hasClass('dropdown-select')) {
            $(this).after('<div class="dropdown-select wide ' + ($(this).attr('class') || '') + '" tabindex="0"><span class="current"></span><div class="list"><ul></ul></div></div>');
            var dropdown = $(this).next();
            var options = $(select).find('option');
            var selected = $(this).find('option:selected');
            dropdown.find('.current').html(selected.data('display-text') || selected.text());
            options.each(function (j, o) {
                var display = $(o).data('display-text') || '';
                dropdown.find('ul').append('<li class="option ' + ($(o).is(':selected') ? 'selected' : '') + '" data-value="' + $(o).val() + '" data-display-text="' + display + '">' + $(o).text() + '</li>');
            });
        }
    });

    $('.dropdown-select ul').before('<div class="dd-search"><input id="txtSearchValue" autocomplete="off" onkeyup="filter()" class="dd-searchbox" type="text"></div>');
}

// Event listeners

// Open/close
$(document).on('click', '.dropdown-select', function (event) {
    if($(event.target).hasClass('dd-searchbox')){
        return;
    }
    $('.dropdown-select').not($(this)).removeClass('open');
    $(this).toggleClass('open');
    if ($(this).hasClass('open')) {
        $(this).find('.option').attr('tabindex', 0);
        $(this).find('.selected').focus();
    } else {
        $(this).find('.option').removeAttr('tabindex');
        $(this).focus();
    }
});

// Close when clicking outside
$(document).on('click', function (event) {
    if ($(event.target).closest('.dropdown-select').length === 0) {
        $('.dropdown-select').removeClass('open');
        $('.dropdown-select .option').removeAttr('tabindex');
    }
    event.stopPropagation();
});

function filter(){
    var valThis = $('#txtSearchValue').val();
    $('.dropdown-select ul > li').each(function(){
     var text = $(this).text();
        (text.toLowerCase().indexOf(valThis.toLowerCase()) > -1) ? $(this).show() : $(this).hide();         
   });
};
// Search

// Option click
$(document).on('click', '.dropdown-select .option', function (event) {
    $(this).closest('.list').find('.selected').removeClass('selected');
    $(this).addClass('selected');
    var text = $(this).data('display-text') || $(this).text();
    $(this).closest('.dropdown-select').find('.current').text(text);
    $(this).closest('.dropdown-select').prev('select').val($(this).data('value')).trigger('change');
});

// Keyboard events
$(document).on('keydown', '.dropdown-select', function (event) {
    var focused_option = $($(this).find('.list .option:focus')[0] || $(this).find('.list .option.selected')[0]);
    // Space or Enter
    //if (event.keyCode == 32 || event.keyCode == 13) {
    if (event.keyCode == 13) {
        if ($(this).hasClass('open')) {
            focused_option.trigger('click');
        } else {
            $(this).trigger('click');
        }
        return false;
        // Down
    } else if (event.keyCode == 40) {
        if (!$(this).hasClass('open')) {
            $(this).trigger('click');
        } else {
            focused_option.next().focus();
        }
        return false;
        // Up
    } else if (event.keyCode == 38) {
        if (!$(this).hasClass('open')) {
            $(this).trigger('click');
        } else {
            var focused_option = $($(this).find('.list .option:focus')[0] || $(this).find('.list .option.selected')[0]);
            focused_option.prev().focus();
        }
        return false;
        // Esc
    } else if (event.keyCode == 27) {
        if ($(this).hasClass('open')) {
            $(this).trigger('click');
        }
        return false;
    }
});

$(document).ready(function () {
    create_custom_dropdowns();
});

});


  </script>
</body>
</html>