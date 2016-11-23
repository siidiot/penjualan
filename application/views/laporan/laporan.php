<?php
class PDF extends FPDF
{
  //Page header
  function Header()
  {
  	 
	  $bulan=date('m');
	if($bulan==1){ $bulan = 'Januari';}
	 elseif($bulan==2){$bulan = 'Februari';}
	 elseif($bulan==3){$bulan = 'Maret';}
	 elseif($bulan==4){$bulan = 'April';}
	 elseif($bulan==5){$bulan = 'Mei';}
	 elseif($bulan==6){$bulan = 'Juni';}
	 elseif($bulan==7){$bulan = 'Juli';}
	 elseif($bulan==8){$bulan = 'AGUSTUS';}
	 elseif($bulan==9){$bulan = 'SEPTEMBER';}
	 elseif($bulan==10){$bulan = 'OKTOBER';}
	 elseif($bulan==11){$bulan = 'NOVEMBER';}
	 else{$bulan = 'Desember';}

  	    $this->SetFont('Arial','B','L');
        $this->SetFontSize(16);
        $this->Text(35, 10, 'LAPORAN PENJUALAN TANGGAL '.date('d').' '.$bulan.' '.date('Y'));
       $this->SetFont('Arial','B','L');
        $this->SetFontSize(16);
        $this->Text(90, 20, 'PT.SAM');
         $this->SetFont('Arial','I','L');
        $this->SetFontSize(12);
        $this->Text(80, 23, '(Sinar Agung Metalindo)');
        $this->SetFont('Arial','','L');
        $this->SetFontSize(12);
        $this->Text(75, 28, 'Jalan Jati Makmur Raya No.3');
         $this->SetFont('Arial','','L');
        $this->SetFontSize(12);
        $this->Text(80, 34, 'Telepon:0821-1488-6789');
       $this->SetFont('Arial','B','L');
        $this->SetFontSize(10);
        $this->Image(base_url('uploads/12.png'),10,10,40,40);
                
  }
 
 
  function Content($laporan)
  {
        $this->ln(40);
        $this->SetFillColor(224,224,224);
        $this->SetFont('Arial','B','L');
        $this->SetFontSize(12);
      
        $this->SetFont('Arial','B','L');
        $this->SetFontSize(10);
        $this->Cell(20, 7, 'Tgl', 1,0,'C');
        $this->Cell(35, 7, 'Nama Customer', 1,0,'C');
        $this->Cell(60, 7, 'Nama Barang', 1,0,'C');
        $this->Cell(10, 7, 'QTY', 1,0,'C');
         $this->Cell(17, 7, 'Satuan', 1,0,'C');
         $this->Cell(25, 7, 'Harga Satuan', 1,0,'C');
         $this->Cell(20, 7, 'Jumlah', 1,1,'C');
        $this->SetFont('Arial','','L');
         $total = 0;
        foreach ($laporan->result() as $l) {
        	$subtotal = $l->qty * $l->harga;
        	$total += $subtotal; 
              $this->SetFont('Arial','','L');
	        $this->SetFontSize(10);
	        $this->Cell(20, 7, $l->tgl_transaksi, 1,0,'C');
	        $this->Cell(35, 7, $l->nama_customer, 1,0,'C');
	        $this->Cell(60, 7, $l->nama_barang, 1,0,'C');
	        $this->Cell(10, 7, $l->qty, 1,0,'C');
	        $this->Cell(17, 7, $l->prod_unit, 1,0,'C');
	        $this->Cell(25, 7, $l->harga, 1,0,'C');
	        $this->Cell(20, 7, $subtotal, 1,1,'C');
        }
         $this->SetFont('Arial','B','L');
	        $this->SetFontSize(10);
           $this->Cell(167, 7, 'Total', 1,0,'R');
            $this->SetFont('Arial','','L');
	        $this->SetFontSize(10);
            $this->Cell(20, 7, $total, 1,1,'C');

       // $this->Cell(180, 0.5, '', 1,1,'C');       
         $this->ln(5);
        $this->Cell(180, 6, 'Bekasi , '.date('d-m-Y'), 0,1,'R');     
        $this->Cell(180, 6, 'Penanggung Jawab', 0,1,'R');  
        $this->Cell(180, 12, '', 0,1,'R');  
         $this->SetFont('Arial','u','L');
        $this->Cell(180, 6, 'susi darmawanti', 0,1,'R'); 
                   
 
  }
  function Footer()
  {
    //atur posisi 1.5 cm dari bawah
    $this->SetY(-15);
    //buat garis horizontal
    $this->Line(10,$this->GetY(),210,$this->GetY());
    //Arial italic 9
    $this->SetFont('Arial','I',9);
                $this->Cell(0,10,'copyright PT.SAM ' . date('Y'),0,0,'L');
    //nomor halaman
    $this->Cell(0,10,'Halaman '.$this->PageNo().' dari {nb}',0,0,'R');
  }
}
 
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content($laporan);
$pdf->Output();
?>