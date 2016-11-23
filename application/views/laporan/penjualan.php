<script>
    function checkform ( form )
    {
      if (form.tgl1.value == "") {
        alert( "Maaf,  tidak boleh dikosongkan.!!");
        form.tgl1.focus();
        return false ;
      }
      else if (form.tgl2.value == "") {
        alert( "Maaf,  tidak boleh dikosongkan.!!");
        form.tgl2.focus();
        return false ;
      }
      return true ;
    }
</script>
<div class="col-md-12 col-sm-12 col-xs-12">
               <div class="x_panel">
               <br>
               <?=form_open('laporan/periode',['onsubmit'=>"return checkform(this);"]);?>
                <table>
                  <tr class="success">
                    <th>Tanggal Mulai</th><th></th> <th>Tanggal Selesai</th>
                  </tr>
                  <tr>
                    <td>
                       <input type="date" name="tgl1" class="form-control span3" required="required" placeholder='Tanggal mulai..'>
                   </td>
                   <td>&nbsp;&nbsp;sd&nbsp;&nbsp;</td>
                   <td>
                       <input type="date" name="tgl2" class="form-control span3" required="required"  placeholder='Tanggal selesai..'>
                    </td>
                  </tr>
                  <tr>
                    <td><br><input type="submit" name="submit" value="Cari" class="btn btn-primary btn-sm" ></td>
                  </tr>
                </table>
                </form>
      </div>
                <div class="x_panel">
                <?php
                  $tgl1 = $this->input->post('tgl1');
                  $tgl2 = $this->input->post('tgl2');
                   if (empty($tgl1)) {
                       echo anchor('laporan/cetak', 'Download PDF',['class'=>'btn btn-default btn-sm','target'=>'_blank']);
                   }else{
                       echo anchor('laporan/cetak/'.$tgl1.'/'.$tgl2, 'Download PDF',['class'=>'btn btn-default btn-sm','target'=>'_blank']);
                   }
                 
                ?>
                  <div class="x_title">
                   
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
                            <th>Tanggal</th>
                            <th>Nama Customer</th>
                            <th>Nama Barang</th>
                            <th>QTY</th>
                            <th>Satuan</th>
                            <th>Harga Satuan</th>
                            <th>Jumlah</th>
                        </tr>
                      </thead>

                      <tbody>
                      <?php
                         $edit = "<i class='fa fa-edit'></i>";
                         $del  = "<li class='fa fa-trash'></li>";
                        foreach ($record->result() as $r):
                          $subtotal = $r->qty * $r->harga;
                      ?>
                        <tr>
                          <td><?=$r->tgl_transaksi?></td>
                          <td><?=$r->nama_customer?></td>
                          <td><?=$r->nama_barang?></td>
                          <td><?=$r->qty?></td>
                          <td><?=$r->prod_unit?></td>
                          <td><?=$r->harga?></td>
                          <td><?=$subtotal?></td>
                       <?php  endforeach?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
            