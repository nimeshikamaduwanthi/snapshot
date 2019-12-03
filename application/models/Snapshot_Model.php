<?php
class Snapshot_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database(); 
    } 

    public function saveSnapshot($data)
    {      
      $this->db->insert('snapshots', $data); 
      return $this->db->insert_id();
    }

    // public function getUsers()
    // {

    // }

    public function updateSnapshot($data, $snap_id)
    {      
      $this->db->where('id', $snap_id);
      $this->db->update('snapshots', $data);
      return;
    }
     
    public function deleteSnapshot($snap_id)
    {
      $this->db->delete('snapshots', array('id' => $snap_id)); 
      
    }

  
		
    public function mySnapshots($user_id) 
    { 
        $query = $this->db->query( 
					"SELECT S.start_date, P.project_name, TN.task, S.planned_effort, S.planned_start_date, S.planned_end_date,
					S.mon_p, S.mon_a, S.tue_p, S.tue_a, S.wen_p, S.wen_a, S.thu_p, S.thu_a, S.fri_p,
					S.fri_a, S.sat_p, S.sat_a, S.sun_p, S.sun_a, S.total_planned, S.total_actual, S.id
					FROM projects P, snapshots S, tasks TN
					WHERE P.id = S.project_id
          AND TN.id = S.task_id
          /* AND P.status = '1' */
          AND S.user_id='$user_id'"
        );
        return $query->result_array();

    } 

    public function getSelectedSnapshot($snap_id) {
      $query = $this->db->query(
        "SELECT S.id,S.start_date, P.project_name, TN.task, S.planned_effort, S.planned_start_date, S.planned_end_date,
        S.mon_p, S.mon_a, S.tue_p, S.tue_a, S.wen_p, S.wen_a, S.thu_p, S.thu_a, S.fri_p,
        S.fri_a, S.sat_p, S.sat_a, S.sun_p, S.sun_a, S.id
        FROM projects P, snapshots S, tasks TN
        WHERE P.id = S.project_id
        AND TN.id = S.task_id
        AND S.id='$snap_id'"
      );

      return $query->row_array(); 
    }
    
    public function getAllSnapshots()
    {
        $query = $this->db->query(
					'SELECT S.id, S.start_date,U.first_name,  P.project_name, TN.task, S.planned_effort, S.planned_start_date, S.planned_end_date,
					S.mon_p, S.mon_a, S.tue_p, S.tue_a, S.wen_p, S.wen_a, S.thu_p, S.thu_a, S.fri_p,
					S.fri_a, S.sat_p, S.sat_a, S.sun_p, S.sun_a, S.total_planned, S.total_actual
					FROM projects P, snapshots S, tasks TN , users U
					WHERE P.id = S.project_id
          AND TN.id = S.task_id
          AND U.id = S.user_id'
          
          );
          return $query->result_array(); 
      }
 
    public function getUserSnapshots($idlist)
    {
      $query = $this->db->query(
        "SELECT S.id, S.start_date,U.first_name,  P.project_name, TN.task, S.planned_effort, S.planned_start_date, S.planned_end_date,
        S.mon_p, S.mon_a, S.tue_p, S.tue_a, S.wen_p, S.wen_a, S.thu_p, S.thu_a, S.fri_p,
        S.fri_a, S.sat_p, S.sat_a, S.sun_p, S.sun_a, S.total_planned, S.total_actual
        FROM projects P, snapshots S, tasks TN , users U
        WHERE P.id = S.project_id
        AND TN.id = S.task_id
        AND U.id = S.user_id
        AND U.id IN ($idlist)"
      );
 
      return $query->result_array();
    }

    public function getDateSnapshots($date)
    {
      $query = $this->db->query(
        "SELECT S.start_date,U.first_name,  P.project_name, TN.task, S.planned_effort, S.planned_start_date, S.planned_end_date,
        S.mon_p, S.mon_a, S.tue_p, S.tue_a, S.wen_p, S.wen_a, S.thu_p, S.thu_a, S.fri_p,
        S.fri_a, S.sat_p, S.sat_a, S.sun_p, S.sun_a, S.total_planned, S.total_actual
        FROM projects P, snapshots S, tasks TN , users U
        WHERE P.id = S.project_id
        AND TN.id = S.task_id
        AND U.id = S.user_id
        AND S.start_date = '$date'"
      );

      return $query->result_array();
    }

    public function getUserDateSnapshots($idlist,$date)
    {
      $query = $this->db->query(
        "SELECT S.start_date,U.first_name,  P.project_name, TN.task, S.planned_effort, S.planned_start_date, S.planned_end_date,
        S.mon_p, S.mon_a, S.tue_p, S.tue_a, S.wen_p, S.wen_a, S.thu_p, S.thu_a, S.fri_p,
        S.fri_a, S.sat_p, S.sat_a, S.sun_p, S.sun_a, S.total_planned, S.total_actual
        FROM projects P, snapshots S, tasks TN , users U
        WHERE P.id = S.project_id
        AND TN.id = S.task_id
        AND U.id = S.user_id
        AND S.start_date = '$date'
        AND U.id IN ($idlist)"
      );

      return $query->result_array();
    }
  }		