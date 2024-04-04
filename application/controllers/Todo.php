<?php
class Todo extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('todo_model');
         $this->load->helper('url');
          $this->load->helper(array('form'));
          $this->load->helper('date');
           $this->load->library('form_validation');
             $this->load->library('session');
    }

    public function index() {
        // echo "11";
         $this->load->helper(array('form'));
         $data['todos'] = $this->todo_model->get_todo_list();
         $this->load->view('todo_list', $data);
        // $this->load->view('todo_list');
    }

    public function add() {
        $this->form_validation->set_rules('task', 'Task', 'required'); // Set validation rules
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload the page
            $this->index();
        } else {
            $todo_data = array(
                'task' => $this->input->post('task'),
                'date' =>date('Y-m-d'),
                'status' =>"pending"
            );

            // print_r(date('Y-m-d'));exit;
            $this->todo_model->add_todo_item($todo_data);
            redirect('todo');
        }
    }

    public function delete($id) {
        $this->todo_model->delete_todo_item($id);
        redirect('todo');
    }

 public function edit($id) {
        $data['todo'] = $this->todo_model->get_todo_item($id);
        $this->load->view('todo_listupdate', $data);
    }

    public function update($id) {
        $todo_data = array(
            'task' => $this->input->post('task')
        );
        $this->todo_model->update_todo_item($id, $todo_data);
        redirect('todo');
    }
 public function status($id) {
     echo $id;exit;
            $this->load->view('popup');

       
    }
 
  public function active_status_user($id){
  $data['status'] ='active';
  $this->db->where('id', $id);
  $result = $this->db->update('todos',$data);
  if ($result == 1) {
                $this->session->set_flashdata('success', "Status has been change successfully");
            $this->session->set_flashdata('success', 'Status has been change successfully');
                
            } else {
              $this->session->set_flashdata('danger', 'Status not update successfully');
               $this->session->set_flashdata('danger', 'Status not update successfully');
                // echo"failed";
            }
            redirect('todo');
        }



public function deactiv_status_user($id){
  $data['status'] =  'pending';
  $this->db->where('id',$id);
  $result = $this->db->update('todos',$data);
  if ($result == 1) {
               $this->session->set_flashdata('success', "Status has been change successfully");
              $this->session->set_flashdata('success', 'Status has been change successfully');
            } else {
             $this->session->set_flashdata('danger', 'Status not update successfully');
               $this->session->set_flashdata('danger', 'Status not update successfully');
                // echo"failed";
            }
              redirect('todo');
        }

















}
?>
