<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    
    function listTransaksi($searchText = '', $orderText = '') {
        $this->db->distinct();
        $this->db->select('tr.*, u.nama AS nama_sales');
        $this->db->from('transaksi tr'); 
        $this->db->join('users AS u', 'u.nik=tr.sales', 'left'); 
        if($searchText) {
            $this->db->like('nama_barang', $searchText)->or_like('u.nama', $searchText);
        }
        if($orderText == 'kode') {
            $this->db->order_by('tr.kode', 'ASC');
        } else if($orderText == 'barang') {
            $this->db->order_by('tr.nama_barang', 'ASC');
        } else if($orderText == 'sales'){
            $this->db->order_by('u.nama', 'ASC');
        } else {
            $this->db->order_by('tr.kode', 'DESC');
        }
        return $this->db->get()->result_array(); 
    }

    function getTrInfo($kode) {
        $query = "SELECT * FROM `transaksi` WHERE kode = '".$kode."' ";
        $data = $this->db->query($query);
        $result = $data->row_array(); 
        return $result;
    }  

    function listTransaksiMe($nik, $searchText = '', $orderText = '') {
        $this->db->distinct();
        $this->db->select('tr.*, u.nama AS nama_sales');
        $this->db->from('transaksi tr'); 
        $this->db->join('users AS u', 'u.nik=tr.sales', 'left'); 
        $this->db->where('tr.sales', $nik);
        if($searchText) {
            $this->db->like('nama_barang', $searchText)->or_like('u.nama', $searchText);
        }
        if($orderText == 'kode') {
            $this->db->order_by('tr.kode', 'ASC');
        } else if($orderText == 'barang') {
            $this->db->order_by('tr.nama_barang', 'ASC');
        } else if($orderText == 'sales'){
            $this->db->order_by('u.nama', 'ASC');
        } else {
            $this->db->order_by('tr.kode', 'DESC');
        }
        return $this->db->get()->result_array(); 
    }
    
}