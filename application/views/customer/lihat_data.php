<script type="text/javascript">
    function cek()
    {
       tanya=confirm('anda yakin akan menghapus');
       if (tanya==true) {
         return true;
       }else{
        return false;
       }
    }
</script>
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?=anchor('customer/post','Tambah Data', ['class'=>'btn btn-primary btn-sm'])?></h2>
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
                            <th>Customer ID</th>
                            <th>Customer</th>
                            <th>Alamat</th>
                            <th>Kota</th>
                            <th>No Telp</th>
                            <th>No HP</th>
                            <th>Keterangan</th>
                            <th>Operasi</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
                         $edit = "<i class='fa fa-edit'></i>";
                         $del  = "<li class='fa fa-trash'></li>";
                        foreach ($record->result() as $r):
                      ?>
                        <tr>
                          <td><?=$r->cust_id?></td>
                          <td><?=$r->nama_customer?></td>
                          <td><?=$r->alamat?></td>
                          <td><?=$r->kota?></td>
                          <td><?=$r->phone?></td>
                          <td><?=$r->no_hp?></td>
                          <td><?=$r->ket?></td>
                          <td width=20><?=anchor('customer/edit/'.$r->cust_id, $edit."&nbsp;&nbsp;&nbsp;")?> <?=anchor('customer/delete/'.$r->cust_id, $del, ['onclick'=>'return cek()'])?></td>
                        </tr>

                       <?php endforeach?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>