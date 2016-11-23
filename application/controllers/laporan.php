<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	    $this->load->model(array('model_laporan'));
	    $this->load->library('cfpdf');
	    check_login();
	}

	public function index()
	{
		$data['laporan']  = $this->model_laporan->get_date();
		$data['date']    = date('d');
		$this->load->view('laporan/laporan',$data);
	}
	public function periode(){
		if (isset($_POST['submit'])) {

			$data['title']  = "Laporan Penjualan Barang";
			$data['subtitle'] = "";
			$data['operator'] = $this->db->get_where('operator', array('username'=>$this->session->userdata('username')))->row();
			$tgl1 = $this->input->post('tgl1');
			$tgl2 = $this->input->post('tgl2');
			$this->session->set_userdata(array('tgl1'=>$tgl1, 'tgl2'=>$tgl2));
			$data['record']  = $this->model_laporan->get_periode($tgl1, $tgl2);
			$this->template->load('template', 'laporan/penjualan', $data);
	    }else{
	    	$this->session->unset_userdata(array('tgl1','tgl2'));
			$data['title']  = "Laporan Penjualan Barang";
			$data['subtitle'] = "";
			$data['operator'] = $this->db->get_where('operator', array('username'=>$this->session->userdata('username')))->row();
			$data['record']  = $this->model_laporan->get_all();
			$this->template->load('template', 'laporan/penjualan', $data);
	    }
	}
	public function cetak($tgl1=null,$tgl2=null)
	{
		if (!empty($tgl1)) {
			$laporan= $this->model_laporan->get_periode($tgl1, $tgl2);
			
		}else{
			$laporan= $this->model_laporan->get_all();
		}
		$pdf=new FPDF('P','mm','A4');
		$pdf->AddPage();
		$pdf->SetFont('Arial','B','L');
	    $pdf->SetFontSize(16);
	    if ($tgl1=='') {
	    	$pdf->Text(40, 10, 'LAPORAN PENJUALAN SEMUA PERIODE');
	    }else{
	    	$pdf->Text(30, 10, 'LAPORAN PENJUALAN PERIODE : '.$tgl1.' sd '.$tgl2);
	    }
	    
	    $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(16);
	    $pdf->Text(90, 20, 'PT.SAM');
	    $pdf->SetFont('Arial','I','L');
	    $pdf->SetFontSize(12);
	    $pdf->Text(80, 23, '(Sinar Agung Metalindo)');
        $pdf->SetFont('Arial','','L');
        $pdf->SetFontSize(12);
        $pdf->Text(75, 28, 'Jalan Jati Makmur Raya No.3'); 
        $pdf->SetFont('Arial','','L');
	    $pdf->SetFontSize(12);
	    $pdf->Text(80, 34, 'Telepon:0821-1488-6789');
	    $pdf->SetFont('Arial','B','L');
	    $pdf->SetFontSize(10);
	    $pdf->Image(base_url('uploads/12.png'),10,10,40,40);


	    $pdf->ln(40);
        $pdf->SetFillColor(224,224,224);
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(12);
      
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(10);
        $pdf->Cell(25, 7, 'Tgl', 1,0,'C');
        $pdf->Cell(40, 7, 'Nama Customer', 1,0,'C');
        $pdf->Cell(40, 7, 'Nama Barang', 1,0,'C');
        $pdf->Cell(15, 7, 'QTY', 1,0,'C');
        $pdf->Cell(17, 7, 'Satuan', 1,0,'C');
        $pdf->Cell(30, 7, 'Harga Satuan', 1,0,'C');
        $pdf->Cell(25, 7, 'Jumlah', 1,1,'C');
        $pdf->SetFont('Arial','','L');
        $total = 0;
        foreach ($laporan->result() as $l) {
        	$subtotal = $l->qty * $l->harga;
        	$total += $subtotal; 
              $pdf->SetFont('Arial','','L');
	        $pdf->SetFontSize(10);
	        $pdf->Cell(25, 7, $l->tgl_transaksi, 1,0,'C');
	        $pdf->Cell(40, 7, $l->nama_customer, 1,0,'C');
	        $pdf->Cell(40, 7, $l->nama_barang, 1,0,'C');
	        $pdf->Cell(15, 7, $l->qty, 1,0,'C');
	        $pdf->Cell(17, 7, $l->prod_unit, 1,0,'C');
	        $pdf->Cell(30, 7, $l->harga, 1,0,'C');
	        $pdf->Cell(25, 7, $subtotal, 1,1,'C');
        }
        $pdf->SetFont('Arial','B','L');
	    $pdf->SetFontSize(10);
        $pdf->Cell(167, 7, 'Total', 1,0,'R');
        $pdf->SetFont('Arial','','L');
	    $pdf->SetFontSize(10);
        $pdf->Cell(25, 7, $total, 1,1,'C');

        //$pdf->Cell(180, 0.5, '', 1,1,'C');       
        $pdf->ln(5);
        $pdf->Cell(180, 6, 'Bekasi , '.date('d-m-Y'), 0,1,'R');     
        $pdf->Cell(180, 6, 'Penanggung Jawab', 0,1,'R');  
        $pdf->Cell(180, 12, '', 0,1,'R');  
        $pdf->SetFont('Arial','u','L');
        $pdf->Cell(180, 6, 'susi darmawanti', 0,1,'R'); 
	    $pdf->Output();
        
	}

}

/* End of file laporan.php */
/* Location: ./application/controllers/laporan.php */