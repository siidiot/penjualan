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
 
 
  function Content($nama,$his)
  {
        $this->ln(40);
        $this->SetFillColor(224,224,224);
        $this->SetFont('Arial','B','L');
        $this->SetFontSize(12);
        $this->Cell(180, 8, 'HISTORY PEMBAYARAN '.$nama->nama_customer, 1,1,'C',1);
        $this->SetFont('Arial','B','L');
        $this->SetFontSize(10);
        $this->Cell(60, 7, 'Tanggal bayar', 0,0);
        $this->Cell(60, 7, 'Jumlah bayar', 0,0,'C');
        $this->Cell(60, 7, 'Sisa bayar', 0,1,'C');
        $this->SetFont('Arial','','L');
           $ya = 46;
           $rw = 6;
         foreach ($his as $h) {
          $this->Cell(60, 7, $h->tgl_bayar, 0,0);
           $this->Cell(60, 7, 'Rp. '.number_format($h->jumlah_bayar,0,",","."), 0,0,'C');
           $this->Cell(60, 7, 'Rp. '.number_format($h->sisa_bayar,0,",","."), 0,1,'C');
           $ya = $ya + $rw;
         }

        $this->Cell(180, 0.5, '', 1,1,'C');       
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
$pdf->Content($nama,$his);
$pdf->Output();
?>