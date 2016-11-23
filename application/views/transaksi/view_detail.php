<div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                      <div class="pull-left" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;margin-left: 0px">
                        <h3>transaksi ID#<?=$this->uri->segment(3)?></h3>
                      </div>
                    <div class="filter">
                    
                      <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                        <span><?=date('D, m-Y')?></span> <b class="caret"></b>
                      </div>
                    </div>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-9 col-sm-12 col-xs-12">
                      <div class="demo-container" style="height:280px">
                     <table class="table table-bordered">
  <tr>
    <th class="success" colspan="7">Detail Transaksi <?=$nama->nama_customer?></th>
  </tr>
  <tr>
    <th>PRO ID</th><th>PRODUCT</th><th>QTY</th><th>UNIT</th><th>HARGA PER UNIT</th><th>SUBTOTAL</th>
    <?php
     $total = 0;
          foreach ($detail->result() as $r) {
            $subtotal  = $r->qty * $r->harga;
            $total = $total + $subtotal;
            echo "<tr>
                    <td>$r->barang_id</td>
                    <td>$r->nama_barang</td>
                    <td>$r->qty</td>
                    <td>$r->prod_unit</td>
                    <td> Rp. ".number_format($r->harga,0,",",".")."</td>
                    <td>Rp. ".number_format($subtotal,0,",",".")."</td>
                    
                  </tr>";
          }
    ?>
  </tr>
  <tr>
    <th colspan="5"><p align="right">Total</p></th><th><?php echo "Rp. ".number_format($total,0,",",".")?></th>
  </tr>
</table>
<p align="left"><a  href="javascript:history.go(-1)" class="btn btn-danger fa fa-arrow-left">Kembali</a></p>
                        <div class="col-md-6 col-sm-6 col-xs-12"></div>
						<div class="col-md-6 col-sm-6 col-xs-12">
                  
                  </div>
                </div>
                        <div id="placeholder33x" class="demo-placeholder"></div>
                      </div>
                      
                      </div>

                    </div>

                    
                    </div>

                  </div>
                </div>
              </div>
            </div>

