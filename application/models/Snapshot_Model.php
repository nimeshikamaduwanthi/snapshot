<?php
class Snapshot_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database(); 
    } 

    public function saveTask($data)
    {
        $this->db->insert('tasks', $data);
        return $this->db->insert_id();
    }

    public function viewTasks()
    {

        $query = $this->db->query(
					'SELECT P.project_name, TN.task_name, T.planned_effort, T.planned_start_date, T.planned_end_date,
					T.mon_p, T.mon_a, T.tue_p, T.tue_a, T.wen_p, T.wen_a, T.thu_p, T.thu_a, T.fri_p,
					T.fri_a, T.sat_p, T.sat_a, T.sun_p, T.sun_a
					FROM projects P, tasks T, task_names TN
					WHERE P.id = T.project_id
					AND TN.id = T.task_name_id'
					
            // 'SELECT W.start_date, P.project_name, TN.task_name, T.planned_effort, T.planned_start_date, T.planned_end_date,
						// T.mon_p, T.mon_a, T.tue_p, T.tue_a, T.wen_p, T.wen_a, T.thu_p, T.thu_a, T.fri_p,
						// T.fri_a, T.sat_p, T.sat_a, T.sun_p, T.sun_a
						// FROM weeks W, projects P, tasks T, task_names TN
						// WHERE P.id = T.project_id
						// AND TN.id = T.task_name_id
						// AND W.id = T.weeks_id'
        );
        return $query->result_array();
		}
  }		