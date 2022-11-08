<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function index()
    {
        $this->load->model('laporan_m');
        check_admin_not_login();

        $post = $this->input->post(NULL, TRUE);
        if (isset($post['cetak'])) {
            $status = $post['status'];
            $tanggal = $post['tanggal'];
            $pecahTanggal = explode(' - ', $tanggal);
            $tglMulai = date('Y-m-d', strtotime($pecahTanggal[0]));
            $tglAkhir = date('Y-m-d', strtotime(end($pecahTanggal)));
            
            $query = $this->laporan_m->getLaporan($status, ['mulai' => $tglMulai, 'akhir' => $tglAkhir]);
            $this->_cetak($query, $status, $tanggal);

        }else{
            $this->template->load('template/template', 'laporan/laporan');
        }
    }

    private function _cetak($data, $status, $tanggal)
    {
        $this->load->library('pdf');

        $pdf = new Fpdf();

        $pdf->AddPage('P', 'Letter');
        // $pdf->Image('logo.png',20,6,23);
        $pdf->SetFont('Times', 'B', 10);
        $pdf->Cell(190, 7, '', 0, 1, 'C');
        $pdf->SetFont('Times', 'B', 16);
        $pdf->Cell(190, 7, 'Perpustakaan SMAN 10 Muaro Jambi', 0, 1, 'C');
        $pdf->SetFont('Times', 'B', 8);
        $pdf->Cell(190, 7, 'Jl. Lintas Sumatra Jl. Petaling No.RT 14, Kb. IX, Kec. Sungai Gelam, Kabupaten Muaro Jambi, Jambi 36364', 0, 1, 'C');
       $pdf->Line(10,30,205,30);
        $pdf->Ln(10);

        // $pdf->AddPage('P', 'Letter');
        $pdf->SetFont('Times', 'B', 16);
        $pdf->Cell(190, 7, 'Laporan ' . ucfirst($status), 0, 1, 'C');
        $pdf->SetFont('Times', '', 10);
        $pdf->Cell(190, 4, 'Tanggal : ' . $tanggal, 0, 1, 'C');
        $pdf->Ln(10);

        $pdf->SetFont('Arial', 'B', 10);

        $total = 0;
        if ($status == 'Dipinjam') :
            
            $pdf->Cell(10, 7, 'No.', 1, 0, 'C');
            $pdf->Cell(25, 7, 'No Pinjam', 1, 0, 'C');
            $pdf->Cell(85, 7, 'Peminjam', 1, 0, 'C');
            $pdf->Cell(45, 7, 'Tanggal Pinjam', 1, 0, 'C');
            $pdf->Cell(30, 7, 'Kode Buku', 1, 0, 'C');
            $pdf->Ln();

            $no = 1;
            foreach ($data as $d) {
                $pdf->SetFont('Arial', '', 10);
                $pdf->Cell(10, 7, $no++ . '.', 1, 0, 'C');
                $pdf->Cell(25, 7, $d->no_pinjam, 1, 0, 'C');
                $pdf->Cell(85, 7, $d->nama, 1, 0, 'L');
                $pdf->Cell(45, 7, $d->tgl_pinjam, 1, 0, 'L');
                $pdf->Cell(30, 7, $d->kd_buku, 1, 0, 'C');
                $pdf->Ln();
                // $total += $d->jumlah;
            }
            // $pdf->Cell(120, 7, 'Jumlah', 1, 0, 'L');
            // $pdf->Cell(45, 7, "Rp. " . number_format($total), 1, 0, 'C');
            // $pdf->Ln();
        else :
            $pdf->Cell(10, 7, 'No.', 1, 0, 'C');
            $pdf->Cell(25, 7, 'No Pinjam', 1, 0, 'C');
            $pdf->Cell(85, 7, 'Peminjam', 1, 0, 'C');
            $pdf->Cell(45, 7, 'Tanggal Kembali', 1, 0, 'C');
            $pdf->Cell(30, 7, 'Kode Buku', 1, 0, 'C');
            $pdf->Ln();

            $no = 1;
            foreach ($data as $d) {
                $pdf->SetFont('Arial', '', 10);
                $pdf->Cell(10, 7, $no++ . '.', 1, 0, 'C');
                $pdf->Cell(25, 7, $d->no_pinjam, 1, 0, 'C');
                $pdf->Cell(85, 7, $d->nama, 1, 0, 'L');
                $pdf->Cell(45, 7, $d->tgl_kembali, 1, 0, 'L');
                $pdf->Cell(30, 7, $d->kd_buku, 1, 0, 'C');
                $pdf->Ln();
            }
            // $pdf->Cell(10, 7, '', 0, 0, 'C');
            // $pdf->Cell(120, 7, 'Jumlah', 1, 0, 'L');
            // $pdf->Cell(55, 7, "Rp. " . number_format($total), 1, 0, 'C');
            // $pdf->Ln();
        endif;


        $file_name = $status . ' ' . $tanggal;
        $pdf->Output('I', $file_name);
    }
}
