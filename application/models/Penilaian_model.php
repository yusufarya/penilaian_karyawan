<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian_model extends CI_Model
{

    function listPekerjaan($searchText = '', $orderText = '')
    {
        // $this->db->distinct();
        $this->db->select(' users.*, jab.nama AS jabatan, div.nama AS divisi, k.tanggal');
        $this->db->join(' pekerjaan AS k', 'k.user_id=users.id');
        $this->db->join(' jabatan AS jab', 'jab.id=users.jabatan_id');
        $this->db->join(' divisi AS div', 'div.id=users.divisi_id');
        $this->db->from('users');
        $this->db->where('divisi_id <>', 0);
        if ($searchText) {
            $this->db->like('nama', $searchText)->or_like('keterangan', $searchText);
        }
        $this->db->order_by('nama', 'ASC');
        // if ($orderText) {
        // }
        return $this->db->get()->result_array();
    }

    function listDetailPekerjaan($searchText = '', $orderText = '', $id_user = '')
    {
        $this->db->distinct();
        $this->db->select('pekerjaan.*, users.nama as namakaryawan');
        $this->db->from('pekerjaan');
        $this->db->join('users', 'users.id=pekerjaan.user_id');
        if ($id_user) {
            $this->db->where('users.id', $id_user);
        }
        if ($searchText) {
            $this->db->like('pekerjaan.uraian_tugas', $searchText)->or_like('pekerjaan.output_kerja', $searchText);
        }
        if ($orderText) {
            $this->db->order_by($orderText, 'ASC');
        }
        return $this->db->get()->result_array();
    }

    function getDetailTugasInfo($id_user)
    {
        $this->db->distinct();
        $this->db->select('pekerjaan.*, users.nama as namakaryawan, users.nik');
        $this->db->from('pekerjaan');
        $this->db->join('users', 'users.id=pekerjaan.user_id');
        $this->db->where('users.id', $id_user);
        return $this->db->get()->result_array();
    }

    function getTugasInfo($id)
    {
        $query = "SELECT * FROM `pekerjaan` WHERE id = '" . $id . "' ";
        $data = $this->db->query($query);
        $result = $data->row_array();
        return $result;
    }

    function listPenilaianKaryawan($searchText = '', $orderText = '', $nik = '')
    {
        $this->db->distinct();
        $this->db->select('n.*, k.uraian_tugas, k.output_kerja, k.tanggal, u.nama AS nama_keryawan');
        $this->db->from('penilaian n');
        $this->db->join('pekerjaan AS k', 'k.id = n.pekerjaan_id', 'left');
        $this->db->join('users AS u', 'u.nik=n.nik');
        if ($nik) {
            $this->db->where('n.nik', $nik);
        }
        if ($searchText) {
            $this->db->like('n.nik', $searchText);
        }
        if ($orderText) {
            $this->db->order_by('n.' . $orderText, 'ASC');
        } else {
            $this->db->order_by('n.id', 'ASC');
        }
        return $this->db->get()->result_array();
    }

    function listPenilaianSaya($nik, $searchText = '', $orderText = '')
    {
        $this->db->distinct();
        $this->db->select('n.*, u.nama AS nama_keryawan, k.uraian_tugas, k.output_kerja');
        $this->db->from('penilaian ns');
        $this->db->join('users AS u', 'u.nik=n.nik', 'left');
        $this->db->join('pekerjaan AS k', 'k.id=n.pekerjaan_id');
        $this->db->where('n.nik', $nik);
        if ($searchText) {
            $this->db->like('n.nik', $searchText);
        }
        if ($orderText) {
            $this->db->order_by('n.' . $orderText, 'ASC');
        } else {
            $this->db->order_by('n.id', 'DESC');
        }
        return $this->db->get()->result_array();
    }
}
