<script src="<?=base_url()?>vendors/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
function bpotongan(){
        total = eval(document.formCheckin.total.value);
        pot = eval(document.formCheckin.pot.value);
        
        total = total+pot;
        document.formCheckin.total.value = total;
        document.getElementById('total').innerHTML = total;

    }
function b_lain(){
        total = eval(document.formCheckin.total.value);
        pot = eval(document.formCheckin.blain.value);
        
        total = total+pot;
        document.formCheckin.total.value = total;
        document.getElementById('total').innerHTML = total;
    }
function bkirim(){
        total = eval(document.formCheckin.total.value);
        pot = eval(document.formCheckin.kirim.value);
        
        total = total+pot;
        document.formCheckin.total.value = total;
        document.getElementById('total').innerHTML = total;
    }
function discount(){
        total = document.formCheckin.total.value;
        subtotal = document.formCheckin.subtotal.value;
        disc = document.formCheckin.disc.value;
        disc = (disc/100)*subtotal;
        total = total-disc;
        document.formCheckin.total.value = total;
        document.getElementById('total').innerHTML = total;
    }
    
</script>
<?php if($this->session->userdata('error')):?>
<div class="alert alert-danger"><?php echo $this->session->userdata('error'); ?></div>
<?php endif?>

<div class="col-sm-9">

<br>
<?php echo form_open('transaksi/add', ['name'=>'formCheckin'],'novalidate')?>
<h4><u>Product Sales Order</u></h4>
<table>
   <tr>
	<td>Pilih Product &nbsp;&nbsp;&nbsp;&nbsp;</td>
	  <td>
	        <select id="id" required="required" class="select2_single form-control">
                   <option value=""><?="&nbsp;"?></option>
                        <?php 
                            foreach ($record->result() as $r) {
                              echo "<option value='$r->barang_id'>$r->nama_barang</option>";
                             }
                        ?>
            </select>
	  </td>
	</tr>
</table>
<p >
<table id="detail_product">
	<tr>
    <td >Product ID<span class="required">*</td><td><input size="5" type="text" ></td>
  </tr>
  <tr>
    <td>Nama Product<span class="required">*</td><td><input type="text" name="nama" ></td>
  </tr>
  <tr>
    <td>Product Unit<span class="required">*</td><td><input size="10" type="text" ></td>
  </tr>
  <tr>
    <td>Harga Per Unit<span class="required">*</td><td><input size="10" type="text" ></td>
  </tr>
  <tr>
    <td>Jumlah Product<span class="required">*</td><td><input size="10" required="required" type="text" name="qty"></td>
  </tr>
  <tr>
    <td>Keterangan<span class="required">*</td><td><textarea></textarea></td>
  </tr>
  <tr>
    <td></td><td><button type="submit" name="submit">Submit Product</button></td>
  </tr>
  </table>
</p>
</div>
</form>
<?php echo form_open('transaksi/selesai',['name'=>'formCheckin'],'novalidate')?>
<div class="col-sm-3">
  <div style="height: 150px"></div>
	<table class="table table-bordered">
	<tr>
		<td width="100px">TGL TRANS<span class="required">*</td><td><input class="form-control" required="required" name="tgl_trans" type="date"></td>
	</tr>
</table>
</div>


<?php if($detail->num_rows()>0):?>
<table class="table table-bordered">
	<tr>
		<th class="success" colspan="7">Detail Transaksi</th>
	</tr>
	<tr>
		<th>PRO ID</th><th>PRODUCT</th><th>QTY</th><th>UNIT</th><th>HARGA PER UNIT</th><th>SUBTOTAL</th><th>Cancel</th>
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
          	        <td>".number_format($r->harga,2,",",".")."</td>
          	        <td>$subtotal</td>
          	        <td>".anchor('transaksi/hapusitem/'.$r->t_detail_id, 'Hapus')."</td>
          	      </tr>";
          }
		?>
	</tr>
	<tr>
		<td colspan="6"><p align="right">Total</p></td><td><?php echo "Rp. ".number_format($total,0,",",".")?></td>
	</tr>
</table>
<?php endif?>
<hr>
<div class="col-sm-8">
<table>
   <tr>
	<td>Pilih Customer &nbsp;&nbsp;</td>
	  <td>
	        <select id="idc" required="required" class="select2_single form-control">
                   <option value=""><?="&nbsp;"?></option>
                        <?php 
                            foreach ($customer->result() as $r) {
                              echo "<option value='$r->cust_id'>$r->nama_customer</option>";
                             }
                        ?>
            </select>
	  </td>
	</tr>
</table>

<p >
<table id="detail_customer">
	<tr>
    <td >Customer ID<span class="required">*</td><td><input size="5"  type="text" ></td>
  </tr>
  <tr>
    <td>Nama Customer<span class="required">*</td><td><input type="text" required="required" name="nama" ></td>
  </tr>
  <tr>
  	<td>Alamat</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kirim Ke&nbsp;&nbsp;&nbsp;<select id="id" ><option value="">hsdggshdshgfshd</option> </select></td>
  </tr>
  <tr>
  	<td colspan="2"><textarea></textarea><textarea></textarea></td>
  </tr>
  </table>
</p>
<table>
</div>
	
	<tr>
		<td>Durasi </td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td><td><input type="text" required="required" name="durasi" class="form-control" placeholder="Jumlah hari..."></td><td>&nbsp;&nbsp;Hari</td>
	</tr>
	<tr>
		<td>Total Bayar </td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td><td><input type="text" name="jumlah" class="form-control" placeholder="Jumlah Bayar....."></td>
	</tr>
	
</table>
</div>
<div class="col-sm-4">
	<fieldset>
		<legend>TOTAL</legend>
		    <div align="right">
		    <p align="left">Subtotal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="hidden" name="subtotal" value='<?=empty($total)?'':$total?>'><b>Rp. <?=empty($total)?'':number_format($total,0,",",".")?></b></p>
		    <p align="left">Pengiriman &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="kirim" onChange="bkirim()" type="text"></p>
		    <p align="left">Discount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" onChange='discount()' size="10" name="disc">%(presentase)</p>
		    <p align="left">Return &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text"></p>
		    <p align="left">Beban pemotongan<input type='text' onChange='bpotongan()'  name='pot'/></p>
		    <p align="left">Beban lain-lain &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input onChange='b_lain()' name="blain" type="text"></p>
		    </div>
		    <p align="left"><b>Total &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input readonly="" type="hidden" name="total" value='<?=empty($total)?'':$total?>'> <b id="total"><?=empty($total)?'Rp. -':'Rp. '.$total?></b></b></p>
		    <P align="right"><button type="submit">Confirm</button></P>
	</fieldset>
</div>
</form>


<script type="text/javascript">
    $(document).ready(function() {
       
      
       $("#id").change(function(){
            var id = $("#id").val();
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('index.php/transaksi/get_detail_product'); ?>",
                data: "id="+id,
                success: function(data){
                    $('#detail_product').html(data);
                }
            });
        });

       $("#idc").change(function(){
            var idc = $("#idc").val();
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('index.php/transaksi/get_detail_customer'); ?>",
                data: "idc="+idc,
                success: function(data){
                    $('#detail_customer').html(data);
                }
            });
        });

       


    })
</script>
