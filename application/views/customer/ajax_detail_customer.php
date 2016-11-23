<?php
if(isset($detail_customer)){
        ?>  
     <tr>
    <td >Customer ID<span class="required">*</td><td><input size="5" type="text" value="<?=$detail_customer->cust_id?>"></td>
  </tr>
  <tr>
    <td>Nama Customer<span class="required">*</td><td><input type="text" name="cust" value="<?=$detail_customer->nama_customer?>"></td>
  </tr>
  <tr>
  	<td>Alamat</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kirim Ke&nbsp;&nbsp;&nbsp;<select id="id" class="select2_single"><option value="">hsdggshdshgfshd</option> </select></td>
  </tr>
  <tr>
  	<td colspan="2"><textarea></textarea><textarea></textarea></td>
  </tr>
  
 <?php
    
}
?>
