<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_model extends CI_Model
{      
    function listDivisi($searchText = '', $orderText = '') {
        $this->db->distinct();
        $this->db->select('div.*');
        $this->db->from('divisi div');  
        if($searchText) {
            $this->db->like('div.inisial', $searchText)->or_like('div.nama', $searchText);
        }
        if($orderText == 'inisial') {
            $this->db->order_by('div.inisial', 'ASC');
        } else if($orderText == 'nama') {
            $this->db->order_by('div.nama', 'ASC'); 
        } else {
            $this->db->order_by('div.inisial', 'DESC');
        }
        return $this->db->get()->result_array(); 
    }

    function getDivisiInfo($inisial) {
        $query = "SELECT * FROM `divisi` WHERE inisial = '".$inisial."' ";
        $data = $this->db->query($query);
        $result = $data->row_array(); 
        return $result;
    }  
    
    function getDivisi() {
        $query = "SELECT * FROM `divisi` ";
        $data = $this->db->query($query);
        $result = $data->result_array(); 
        return $result;
    }   

    function listPosition($searchText = '', $orderText = '') {
        $this->db->distinct();
        $this->db->select('jab.*');
        $this->db->from('jabatan jab');  
        if($searchText) {
            $this->db->like('jab.inisial', $searchText)->or_like('jab.nama', $searchText);
        }
        if($orderText == 'inisial') {
            $this->db->order_by('jab.inisial', 'ASC');
        } else if($orderText == 'nama') {
            $this->db->order_by('jab.nama', 'ASC'); 
        } else if($orderText == 'level') {
            $this->db->order_by('jab.level', 'ASC'); 
        } else {
            $this->db->order_by('jab.inisial', 'DESC');
        }
        return $this->db->get()->result_array(); 
    }

    function getPositionInfo($inisial) {
        $query = "SELECT * FROM `jabatan` WHERE inisial = '".$inisial."' ";
        $data = $this->db->query($query);
        $result = $data->row_array(); 
        return $result;
    }  
    
    function getJabatan() {
        $query = "SELECT * FROM `jabatan` ";
        $data = $this->db->query($query);
        $result = $data->result_array(); 
        return $result;
    }   
    
    function listEmployee($searchText = '', $orderText = '') {
        $this->db->distinct();
        $this->db->select('us.*, div.nama AS divisi, jab.nama AS jabatan');
        $this->db->from('users us');  
        $this->db->join('divisi AS div', 'div.id=us.divisi_id');  
        $this->db->join('jabatan AS jab', 'jab.id=us.jabatan_id');  
        if($searchText) {
            $this->db->like('us.nik', $searchText)->or_like('us.nama', $searchText);
        }
        if($orderText == 'nik') {
            $this->db->order_by('us.nik', 'ASC');
        } else if($orderText == 'nama') {
            $this->db->order_by('us.nama', 'ASC'); 
        } else if($orderText == 'jabatan') {
            $this->db->order_by('jab.level', 'ASC'); 
        } else {
            $this->db->order_by('us.nik', 'DESC');
        }
        return $this->db->get()->result_array(); 
    }

    function getEmployeeInfo($nik) {
        $query = "SELECT * FROM `users` WHERE nik = '".$nik."' ";
        $data = $this->db->query($query);
        $result = $data->row_array(); 
        return $result;
    } 
}