 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <p>Nama Customer : <?=$record->nama_customer?></p>
                    <p>Tangal Jatuh Tempo : <?=$record->tgl_jatuh_tempo?></p>
                    <p>Sisa Piutang : Rp. <?=number_format($record->piutang,0,",",".")?></p>
                   
                    <div class="clearfix"></div>
                  </div>
                  

                    <?php echo form_open('transaksi/bayar/'.$record->transaksi_id,['class'=>'form-horizontal form-label-left'], 'novalidate')?>
                     
                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Tanggal Bayar<span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input id="id" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1"  name="tgl_bayar"   type="date">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Jumlah Bayar <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input id="nama" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1"  name="jml_bayar"  required="required" type="text">
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