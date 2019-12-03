<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Snapshot extends CI_Controller
{  

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('User_Model');
        $this->load->model('Task_Model');
        $this->load->model('Project_Model');
        $this->load->model('Snapshot_Model');
        
    } 
  
    public function index($message = "")
    {
     
        $user_id =  $_SESSION['user_id'];
        $data['error'] = "";
        $data['projects'] = $this->Project_Model->getProjectNames();
        $data['task_names'] = $this->Task_Model->getTaskNames();
        $data['snapshots'] = $this->Snapshot_Model->mySnapshots($user_id);
        
        if($message){
          $data['error'] = $message;
        }

        $this->load->view('snapshot', $data);
    }

    public function addSnapshot()
    {
      // print_r($this->input->post('start_date'));
      // print_r($this->input->post('planned_start_date'));
      // print_r($this->input->post('planned_end_date'));
      if(empty($this->input->post('start_date')) || empty($this->input->post('planned_start_date')) || empty($this->input->post('planned_end_date'))){
        
        $this->index('Empty Date');
       
      }
      else{
 
        $user_id =  $_SESSION['user_id'];

        $total_planned_hours = 0;
        $total_actual_hours = 0;

        if (!empty($_POST['mon_p'])) {
          $total_planned_hours += $_POST['mon_p'];
        } 

        if (!empty($_POST['tue_p'])) {
          $total_planned_hours += $_POST['tue_p'];
        }

        if (!empty($_POST['wen_p'])) {
          $total_planned_hours += $_POST['wen_p']; 
        }

        if (!empty($_POST['thu_p'])) {
          $total_planned_hours += $_POST['thu_p'];
        }

        if (!empty($_POST['fri_p'])) {
          $total_planned_hours += $_POST['fri_p'];
        }
        
        if (!empty($_POST['sat_p'])) {
          $total_planned_hours += $_POST['sat_p'];
        }
        
        if (!empty($_POST['sun_p'])) {
          $total_planned_hours += $_POST['sun_p'];
        }

        if (!empty($_POST['mon_a'])) {
          $total_actual_hours += $_POST['mon_a'];
        }

        if (!empty($_POST['tue_a'])) {
          $total_actual_hours += $_POST['tue_a'];
        }

        if (!empty($_POST['wen_a'])) {
          $total_actual_hours += $_POST['wen_a'];
        }

        if (!empty($_POST['thu_a'])) {
          $total_actual_hours += $_POST['thu_a'];
        } 

        if (!empty($_POST['fri_a'])) {
          $total_actual_hours += $_POST['fri_a'];
        }

        if (!empty($_POST['sat_a'])) {
          $total_actual_hours += $_POST['sat_a'];
        } 

        if (!empty($_POST['sun_a'])) {
          $total_actual_hours += $_POST['sun_a'];
        }
        
        // $id = 0;
        // if($this->input->post('id')){
        //   $id = $this->input->post('id');
        // }
         
        
        $task = array(
            'id' => $this->input->post('id'),
            'start_date' => $this->input->post('start_date'),
            'task_id' => $this->input->post('task_name'),
            'planned_effort' => $this->input->post('planned_effort'),
            'planned_start_date' => $this->input->post('planned_start_date'),
            'planned_end_date' => $this->input->post('planned_end_date'),
            'mon_p' => $this->input->post('mon_p'),
            'mon_a' => $this->input->post('mon_a'),
            'tue_p' => $this->input->post('tue_p'),
            'tue_a' => $this->input->post('tue_a'),
            'wen_p' => $this->input->post('wen_p'),
            'wen_a' => $this->input->post('wen_a'),
            'thu_p' => $this->input->post('thu_p'),
            'thu_a' => $this->input->post('thu_a'),
            'fri_p' => $this->input->post('fri_p'),
            'fri_a' => $this->input->post('fri_a'),
            'sat_p' => $this->input->post('sat_p'),
            'sat_a' => $this->input->post('sat_a'),
            'sun_p' => $this->input->post('sun_p'),
            'sun_a' => $this->input->post('sun_a'),
            'total_planned' => $total_planned_hours, 
            'total_actual' => $total_actual_hours,
						'project_id' => $this->input->post('project'),
						'user_id' => $user_id ,	
        );
        
       
        $this->Snapshot_Model->saveSnapshot($task);
        $this->index("");
       
      }
				// redirect('/snapshot/index');
    }
    
    public function updateSnapshot()
    {      
        $total_planned_hours = 0;
        $total_actual_hours = 0;
        $snap_id = $_POST['id'];

        if (!empty($_POST['mon_p'])) { 
          $total_planned_hours += $_POST['mon_p'];
        } 

        if (!empty($_POST['tue_p'])) {
          $total_planned_hours += $_POST['tue_p'];
        }

        if (!empty($_POST['wen_p'])) {
          $total_planned_hours += $_POST['wen_p']; 
        }

        if (!empty($_POST['thu_p'])) {
          $total_planned_hours += $_POST['thu_p'];
        }

        if (!empty($_POST['fri_p'])) {
          $total_planned_hours += $_POST['fri_p'];
        }
        
        if (!empty($_POST['sat_p'])) {
          $total_planned_hours += $_POST['sat_p'];
        }
        
        if (!empty($_POST['sun_p'])) {
          $total_planned_hours += $_POST['sun_p'];
        }

        if (!empty($_POST['mon_a'])) {
          $total_actual_hours += $_POST['mon_a'];
        }

        if (!empty($_POST['tue_a'])) {
          $total_actual_hours += $_POST['tue_a'];
        }

        if (!empty($_POST['wen_a'])) {
          $total_actual_hours += $_POST['wen_a'];
        }

        if (!empty($_POST['thu_a'])) {
          $total_actual_hours += $_POST['thu_a'];
        } 

        if (!empty($_POST['fri_a'])) {
          $total_actual_hours += $_POST['fri_a'];
        }

        if (!empty($_POST['sat_a'])) {
          $total_actual_hours += $_POST['sat_a']; 
        } 

        if (!empty($_POST['sun_a'])) {
          $total_actual_hours += $_POST['sun_a'];
        }
        
        $task = array(
            'start_date' => $this->input->post('start_date'),
            'planned_effort' => $this->input->post('planned_effort'),
            'planned_start_date' => $this->input->post('planned_start_date'),
            'planned_end_date' => $this->input->post('planned_end_date'),
            'mon_p' => $this->input->post('mon_p'),
            'mon_a' => $this->input->post('mon_a'),
            'tue_p' => $this->input->post('tue_p'),
            'tue_a' => $this->input->post('tue_a'),
            'wen_p' => $this->input->post('wen_p'),
            'wen_a' => $this->input->post('wen_a'),
            'thu_p' => $this->input->post('thu_p'), 
            'thu_a' => $this->input->post('thu_a'),
            'fri_p' => $this->input->post('fri_p'),
            'fri_a' => $this->input->post('fri_a'),
            'sat_p' => $this->input->post('sat_p'),
            'sat_a' => $this->input->post('sat_a'),
            'sun_p' => $this->input->post('sun_p'),
            'sun_a' => $this->input->post('sun_a'),
            'total_planned' => $total_planned_hours, 
            'total_actual' => $total_actual_hours,
        );

        $this->Snapshot_Model->updateSnapshot($task, $snap_id);
        $this->Snapshot_Model->getAllSnapshots();
        $this->index();
				// redirect('snapshot/index');
		}
  
    public function getAllSnapshots()
    { 
      if(!empty($_POST['idlist']) && !empty($_POST['date'])) {
        $idlist = $_POST['idlist'];
        $date = $_POST['date'];
        $_SESSION["idlist"]=  $idlist;
        $_SESSION["date"]=  $date;
        $data['snapshots'] = $this->Snapshot_Model->getUserDateSnapshots($idlist, $date);
      }
      elseif(!empty($_POST['idlist'])) {
        $idlist = $_POST['idlist'];
        $_SESSION["idlist"]=  $idlist;
        $data['snapshots'] = $this->Snapshot_Model->getUserSnapshots($idlist);
      } 
      elseif(!empty($_POST['date'])) {
        $date = $_POST['date'];
        $_SESSION["date"]=  $date;
        $data['snapshots'] = $this->Snapshot_Model->getDateSnapshots($date);
      }
      else {
        $data['snapshots'] = $this->Snapshot_Model->getAllSnapshots();
      }
        
      $data['users'] = $this->User_Model->getUserDetails();
      
      $this->load->view('view_snapshot', $data);
    }		

    public function deleteSnapshot($id) 
    {     
       $this->Snapshot_Model->deleteSnapshot($id);
       $this->index();
    }		

    public function deleteSnapshotAdmin($id) 
    {     
      $data['snapshots'] = $this->Snapshot_Model->deleteSnapshot($id);
      
      if(!empty($_POST['idlist']) && !empty($_POST['date'])) {
        $idlist = $_POST['idlist'];
        $date = $_POST['date'];
        $_SESSION["idlist"]=  $idlist;
        $_SESSION["date"]=  $date;
        $data['snapshots'] = $this->Snapshot_Model->getUserDateSnapshots($idlist, $date);
      }
      elseif(!empty($_POST['idlist'])) {
        $idlist = $_POST['idlist'];
        $_SESSION["idlist"]=  $idlist;
        $data['snapshots'] = $this->Snapshot_Model->getUserSnapshots($idlist);
      } 
      elseif(!empty($_POST['date'])) {
        $date = $_POST['date'];
        $_SESSION["date"]=  $date;
        $data['snapshots'] = $this->Snapshot_Model->getDateSnapshots($date);
      }
      else {
        $data['snapshots'] = $this->Snapshot_Model->getAllSnapshots();
      }
        
      $data['users'] = $this->User_Model->getUserDetails();
      
       $this->load->view('view_snapshot',$data );
    }		

    
  
    public function convertCsvIndex() {

      header('Content-Type: text/csv');
      header('Content-Disposition: attachment; filename="file.csv"');
      
      if(!empty($_SESSION['idlist']) && !empty($_SESSION['date'])) {

        $idlist = $_SESSION["idlist"];
        $date = $_SESSION["date"];
       
        $data['convert'] =$this->Snapshot_Model->getUserDateSnapshots($idlist, $date);
        
        $_SESSION["idlist"] = null;
        $_SESSION["date"] = null;
        session_destroy();
        }

      elseif(!empty($_SESSION['idlist'])) { 
       
      $idlist = $_SESSION["idlist"];
     
      $data['convert'] = $this->Snapshot_Model->getUserSnapshots($idlist);
      
      $_SESSION["idlist"] = null;
      session_destroy();
      }

      elseif(!empty($_SESSION['date'])) {

      $date = $_SESSION["date"];

      $data['convert'] = $this->Snapshot_Model->getDateSnapshots($date);
      $_SESSION["date"] = null;
      session_destroy();
      }

      else {
        $data['convert'] = $this->Snapshot_Model->getAllSnapshots();
        $_SESSION["date"] = null;
        $_SESSION["idlist"] = null;
        session_destroy();
      }
      $c =0;
    $file = fopen('php://output', 'wb');
   
    fputcsv($file, array(''));

    

if($file){
    while(!feof($file)){
          $content = fgets($file);
      if($content)    $c++;
    }
}
    
    $headers = ("weekStartDate,userName,project,task,plannedEffort,plannedStartDate,plannedEndDate,Mon.p,Mon.a,Tue.p,Tue.a,Wen.p,Wen.a,Thu.p,Thu.a,Fri.p,Fri.a,Sat.p,Sat.a,Sun.p,Sun.a,totalPlannedOurs,totalActualOurs\n");
    fwrite($file,  $headers);
    //fputcsv($file, $headers);  
      foreach ($data['convert'] as $fields) {
        if( is_object($fields) )
        $fields = (array) $fields;
        fputcsv($file, $fields);      
        }

        
      fclose($file);
      echo $c;

  }
    public function snapEditIndex($id) {
      $data['snapshot'] = $this->Snapshot_Model->getSelectedSnapshot($id);
      $this->load->view('snap_edit', $data);
    }
  } 
?>
 