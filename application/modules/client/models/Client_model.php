<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Client_model extends CI_Model
{
    public $type_id = 0;

    function __construct()
    {
        parent::__construct();
    }

    public function type() {
        $this->db->where("type_id", 0);
        return $this;
    }

    public function active($a = 1) {
        $this->db->where("active", $a);
        return $this;
    }
    
    public function get_client_by_hash($hash) {
        return $this->db->get_where('clients', array("token"=>$hash,'active'=>1))->row_array();
    }

    /*
     * Get client by id
     */
    function get_client($id)
    {
        return $this->db->get_where('clients',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all clients count
     */
    function get_all_clients_count()
    {
        $this->db->from('clients');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all clients
     */
    function get_all_clients($params = array())
    {
        $this->db->order_by('id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('clients')->result_array();
    }
        
    /*
     * function to add new client
     */
    function add_client($params)
    {
        $this->db->insert('clients',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update client
     */
    function update_client($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('clients',$params);
    }
    
    /*
     * function to delete client
     */
    function delete_client($id)
    {
        return $this->db->delete('clients',array('id'=>$id));
    }
}
