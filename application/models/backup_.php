














    function get_by_id($id)
    {
        $query = $this->db->get_where($this->table_name,array('id'=>$id));
        return $query->row_array();
    }

    function get_all()
    {
        $query = $this->db->get($this->table_name);
        return $output;
    }

    function paginate($limit=10,$offset=0)
    {
        $query = $this->db->get($this->table_name,$limit,$offset);
        $output['result_array'] = $query->result_array();
        $output['total_rows'] = $this->db->get($this->table_name)->num_rows();
        return $output;
    }

	function get_one($id){
		$query = $this->db->get($this->table_name,array('id'=>$id));
		return $query->row();
	}

	function get_all(){

	}

    function insert($data)
    {
    	$this->db->insert($this->table_name,$data);
    }
    
    function update($id,$data)
    {
    	$this->db->where('id',$id);
    	$this->db->update($this->table_name,$data);
    }

    function delete($id)
    {
    	$this->db->delete($this->table_name,array('id'=>$id));
    }
