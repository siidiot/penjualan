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
                  

                    <?php echo form_open('customer/edit',['class'=>'form-horizontal form-label-left'], 'novalidate')?>
                 
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Customer ID<span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input id="id" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1"  name="id" value="<?=$record->cust_id?>"  readonly type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Lengkap <span class="required">*</span>
                        </label>
                        <div class="col-md-5 col-sm-6 col-xs-12">
                          <input id="nama" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1"  name="nama" value="<?=$record->nama_customer?>" required="required" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Alamat <span class="required">*</span>
                        </label>
                        <div class="col-md-5 col-sm-6 col-xs-12">
                          <textarea id="alamat" required="required" name="alamat" class="form-control col-md-7 col-xs-12"><?=$record->alamat?></textarea>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Kota <span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input id="kota" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1"  name="kota" value="<?=$record->kota?>" required="required" type="text">
                        </div>
                      </div>

                     
                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Telephone<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input id="phone" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" value="<?=$record->phone?>" name="phone"  required="required" type="text">
                        </div>
                         <label class="control-label col-md-1" for="name">NO HP<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input id="hp" class="form-control col-md-3 col-xs-12" data-validate-length-range="6" data-validate-words="1"  name="hp"  required="required" value="<?=$record->no_hp?>" placeholder="(+6281)xxx xxx xxx" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Keterangan <span class="required">*</span>
                        </label>
                        <div class="col-md-5 col-sm-6 col-xs-12">
                          <textarea id="ket" required="required" name="ket" class="form-control col-md-7 col-xs-12"><?=$record->ket?></textarea>
                        </div>
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