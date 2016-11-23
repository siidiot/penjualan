<h3>Laporan transaksi</h3>
<table class="table table-bordered">
 
  <tr>
	<th>No</th><th>Tanggal transaksi</th><th>Operator</th><th>Total transaksi</th>
  </tr>
     <?php
       $no = 1;
       $total = 0;
        foreach ($record->result() as $r) {
           $total = $total + $r->total;
        	echo "<tr>
	        	     <td width=10>$no</td>
	        	     <td>$r->tanggal_transaksi</td>
	        	     <td>$r->nama_lengkap</td>
	        	     <td>$r->total</td>
	        	  </tr>";
	    $no++;
        }
     ?>
     <tr>
     	<td colspan="3"><p align="right">Total</p></td><td><?php echo $total?></td>
     </tr>
</table>