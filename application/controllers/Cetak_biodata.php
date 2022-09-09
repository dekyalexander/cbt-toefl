<?php
defined('BASEPATH') or exit('No direct script access allowed');
 
Class Cetak_biodata extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    
    function index(){
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        $pdf->Image('public/plugins/adminlte/img/unista.png',10,10,16,15);
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Times','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'FACULTY OF TEACHER TRAINING EDUCATION',0,1,'C');
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(190,7,'Jl. Maulana Yusuf Babakan Kota. Tangerang',0,1,'C');
        // Garis Header
        $pdf->Cell(190,1,'','B',1,'L');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Times','B',14);
        $pdf->Cell(190,7,'BIODATA PESERTA',0,1,'C');
        // Kolom Tabel Biodata
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Times','B',10);
        $pdf->Cell(32,6,'NIM',1,0);
        $pdf->Cell(32,6,'NAMA',1,0);
        $pdf->Cell(40,6,'FAKULTAS',1,0);
        $pdf->Cell(40,6,'PRODI',1,0);
        $pdf->Cell(30,6,'NOMOR HP',1,0);
        $pdf->Cell(30,6,'TANGGAL',1,0);
        $pdf->SetFont('Times','',10);
        $laporan = $this->db->get('cbt_biodata_peserta')->result();
        foreach ($laporan as $row){
            $pdf->Cell(10,7,'',0,1);
            $pdf->Cell(32,6,$row->nim,1,0);
            $pdf->Cell(32,6,$row->nama,1,0);
            $pdf->Cell(40,6,$row->fakultas,1,0);
            $pdf->Cell(40,6,$row->prodi,1,0);
            $pdf->Cell(30,6,$row->nomorhp,1,0);
            $pdf->Cell(30,6,$row->tanggal,1,0);

        }
        $pdf->Output();
    }
}