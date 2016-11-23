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

                    <?php echo form_open('kategori/post',['class'=>'form-horizontal form-label-left'], 'novalidate')?>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Kategori<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nama_kategori" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1"  name="nama_kategori"  required="required" type="text">
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