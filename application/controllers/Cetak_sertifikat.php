<?php
defined('BASEPATH') or exit('No direct script access allowed');
 
Class Cetak_sertifikat extends CI_Controller{
    
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
        $pdf->SetLineWidth(0.9);
        $pdf->Cell(190,1,'','B',1,'L');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Times','B',14);
        $pdf->Cell(190,7,'ENGLISH PROFICIENCY TEST',0,1,'C');
        // Kolom Tabel Biodata
        
        $pdf->SetFont('Times','B',10);
        $laporan = $this->db->get('cbt_biodata_peserta')->result();
        foreach ($laporan as $row){
            $pdf->Cell(10,7,'',0,1);
            $pdf->Cell(32,6,'NIM',0,0);
            $pdf->Cell(5,6,':',0,0);
            $pdf->Cell(32,6,$row->nim,0,0);
            $pdf->Cell(10,7,'',0,1);
            $pdf->Cell(32,6,'NAMA',0,0);
            $pdf->Cell(5,6,':',0,0);
            $pdf->Cell(32,6,$row->nama,0,0);
            $pdf->Cell(10,7,'',0,1);
            $pdf->Cell(32,6,'PRODI',0,0);
            $pdf->Cell(5,6,':',0,0);
            $pdf->Cell(32,6,$row->prodi,0,0);

        }
        // Kolom Tabel Tes
        
        $pdf->SetFont('Times','B',10);
        $laporan = $this->db->get('cbt_tes')->result();
        foreach ($laporan as $row){
            $pdf->Cell(10,7,'',0,1);
            $pdf->Cell(32,6,'NAMA TES',0,0);
            $pdf->Cell(5,6,':',0,0);
            $pdf->Cell(32,6,$row->tes_nama,0,0);
            $pdf->Cell(10,7,'',0,1);
            $pdf->Cell(32,6,'WAKTU MULAI',0,0);
            $pdf->Cell(5,6,':',0,0);
            $pdf->Cell(32,6,$row->tes_begin_time,0,0);
            $pdf->Cell(10,7,'',0,1);
            $pdf->Cell(32,6,'WAKTU SELESAI',0,0);
            $pdf->Cell(5,6,':',0,0);
            $pdf->Cell(32,6,$row->tes_end_time,0,0);
            

        }
        // Kolom Tabel Skor
        $pdf->SetFont('Times','B',10);
        $sql = 'SELECT SUM(tessoal_nilai) AS hasil FROM cbt_tes_soal WHERE tessoal_tesuser_id';
        $laporan = $this->db->query($sql)->result();
        foreach ($laporan as $row){
            $pdf->Cell(10,7,'',0,1);
            $pdf->Cell(32,6,'TOTAL SKOR',0,0);
            $pdf->Cell(5,6,':',0,0);
            $pdf->Cell(32,6,$row->hasil,0,0);
            $pdf->Cell(10,7,'',0,1);
            $pdf->Cell(10,7,'',0,1);
            $pdf->Cell(18,6,'Tangerang,',0,0);
            $pdf->Cell(5,6,date( 'd M Y'),0,0);
            $pdf->Cell(10,7,'',0,1);
            $pdf->Cell(32,6,'HEAD OF LAB,',0,0);
            $pdf->Cell(10,7,'',0,1);
            $pdf->Cell(32,6,'Marieta Moddies Swara,S.Pd.,M.Pd',0,0);
        }
        $pdf->Output();
    }
}