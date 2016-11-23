 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <ul class="nav navbar-left panel_toolbox">
                      <li><a href="javascript:history.go(-1)" class="btn btn-danger fa fa-arrow-left">Kembali</a></li>
                    </ul>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <?php echo form_open('barang/post',['class'=>'form-horizontal form-label-left'], 'novalidate')?>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Barang <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nama_barang" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1"  name="nama_barang"  required="required" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Kategori <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="kategori" class="form-control">
                          <?php
                                   foreach ($record->result() as $r) {
                                      echo "<option value='$r->kategori_id'>$r->nama_kategori</option>";
                                   }
                          ?>
                        </select>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Barang Unit<span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input id="prod_unit" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1"  name="prod_unit"  required="required" type="text">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Harga <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input type="number" id="harga" name="harga" required="required" data-validate-minmax="10" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                     
                      
                    
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">

                          <button type="reset" class="btn btn-primary">Cancel</button>
                          <button  type="submit" name="submit" class="btn btn-success">Simpan</button>
                        </div>
                      </div>
                   <?= form_close()?>
                  </div>
                </div>
              </div>