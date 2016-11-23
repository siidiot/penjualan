<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?=anchor('transaksi/add','Tambah Data', ['class'=>'btn btn-primary btn-sm'])?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                            <th>ID Trans</th>
                            <th>Customer</th>
                            <th>Tanggal Transaksi</th>
                            <th>Total Harga</th>
                            <th>Jumlah Bayar</th>
                            <th>Piutang</th>
                            <th>Tanggal Jatuh tempo</th>
                            <th>Status</th>
                        </tr>
                      </thead>

                      <tbody>
                      <?php
                         $edit = "<i class='fa fa-edit'></i>";
                         $del  = "<li class='fa fa-trash'></li>";
                        foreach ($record->result() as $r):
                      ?>
                        <tr>
                          <td><?=anchor('transaksi/detail/'.$r->transaksi_id,$r->transaksi_id,['class'=>'btn btn-success btn-sm','target'=>'_blank'])?></td>
                          <td><?=$r->nama_customer?></td>
                          <td><?=$r->tgl_transaksi?></td>
                          <td><?=$r->total?></td>
                          <td><?=$r->jumlah_bayar?></td>
                          <td><?=$r->piutang?></td>
                          <td><?=$r->tgl_jatuh_tempo?></td>
                          <td>
                          <?php 
                           echo anchor('transaksi/view_history/'.$r->transaksi_id, 'View',['class'=>'btn btn-default btn-sm fa fa-eye','data-target'=>".bs-example-modal-sm",'target'=>"_blank"]);
                          if($r->total>$r->jumlah_bayar){
                                 echo anchor('transaksi/bayar/'.$r->transaksi_id, 'Bayar', ['class'=>'btn btn-primary btn-sm']);
                              }else{
                              	echo "Lunas";
                              }
                                ?>
                          </td>
                        </tr>

                       <?php  endforeach?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
            