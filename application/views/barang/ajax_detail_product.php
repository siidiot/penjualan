<?php
if(isset($detail_product)){
        ?>    
 
  <tr>
    <td >Product ID<span class="required">*</td><td><input size="5" type="text" value="<?=$detail_product->barang_id?>"></td>
  </tr>
  <tr>
    <td>Nama Product<span class="required">*</td><td><input type="text" name="nama" value="<?=$detail_product->nama_barang?>"></td>
  </tr>
  <tr>
    <td>Product Unit<span class="required">*</td><td><input size="10" type="text" value="<?=$detail_product->prod_unit?>"></td>
  </tr>
  <tr>
    <td>Harga Per Unit<span class="required">*</td><td><input size="10" type="text" value="<?=$detail_product->harga?>"></td>
  </tr>
  <tr>
    <td>Jumlah Product<span class="required">*</td><td><input size="10" type="text" required="required" name="qty"></td>
  </tr>
  <tr>
    <td>Keterangan<span class="required">*</td><td><textarea></textarea></td>
  </tr>
  <tr>
    <td></td><td><button type="submit" name="submit">Submit Product</button></td>
  </tr>

          
            
        
    <?php
    
}
?>
