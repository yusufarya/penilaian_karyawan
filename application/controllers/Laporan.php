<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Laporan extends BaseController
{

    public function pekerjaan_report()
    {
        $data['me'] = cekSession();

        $data['title'] = 'Laporan Pekerjaan';
        $data['active'] = 'Laporan';

        $data['karyawan'] = $this->db->get_where('users', ['divisi_id <>' => 0])->result_array();
        $data['divisi'] = $this->db->get_where('divisi', ['id >' => 1])->result_array();
        $data['jabatan'] = $this->db->get('jabatan')->result_array();

        $this->global['page_title'] = 'Laporan Pekerjaan - BAPENDA';
        $this->loadViewsAdmin('laporan/pekerjaan_report', $this->global, $data, NULL, TRUE);
    }

    function getLapPekerjaan()
    {
        $karyawan = $this->input->post('karyawan');
        $jab = $this->input->post('jab');
        $div = $this->input->post('div');
        $tanggal = $this->input->post('tgl');
        $tanggal1 = $this->input->post('tgl1');
        $data = [
            'karyawan'  => $karyawan,
            'jabatan'  => $jab,
            'divisi'  => $div,
            'tanggal'  => $tanggal,
            'tanggal1'  => $tanggal1,
        ];
        $status = $this->session->set_userdata($data);
        echo json_encode($status);
    }

    function getLapPekerjaanRpt()
    {
        $criteria = '';
        $karyawan = $this->session->userdata('karyawan');
        $jabatan = $this->session->userdata('jabatan');
        $divisi = $this->session->userdata('divisi');
        $tanggal = $this->session->userdata('tanggal');
        $tanggal1 = $this->session->userdata('tanggal1');

        if ($karyawan) {
            $criteria = 'AND u.id = "' . $karyawan . '" ';
        }
        if ($jabatan) {
            $criteria = 'AND jab.id = "' . $jabatan . '" ';
        }
        if ($divisi) {
            $criteria = 'AND div.id = "' . $divisi . '" ';
        }

        $DSQL = 'SELECT DISTINCT k.*, u.nik, u.nama AS namakaryawan, d.nama AS divisi, j.nama AS jabatan
                    FROM pekerjaan k
                    JOIN users AS u ON u.id=k.user_id
                    JOIN divisi AS d ON d.id=u.divisi_id
                    JOIN jabatan AS j ON j.id=u.jabatan_id
                    WHERE k.tanggal BETWEEN "' . $tanggal . '" AND  "' . $tanggal1 . '" ';

        if ($criteria) {
            $DSQL .= $criteria;
        }

        $DSQL .= "ORDER BY u.nama";
        // pre($DSQL);

        $dataLap = $this->db->query($DSQL)->result();
        $data['dataLap'] = $dataLap;

        $this->load->view('laporan/pekerjaan_rpt', $data);
    }

    public function penilaian_report()
    {
        $data['me'] = cekSession();

        $data['title'] = 'Laporan Penilaian';
        $data['active'] = 'Laporan';
        $data['karyawan'] = $this->db->get_where('users', ['divisi_id <>' => 0])->result_array();
        $data['divisi'] = $this->db->get_where('divisi', ['id >' => 1])->result_array();
        $data['jabatan'] = $this->db->get('jabatan')->result_array();

        $this->global['page_title'] = 'Laporan Penilaian - BAPENDA';
        $this->loadViewsAdmin('laporan/penilaian_report', $this->global, $data, NULL, TRUE);
    }

    function getLapPenilaian()
    {
        $karyawan = $this->input->post('karyawan');
        $jab = $this->input->post('jab');
        $div = $this->input->post('div');
        $tanggal = $this->input->post('tgl');
        $tanggal1 = $this->input->post('tgl1');
        $data = [
            'karyawan'  => $karyawan,
            'jabatan'  => $jab,
            'divisi'  => $div,
            'tanggal'  => $tanggal,
            'tanggal1'  => $tanggal1,
        ];
        $status = $this->session->set_userdata($data);
        echo json_encode($status);
    }

    function getLapPenilaianRpt()
    {
        $criteria = '';
        $karyawan = $this->session->userdata('karyawan');
        $jabatan = $this->session->userdata('jabatan');
        $divisi = $this->session->userdata('divisi');
        $tanggal = $this->session->userdata('tanggal');
        $tanggal1 = $this->session->userdata('tanggal1');

        if ($karyawan) {
            $criteria = 'AND u.id = "' . $karyawan . '" ';
        }
        if ($jabatan) {
            $criteria = 'AND j.id = "' . $jabatan . '" ';
        }
        if ($divisi) {
            $criteria = 'AND d.id = "' . $divisi . '" ';
        }

        $DSQL = 'SELECT DISTINCT p.*, k.uraian_tugas, k.output_kerja, k.tanggal, 
                u.nik, u.nama AS namakaryawan, d.nama AS divisi, j.nama AS jabatan
                FROM penilaian p
                JOIN users AS u ON u.nik=p.nik
                JOIN pekerjaan AS k ON k.id=p.pekerjaan_id 
                JOIN divisi AS d ON d.id=u.divisi_id
                JOIN jabatan AS j ON j.id=u.jabatan_id
                WHERE k.tanggal BETWEEN "' . $tanggal . '" AND  "' . $tanggal1 . '" ';

        if ($criteria) {
            $DSQL .= $criteria;
        }

        $DSQL .= "ORDER BY u.nama";
        // pre($DSQL);

        $dataLap = $this->db->query($DSQL)->result();
        $data['dataLap'] = $dataLap;
        $data['me'] = cekSession();;

        $this->load->view('laporan/penilaian_rpt', $data);
    }
}
