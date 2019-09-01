<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Project extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Project_Model');
    }

    public function Index()
    {
        $data['projects'] = $this->Project_Model->getProjects();
        $this->load->view('projects', $data);
    }

    public function addProject()
    {
        $project = array(
            'code' => $this->input->post('code'),
            'project_name' => $this->input->post('project_name'),
            'project_description' => $this->input->post('project_description'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
        );

        $this->Project_Model->saveProject($project);

        $data['projects'] = $this->Project_Model->getProjects();
        redirect('project/index');
    }
}
?> 