<h3>Form Transaksi Pembelian</h3>
<?php if($this->session->userdata('error')):?>
<div class="alert alert-danger"><?php echo $this->session->userdata('error'); ?></div>
<?php endif?>
<?php echo form_open('transaksi_beli')?>
<table class="table table-bordered">
	<tr>
		<th colspan="2" class="success">Form</th>
	</tr>
	<tr>
		<th><div class="col-sm-6"><input list="barang" name="nama" class="form-control" placeholder="Nama Barang"></div><div class="col-sm-1"><input type="text" name="qty" class="form-control" placeholder="QTY"></th>
	</tr>
	<tr>
		<td>
		    <button name="submit" type="submit" class="btn btn-default">Simpan</button>
		    <?php echo anchor('transaksi_beli/selesai', 'Selesai', array('class'=>'btn btn-default'))?>
		</td>
	</tr>
</table>
<datalist id="barang">
	<?php
       foreach ($record->result() as $r) {
       	echo "<option value='$r->nama_barang'></option>";
       }
	?>
</datalist>

<table class="table table-bordered">
	<tr>
		<th class="success" colspan="6">Detail Transaksi Pembelian</th>
	</tr>
	<tr>
		<th>No</th><th>Nama Barang</th><th>QTY</th><th>Harga</th><th>Subtotal</th><th>Cancel</th>
		<?php
		 $no = 1;
		 $total = 0;
          foreach ($detail->result() as $r) {
          	$subtotal  = $r->qty * $r->harga;
          	$total = $total + $subtotal;
          	echo "<tr>
          	        <td width=10>$no</td>
          	        <td>$r->nama_barang</td>
          	        <td>$r->qty</td>
          	        <td>$r->harga</td>
          	        <td>$subtotal</td>
          	        <td>".anchor('transaksi/hapusitem/'.$r->t_detail_id, 'Hapus')."</td>
          	      </tr>";
          $no++;
          }
		?>
	</tr>
	<tr>
		<td colspan="5">Total</td><td><?php echo $total?></td>
	</tr>
</table>