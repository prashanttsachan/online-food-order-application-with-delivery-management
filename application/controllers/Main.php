<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    public function page($a1 = 'home', $a2 = NULL, $a3 = NULL, $a4 = NULL, $a5 = NULL) {
        $data['category'] = $this->main_model->category();
        $data['subcategory'] = $this->main_model->subcat();
        if (in_array($a1, array("orders", "profile","editprofile")) && !$this->session->logged_in) {
            redirect('');
        }
        if (in_array($a1, array('category', 'manage','sub-category','all-orders', 'users')) && !$this->session->role == "A") {
            redirect('');
        }
        if ($a1 == 'more') {
            $a1= 'home'; $a2 = 'more';
        }
        if ($a1 != 'action') {
            $page = $a1;
            if ($a1 == 'home') {
                $data['products'] = $this->main_model->products();
            }
            if ($a1 == 'product' && !is_null($a2)) {
                $data['product'] = $this->main_model->product($a2);
                if (!$data['product']) { $page = 404; }
            }
            if ($a1 == 'manage') {
                $data['products'] = $this->main_model->products();
            }
            if ($a1 == 'orders') {
                $data['orders'] = $this->main_model->orders();
            }
            if ($a1 == 'all-orders') {
                $data['orders'] = $this->main_model->all_orders();
            }
            if ($a1 == 'users') {
                $data['orders'] = $this->main_model->all_orders();
            }
            if ($a1 == 'cart') {
                $data['cart'] = $this->main_model->cart_product($this->cart->contents());
            }
            if ($a1 == 'logout') {
                $this->session->sess_destroy();
                redirect('');
                exit;
            }
        }
        else if ($a1 == 'action' && !is_null($a2)) {
            echo $this->action($a2, $a3);
            exit;
        }
        $page = $a1;
        $data['title'] = ucfirst($page);
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php')) {   
            $page = 404;
        }
        $this->load->view('pages/'.$page, $data);
    }
    
    function action ($a2 = null, $a3 = null) {
        if ($a2 == 'sign-up') return $this->signup(); 
        else if ($a2 == 'sign-in') return $this->signin(); 
        else if ($a2 == 'change-password') return $this->change_password(); 
        else if ($a2 == 'profile') return $this->profile(); 
        else if ($a2 == 'cart') return $this->cart($a3); 
        else if ($a2 == 'place-order') return $this->place_order($a3); 
        else if ($a2 == 'order' && $a3 == 'deliver') return $this->deliver(); 
        exit;
    }
    
    function deliver() {
        if ($this->input->post('order')) {
            $data = array("status" => "Delivered", "dl_date" => date("Y-m-d H:i:s"), 'remarks' => $this->input->post('remarks'), 'dl_code' => 0);
            if($this->main_model->db->where(array("id" => base64_decode($this->input->post("order")), 'dl_code' => $this->input->post("dlcode")))->update("orders", $data)) {
                if ($this->db->affected_rows() == 1) echo 'Order delivered';
                else echo 'Incorrect details.';
            }
            else echo "Something went wrong.";
        }
    }
    
    function place_order() {
        if ($this->input->get('req') == "cod") {
            $this->place("Cash on Delivery");
        } else {
            
        }
    }
    
    function place($paid = "No") {
        if ($this->cart->total_items() > 0) {
            if ($this->main_model->place_order(array("method" => $paid, "status" => "Not Paid"))) redirect("success");
            else redirect("error");
        } else redirect ("cart");
    }
    
    function cart ($a3 = null) {
        if (!is_null($a3)) {
            if ($a3 == 'add') {
                $this->cart->insert($this->input->post());
                return 'Added to cart.';
            } else if ($a3 == 'update') {
                if($this->cart->update($this->input->post())) return 'success';
                else return "Something went wrong";
            } else return "Empty cart is not allowed.";
        } else return "Error occured.";
    }
    
    function profile () {
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('pin', 'Pin', 'required');
        if ($this->form_validation->run()) {
            $this->main_model->db->where('id', $this->session->id)->update('users',$this->input->post());
            $res = $this->db->where('id', $this->session->id)->get('users')->row_array();
            if (!is_null($res)) {
                $this->session->set_userdata($res);
            }
            return "Profile updated successfully.";
        } else return "Blank fields are not allowed.";
    }
    
    function change_password () {
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run()) {
            $this->main_model->db->where('id', $this->session->id)->update('users',$this->input->post());
            return "Password changed successfully.";
        } else return "Blank fields are not allowed.";
    }
    function signin () {
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run()) {
            return $this->main_model->signin();
        } else return "Blank fields are not allowed.";
    }
    function signup () {
        $this->form_validation->set_rules('firstname', 'Name', 'required');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run()) {
            return $this->main_model->signup();
        } else return "Blank fields or Duplicate e-mails are not allowed.";
    }
}
