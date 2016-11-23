<?php
class PDF extends FPDF
{
  //Page header
  function Header()
  {
       $this->SetFont('Arial','B','L');
        $this->SetFontSize(18);
        $this->Text(90, 20, 'PT.SAM');
         $this->SetFont('Arial','I','L');
        $this->SetFontSize(12);
        $this->Text(80, 23, '(Sinar Agung Metalindo)');
        $this->SetFont('Arial','','L');
        $this->SetFontSize(12);
        $this->Text(60, 30, 'Jalan Jati Makmur Raya No.3, Jatimakmur, Bekasi, Jawa Barat');
         $this->SetFont('Arial','','L');
        $this->SetFontSize(12);
        $this->Text(80, 34, 'Telepon:0821-1488-6789');
       $this->SetFont('Arial','B','L');
        $this->SetFontSize(10);
        $this->Image(base_url('uploads/12.png'),10,10,40,40);
                
  }
 
 
  function Content($detail, $nama)
  {
        $this->ln(40);
        $this->SetFillColor(224,224,224);
        $this->SetFont('Arial','B','L');
        $this->SetFontSize(12);
        $this->Cell(180, 8, 'Detail Transaksi '.$nama->nama_customer , 1,1,'C',1);
        $this->SetFont('Arial','B','L');
        $this->SetFontSize(10);
        $this->Cell(20, 7, 'PRO ID', 1,0);
        $this->Cell(40, 7, 'PRODUK', 1,0,'C');
        $this->Cell(25, 7, 'UNIT', 1,0,'C');
        $this->Cell(25, 7, 'QTY', 1,0,'C');
        $this->Cell(40, 7, 'HARGA PER UNIT', 1,0,'C');
        $this->Cell(30, 7, 'SUBTOTAL', 1,1,'C');

        $this->SetFont('Arial','','L');
           $total = 0;
          foreach ($detail->result() as $d) {
            $subtotal  = $d->qty * $d->harga;
            $total = $total + $subtotal;
            $this->Cell(20, 7, $d->barang_id, 1,0);
        $this->Cell(40, 7, $d->nama_barang, 1,0,'C');
        $this->Cell(25, 7, $d->prod_unit, 1,0,'C');
        $this->Cell(25, 7, $d->qty, 1,0,'C');
        $this->Cell(40, 7, $d->harga, 1,0,'C');
        $this->Cell(30, 7, $subtotal, 1,1,'C');
      }
      $this->SetFont('Arial','B','L');
      $this->Cell(150, 7, 'TOTAL', 1,0,'R'); 
      $this->SetFont('Arial','','L');
        $this->Cell(30, 7, $total, 1,1,'C'); 
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
$pdf->Content($detail, $nama);
$pdf->Output();
?>