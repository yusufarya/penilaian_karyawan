<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Karyawan extends BaseController
{

    public function index()
    {
        $data['me'] = cekSession();

        $searchText = $this->input->post('searchText');
        $data['searchText'] = $searchText;
        $order = $this->input->post('orderby');
        $data['order'] = $order;
        // $data['dataAspekN'] = $this->Penilaian_model->listDetailPekerjaan($searchText, $order);
        $data['title'] = 'Detail Pekerjaan';
        $data['active'] = 'Index';

        $this->global['page_title'] = 'Penilaian - BAPENDA';
        $this->loadViews('karyawan/home', $this->global, $data, NULL, TRUE);
    }

    public function daftar_kerja()
    {
        $data['me'] = cekSession();

        $user_id = $data['me']['id'];

        $searchText = $this->input->post('searchText');
        $data['searchText'] = $searchText;
        $order = $this->input->post('orderby');
        $data['order'] = $order;
        $data['dataTugas'] = $this->Penilaian_model->listDetailPekerjaan($searchText, $order, $user_id);
        $data['title'] = 'Daftar Pekerjaan';
        $data['active'] = 'Pekerjaan';

        $this->global['page_title'] = 'Penilaian - BAPENDA';
        $this->loadViews('karyawan/daftarPekerjaan', $this->global, $data, NULL, TRUE);
    }

    function addTugas()
    {
        $user = cekSession();
        $post = $this->input->post(NULL);

        $uraian_tugas = $post['uraian'];
        $output_kerja = $post['output'];

        $data = [
            'uraian_tugas' => $uraian_tugas,
            'output_kerja' => $output_kerja,
            'tanggal' => date('Y-m-d'),
            'user_id' => $user['id'],
            'update_oleh' => $user['nama'],
            'update_pada' => date('Y-m-d')
        ];
        $result = $this->db->insert('pekerjaan', $data);

        if ($result) {
            $datatgs = $this->db->get_where('pekerjaan', ['user_id' => $user['id']])->result_array();
            // pre($datatgs);
            foreach ($datatgs as $tr) {
                $dataN = $this->db->get_where('penilaian', ['nik' => $user['nik'], 'pekerjaan_id' => $tr['id']])->result_array();
                if ($dataN) {
                    // pre($tr['id']);
                } else {
                    $this->db->insert('penilaian', ['pekerjaan_id' => $tr['id'], 'nik' => $user['nik']]);
                }
            }
            redirect('daftar_kerja');
        }
    }

    function updateTugas()
    {
        $user = cekSession();
        $post = $this->input->post(NULL);

        $eid = $post['eid'];
        $uraian_tugas = $post['e_uraian'];
        $output_kerja = $post['e_output'];

        $data = [
            'uraian_tugas' => $uraian_tugas,
            'output_kerja' => $output_kerja,
            'user_id' => $user['id'],
            'update_oleh' => $user['nama'],
            'update_pada' => date('Y-m-d')
        ];
        $this->db->where(['id' => $eid]);
        $result = $this->db->update('pekerjaan', $data);

        if ($result) {
            redirect('daftar_kerja');
        }
    }

    function deleteTugas()
    {

        $id = $this->input->post('del_id');
        $this->db->where(['id' => $id]);
        $result = $this->db->delete('pekerjaan');
        if ($result) {
            $this->db->where(['pekerjaan_id' => $id]);
            $this->db->delete('penilaian');
            redirect('daftar_kerja');
        }
    }

    function getTugas()
    {

        $id = $this->input->post('id');
        $resultData = $this->Penilaian_model->getTugasInfo($id);

        echo json_encode($resultData);
    }

    public function penilaian_saya()
    {
        $data['me'] = cekSession();

        $searchText = $this->input->post('searchText');
        $data['searchText'] = $searchText;
        $order = $this->input->post('orderby');
        $data['order'] = $order;
        $data['listPenilaian'] = $this->Penilaian_model->listPekerjaan($searchText, $order);
        $data['title'] = 'Daftar Penilaian';
        $data['active'] = 'Penilaian';

        $this->global['page_title'] = 'Penilaian - BAPENDA';
        $this->loadViews('karyawan/penilaian_saya', $this->global, $data, NULL, TRUE);
    }

    function detail_nilai_saya($nik)
    {
        $data['me'] = cekSession();

        $data['listPenilaian'] = $this->Penilaian_model->listPenilaianKaryawan('', '', $nik);

        $data['title'] = 'Detail Penilaian';
        $data['active'] = 'Penilaian';

        $this->global['page_title'] = 'Penilaian - BAPENDA';
        $this->loadViews('karyawan/detailPenilaian', $this->global, $data, NULL, TRUE);
    }
}
