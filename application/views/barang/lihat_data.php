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
                    <h2><?=anchor('barang/post','Tambah Data', ['class'=>'btn btn-primary btn-sm'])?></h2>
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
                            <th>No</th>
                            <th>Nama barang</th>
                            <th>Nama Kategori</th>
                            <th>Barang Unit</th>
                            <th>Harga</th>
                            <th>Operasi</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
                         $no = $this->uri->segment(3)+1;
                         $edit = "<i class='fa fa-edit'></i>";
                         $del  = "<li class='fa fa-trash'></li>";
                        foreach ($record->result() as $r):
                      ?>
                        <tr>
                          <td><?=$no?></td>
                          <td><?=$r->nama_barang?></td>
                          <td><?=$r->nama_kategori?></td>
                          <td><?=$r->prod_unit?></td>
                          <td><?="Rp. ".number_format($r->harga,2,",",".")?></td>
                          <td width=20><?=anchor('barang/edit/'.$r->barang_id, $edit."&nbsp;&nbsp;&nbsp;")?> <?=anchor('barang/delete/'.$r->barang_id, $del, ['onclick'=>'return cek()'])?></td>
                        </tr>

                       <?php $no++; endforeach?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>