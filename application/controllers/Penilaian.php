<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Penilaian extends BaseController
{

    public function detailPekerjaan()
    {
        $data['me'] = cekSession();

        $searchText = $this->input->post('searchText');
        $data['searchText'] = $searchText;
        $order = $this->input->post('orderby');
        $data['order'] = $order;
        $data['listPekerjaan'] = $this->Penilaian_model->listPekerjaan($searchText, $order);
        $data['title'] = 'Daftar Pekerjaan Karyawan';
        $data['active'] = 'Pekerjaan';

        $this->global['page_title'] = 'Penilaian - BAPENDA';
        $this->loadViewsAdmin('pekerjaan/detailPekerjaan', $this->global, $data, NULL, TRUE);
    }

    function detailTugas()
    {
        $user_id = $this->input->post('id_user');

        $data = $this->Penilaian_model->getDetailTugasInfo($user_id);

        echo json_encode($data);
    }

    public function penilaian()
    {
        $data['me'] = cekSession();

        $searchText = $this->input->post('searchText');
        $data['searchText'] = $searchText;
        $order = $this->input->post('orderby');
        $data['order'] = $order;
        $data['listPenilaian'] = $this->Penilaian_model->listPekerjaan($searchText, $order);
        $data['title'] = 'Penilaian Karyawan';
        $data['active'] = 'Penilaian';

        $this->global['page_title'] = 'Penilaian - BAPENDA';
        $this->loadViewsAdmin('pekerjaan/penilaian_karyawan', $this->global, $data, NULL, TRUE);
    }

    function updateNilai($user_id)
    {
        $data['me'] = cekSession();

        $data['listPenilaian'] = $this->Penilaian_model->getDetailTugasInfo($user_id);

        $data['title'] = 'Penilaian Karyawan';
        $data['active'] = 'Penilaian';

        $this->global['page_title'] = 'Penilaian - BAPENDA';
        $this->loadViewsAdmin('pekerjaan/updateNilaiKaryawan', $this->global, $data, NULL, TRUE);
    }

    function updateNilaiKaryawan()
    {
        $me = cekSession();
        $post = $this->input->post(NULL);
        // pre($post);

        for ($i = 0; $i < count($post['nik']); $i++) {
            $nik = $post['nik'][$i];
            $pekerjaan_id = $post['pekerjaan_id'][$i];
            $nilai1 = $post['nilai1'][$i];
            $ketentuan_nilai1 = $post['ketentuan_nilai1'][$i];
            $sikap_kerja = $post['sikap_kerja'][$i];
            $nilai2 = $post['nilai2'][$i];
            $ketentuan_nilai2 = $post['ketentuan_nilai2'][$i];
            $komentar = $post['komentar'];

            $dataUpdate = [
                'nik' => $nik,
                'pekerjaan_id'  => $pekerjaan_id,
                'nilai1'  => $nilai1,
                'ketentuan_nilai1'  => $ketentuan_nilai1,
                'nilai2'  => $nilai2,
                'ketentuan_nilai2'  => $ketentuan_nilai2,
                'sikap_kerja'  => $sikap_kerja,
                'komentar'  => $komentar,
                'bulan'  => date('m'),
                'tahun'  => date('Y'),
                'update_oleh' => $me['nama'],
                'update_pada' => date('Y-m-d')
            ];

            $cekDataExist =  $this->db->get_where('penilaian', ['nik' => $nik, 'pekerjaan_id'  => $pekerjaan_id])->num_rows();
            if ($cekDataExist > 0) {
                $this->db->where(['pekerjaan_id'  => $pekerjaan_id]);
                $this->db->update('penilaian', $dataUpdate);
            } else {
                $this->db->insert('penilaian', $dataUpdate);
            }
        }

        redirect('penilaian');
    }
}
