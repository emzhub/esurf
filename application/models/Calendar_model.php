<?php

class Calendar_Model extends MY_Model
{

    public function get_events($start, $end) 
    {
        return $this->db
            ->where("start >=", $start)
            ->where("end <=", $end)
            ->get("es_calendar");
    }

    public function add_event($data) 
    {
        $this->db->insert("es_calendar", $data);
    }

    public function get_event($id) 
    {
        return $this->db->where("id", $id)->get("es_calendar");
    }

    public function update_event($id, $data) 
    {
        $this->db->where("id", $id)->update("es_calendar", $data);
    }

    public function delete_event($id) 
    {
        $this->db->where("id", $id)->delete("es_calendar");
    }


 public function get_t_events($start, $end) 
    {
        return $this->db
            ->where("start >=", $start)
            ->where("end <=", $end)
            ->get("es_time_table");
    }

    public function add_t_event($data) 
    {
        $this->db->insert("es_time_table", $data);
    }

    public function get_t_event($id) 
    {
        return $this->db->where("id", $id)->get("es_time_table");
    }

    public function update_t_event($id, $data) 
    {
        $this->db->where("id", $id)->update("es_time_table", $data);
    }

    public function delete_t_event($id) 
    {
        $this->db->where("id", $id)->delete("es_time_table");
    }




}

?>