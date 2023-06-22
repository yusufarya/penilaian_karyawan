<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Employee extends BaseController
{
    function divisiList()
    {
        cekSession();
        $cekSession = cekSession();

        $data['me'] = $cekSession;
        $data['title'] = 'Data Divisi';
        $data['active'] = 'Employee';

        $searchText = $this->input->post('searchText');
        $data['searchText'] = $searchText;
        
        $order = $this->input->post('orderby'); 
        $data['order'] = $order;

        
        $data['dataDivisi'] = $this->Master_model->listDivisi($searchText, $order);

        $this->global['page_title'] = 'Data Divisi - BAPENDA';
        $this->loadViewsAdmin('employee/divisi', $this->global, $data, NULL, TRUE);
    } 

    function addDivisi()
    {
        cekSession();
        $cekSession = cekSession();

        $data['me'] = $cekSession;
        $data['title'] = 'Tambah Data Divisi';
        $data['active'] = 'Employee';

        $this->global['page_title'] = 'Tambah Data Divisi - BAPENDA';
        $this->loadViewsAdmin('employee/addDivisi', $this->global, $data, NULL, TRUE);
    }

    function addDivisi_()
    {
        $me = cekSession();
        $this->load->library('form_validation');

        $this->form_validation->set_rules('inisial','Inisial','trim|required', [
            'required' => 'Inisial belum dipilih'
        ]); 

        $this->form_validation->set_rules('nama','Nama','trim|required', [
            'required' => 'nama belum dipilih'
        ]); 

        if($this->form_validation->run() == FALSE) { 
            $this->addDivisi();
        } else {

            $inisial = $this->input->post('inisial');
            $nama = $this->input->post('nama');
            
            $dataInsert = [
                'inisial'        => $inisial,
                'nama' => $nama,
                'update_oleh' => $me['nama'],
                'update_pada' => date('Y-m-d') 
            ];

            $hasil = $this->db->insert('divisi', $dataInsert);
            if($hasil) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil.</strong> 1 data Divisi berhasil ditambahkan!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect('divisiList');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Proses gagal!</strong> Silahkan hubungi administrator.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
                redirect('addDivisi');
            }
        }
    }

    function editDivisi($kode) {
        
        $data['me'] = cekSession();;
        $data['title'] = 'Ubah Divisi';
        $data['active'] = 'Employee'; 
        $data['divInfo'] = $this->Master_model->getDivisiInfo($kode); 

        $this->global['page_title'] = 'Ubah Data Divisi - BAPENDA';
        $this->loadViewsAdmin('employee/editDivisi', $this->global, $data, NULL, TRUE);
    }

    function updateDivisi()
    {
        $me = cekSession();

        $id = $this->input->post('id'); 
        $inisial = $this->input->post('inisial');
        $nama = $this->input->post('nama');
        
        $dataUpdate = [ 
            'inisial' => $inisial,
            'nama'  => $nama, 
            'update_oleh' => $me['nama'],
            'update_pada' => date('Y-m-d') 
        ];
        $this->db->where('id', $id);
        $hasil = $this->db->Update('divisi', $dataUpdate);
        if($hasil) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil.</strong> 1 data divisi berhasil di perbaharui!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('divisiList');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Proses gagal!</strong> Silahkan hubungi administrator.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('divisiList');
        }
    }
    
    // POSITION / JABATAN //
    function positionList()
    {
        cekSession();
        $cekSession = cekSession();

        $data['me'] = $cekSession;
        $data['title'] = 'Data Jabatan';
        $data['active'] = 'Employee';

        $searchText = $this->input->post('searchText');
        $data['searchText'] = $searchText;
        
        $order = $this->input->post('orderby'); 
        $data['order'] = $order;

        
        $data['dataPosition'] = $this->Master_model->listPosition($searchText, $order);

        $this->global['page_title'] = 'Data Jabatan - BAPENDA';
        $this->loadViewsAdmin('employee/position', $this->global, $data, NULL, TRUE);
    } 

    function addPosition()
    {
        cekSession();
        $cekSession = cekSession();

        $data['me'] = $cekSession;
        $data['title'] = 'Tambah Data Jabatan';
        $data['active'] = 'Employee';

        $this->global['page_title'] = 'Tambah Data Jabatan - BAPENDA';
        $this->loadViewsAdmin('employee/addPosition', $this->global, $data, NULL, TRUE);
    }

    function addPosition_()
    {
        $me = cekSession();
        $this->load->library('form_validation');

        $this->form_validation->set_rules('inisial','Inisial','trim|required', [
            'required' => 'Inisial belum dipilih'
        ]); 

        $this->form_validation->set_rules('nama','Nama','trim|required', [
            'required' => 'nama belum dipilih'
        ]); 

        $this->form_validation->set_rules('level','Level','trim|required', [
            'required' => 'level belum dipilih'
        ]); 

        if($this->form_validation->run() == FALSE) { 
            $this->addPosition();
        } else {

            $inisial = $this->input->post('inisial');
            $nama = $this->input->post('nama');
            $level = $this->input->post('level');
            
            $dataInsert = [
                'inisial'        => $inisial,
                'nama' => $nama,
                'level' => $level,
                'update_oleh' => $me['nama'],
                'update_pada' => date('Y-m-d') 
            ];

            $hasil = $this->db->insert('jabatan', $dataInsert);
            if($hasil) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil.</strong> 1 data Divisi berhasil ditambahkan!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect('positionList');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Proses gagal!</strong> Silahkan hubungi administrator.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
                redirect('addDivisi');
            }
        }
    }

    function editPosition($kode) {
        
        if($kode == '') {
            redirect('positionList');
        }
        $data['me'] = cekSession();;
        $data['title'] = 'Ubah Jabatan';
        $data['active'] = 'Employee'; 
        $data['divInfo'] = $this->Master_model->getPositionInfo($kode); 

        $this->global['page_title'] = 'Ubah Data Jabatan - BAPENDA';
        $this->loadViewsAdmin('employee/editPosition', $this->global, $data, NULL, TRUE);
    }

    function updatePosition()
    {
        $me = cekSession();

        $id = $this->input->post('id'); 
        $inisial = $this->input->post('inisial');
        $nama = $this->input->post('nama');
        $level = $this->input->post('level');
        
        $dataUpdate = [ 
            'inisial' => $inisial,
            'nama'  => $nama, 
            'level'  => $level, 
            'update_oleh' => $me['nama'],
            'update_pada' => date('Y-m-d') 
        ];
        $this->db->where('id', $id);
        $hasil = $this->db->Update('jabatan', $dataUpdate);
        if($hasil) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil.</strong> 1 data divisi berhasil di perbaharui!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('positionList');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Proses gagal!</strong> Silahkan hubungi administrator.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('positionList');
        }
    }

    function getUser() {
        $id = $this->input->post('id');
        $getUserfo = $this->User_model->getUserfo($id);

        echo json_encode($getUserfo);
    } 
    
    // EMPLOYEE / KARYAWAN //
    function empployeeList()
    {
        cekSession();
        $cekSession = cekSession();

        $data['me'] = $cekSession;
        $data['title'] = 'Data Karyawan';
        $data['active'] = 'Employee';

        $searchText = $this->input->post('searchText');
        $data['searchText'] = $searchText;
        
        $order = $this->input->post('orderby'); 
        $data['order'] = $order;
        
        $data['dataEmp'] = $this->Master_model->listEmployee($searchText, $order);
        
        $data['jabatan'] = $this->db->order_by('level')->get('jabatan')->result_array();
        $data['divisi'] = $this->db->order_by('id')->get('divisi')->result_array();

        $this->global['page_title'] = 'Data Karyawn - BAPENDA';
        $this->loadViewsAdmin('employee/employee', $this->global, $data, NULL, TRUE);
    } 

    function addEmployee()
    {
        cekSession();
        $cekSession = cekSession();

        $data['me'] = $cekSession;
        $data['title'] = 'Tambah Data Jabatan';
        $data['active'] = 'Employee';

        $this->global['page_title'] = 'Tambah Data Jabatan - BAPENDA';
        $this->loadViewsAdmin('employee/addEmployee', $this->global, $data, NULL, TRUE);
    }

    function addEmp() {
        $email = $this->input->post('email', true); 
        $new_date = date('Y-m-d');
        $divisi_id = $this->input->post('divisi_id');
        
        $qry = "SELECT MAX(nik) AS nik FROM `users` ";
        $data = $this->db->query($qry)->row_array();
        $nik = $data['nik'];
        if ($nik) {
            $nomor = substr($nik, -3);
            $urut = $nomor+1;
            $urut = sprintf('%03d', $urut);
            $nik = 'BPD'.date('ymd').$urut; 
        } else {
            $nik = 'BPD'.date('ymd').'001';
        } 

        $data = [
            'nik'       => $nik,
            'nama'      => ucwords($this->input->post('nama')),
            'jenis_kel' => $this->input->post('jenis_kel'),
            'alamat'    => ucwords($this->input->post('alamat')),
            'no_telp'   => $this->input->post('no_telp'),
            'email'     => $email,
            'password'  => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'status'    => 1,
            'jabatan_id'=> $this->input->post('jabatan_id'),
            'divisi_id' => $divisi_id,
            'tgl_dibuat'=> $new_date
        ];

        $result = $this->db->insert('users', $data); 
        if ($result) {
            echo json_encode('success');
        } else{
            echo json_encode('failed');
        }
    }
    
    function updateEmp() {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $no_telp = $this->input->post('no_telp');
        $alamat = $this->input->post('alamat');
        $status = $this->input->post('status');
        $jabatan_id = $this->input->post('jabatan_id');
        $divisi_id = $this->input->post('divisi_id');

        $dataUpdate = [
            'nama'      => $nama,
            'no_telp'   => $no_telp,
            'alamat'    => $alamat,
            'status'    => $status,
            'divisi_id' => $divisi_id,
            'jabatan_id'=> $jabatan_id,
        ];
        $this->db->where('id', $id);
        $res = $this->db->update('users', $dataUpdate);
        if ($res == 1) {
            echo json_encode('success');
        } else {
            echo json_encode('error');
        }
    }

}
