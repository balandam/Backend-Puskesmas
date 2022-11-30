<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mo_res extends CI_Model {

    function getWhere($table, $where,$select = '*',$limit = null,$offset = null,$order = null,$groupBy = null){

        $this->db->select($select);
        $this->db->from($table);
        $this->db->where($where);

        if($limit !== null && $offset !== null){
            $this->db->limit($limit,$offset);
        }

        if($order !== null){
            $this->db->order_by($order);
        }

        if($groupBy !== null){
            $this->db->group_by($groupBy);
        }
        
        $result = $this->db->get();
        return array("row"=>$result->num_rows(),"data"=>$result->result_array());


    }

    function input($table,$data){

        $this->db->insert($table,$data);    
        return $insert_id = $this->db->insert_id();

    }

    function update($from = null , $data = null , $where =null){
		
		$this->db->where($where);
		$this->db->update($from, $data);
    }

    function Wherein($from= null,$column = null,$wherein = null,$order = null){
        $this->db->select('*');
        $this->db->from($from);
        $this->db->where_in($column,$wherein);
        $this->db->order_by($order);
        $query = $this->db->get();
        return array('data' => $query->result_array() , 'row'=>$query->num_rows());
    }

    function hapus($from,$where){
    	$this->db->delete($from, $where);
    }
    
    function getAll($from = null,$select = '*',$order = null,$group = null){
        $this->db->select($select);
        $this->db->from($from);

        if($order !== null){
            $this->db->order_by($order);
        }

        if($group !== null){
            $this->db->group_by($group);
        }

        $query = $this->db->get();
        return array('data' => $query->result_array() , 'row'=>$query->num_rows());
    }

    function getGroup($from = null,$where = null,$by = null,$order=null){
        $this->db->from($from);
        $this->db->group_by($by);
        if($where != null){
            $this->db->where($where);
        }
        if($order != null){
            $this->db->order_by($order);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    function sum($sum = null,$as = null,$from = null,$where = null){
        $this->db->select("sum(".$sum.") as ".$as."");
        $this->db->from($from);
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result_array();
    }

    function count($count = null,$as = null,$from = null,$where = null){
        $this->db->select("count(".$count.") as ".$as."");
        $this->db->from($from);
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result_array();
    }
}