<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function page($a1 = 'home', $a2 = NULL, $a3 = NULL, $a4 = NULL, $a5 = NULL) {
        if ($a1 == 'action' && !is_null($a2)) {
            echo $this->action($a2, $a3);
            exit;
        }
        if (($this->session->role != 'A' || $a1 == "sign-in")){
            $a1 = "sign-in";
        }
        else {
            $data['category'] = $this->main_model->category();
            $data['subcategory'] = $this->main_model->subcat();
            if ($a1 == 'users') {
                if ($this->input->get("q"))
                    $data["users"] = $this->main_model->db->order_by("id", "desc")->get_where("users",array("id<" => base64_decode($this->input->get("q"))))->result_object();
                else 
                    $data["users"] = $this->main_model->db->order_by("id", "desc")->get_where("users",array())->result_object();
            }
            else if ($a1 == 'manage') {
                $data['products'] = $this->main_model->products();
            }
            else if ($a1 == 'edit-product') {
                $data['prd'] = $this->main_model->db->get_where("product",array("id" => base64_decode($this->input->get("q"))))->row_object();
                if (is_null($data['prd'])) redirect("adm190/manage");
            } 
            else if ($a1 == 'orders') {
                $data['orders'] = $this->main_model->all_orders();
            }  
            else if ($a1 == 'edit-category') {
                $data['cat'] = $this->main_model->db->get_where("category",array("id" => base64_decode($this->input->get("q"))))->row_object();
                if (is_null($data['cat'])) redirect("adm190/category");
            } 
            else if ($a1 == 'logout') {
                $this->session->sess_destroy();
                redirect('adm190');
                exit;
            }
        }
        $page = $a1;
        $data['title'] = ucfirst($page);
        if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php')) {   
            $page = 404;
        }
        $this->load->view('admin/'.$page, $data);
    }
    
    function action ($a2 = null, $a3 = null) {
        if ($a2 == 'sign-up') return $this->signup(); 
        else if ($a2 == 'sign-in') return $this->signin(); 
        else if ($a2 == 'change-password') return $this->change_password(); 
        else if ($a2 == 'profile') return $this->profile(); 
        else if ($a2 == 'category') return $this->category($a3);
        else if ($a2 == 'sub_category') return $this->sub_category($a3);
        else if ($a2 == 'item') return $this->item($a3); 
        else if ($a2 == 'cart') return $this->cart($a3); 
        else if ($a2 == 'place-order') return $this->place_order($a3); 
        else if ($a2 == 'user-import') { return $this->users_import(); } 
        exit;
    }
    
    function users_import() {
        $data['select'] = "firstname as First name, lastname as Last name, email  as E-mail, mobile as Mobile, address as Address, city as City, state as State, pin as Pincode, country as Country";
        $data['table'] = "users";
        $this->import($data);
    }
    
    function item($a3 = null) {
        if (!is_null($a3)) {
            if ($a3 == 'add') {
                $this->form_validation->set_rules('category', 'Category', 'required');
                $this->form_validation->set_rules('name', 'Name', 'required');
                $this->form_validation->set_rules('price', 'Price', 'required');
                if ($this->form_validation->run()) {
                    if($this->main_model->db->insert("product", $this->input->post())) return 'Added to the store.';
                    else return "Something went wrong.";
                } else return "Fill all the details.";
            } else if ($a3 == 'edit') {
                $this->form_validation->set_rules('category', 'Category', 'required');
                $this->form_validation->set_rules('name', 'Name', 'required');
                $this->form_validation->set_rules('price', 'Price', 'required');
                $this->form_validation->set_rules('id', 'Product', 'required');
                if ($this->form_validation->run()) {
                    $data = array (
                            "name" => $this->input->post("name"),
                            "category" => $this->input->post("category"),
                            "price" => $this->input->post("price")
                        );
                    $status = $this->main_model->db->where("id", $this->input->post("id"))->update("product", $data);
                    if($status) return 'Information updated.';
                    else return "Something went wrong.";
                } else return "Fill all the details.";
            } else if ($a3 == 'remove') {
                if($this->main_model->db->delete('product',$this->input->post())) return 'Deleted successfully.';
                else return "Something went wrong";
            } else return "Fill all the details.";
        } else return "Error occured.";
    }
    
    function sub_category($a3 = null) {
        if (!is_null($a3)) {
            if ($a3 == 'add') {
                $this->form_validation->set_rules('category', 'Category', 'required');
                $this->form_validation->set_rules('name', 'Name', 'required');
                if ($this->form_validation->run()) {
                    if($this->main_model->db->insert("subcat", $this->input->post())) return 'Added to the store.';
                    else return "Something went wrong.";
                } else return "Fill all the details.";
            } else if ($a3 == 'remove') {
                if($this->main_model->db->delete('subcat',$this->input->post())) return 'Deleted successfully.';
                else return "Something went wrong";
            } else return "Fill all the details.";
        } else return "Error occured.";
    }
    
    function category($a3 = null) {
        if (!is_null($a3)) {
            if ($a3 == 'add') {
                $this->form_validation->set_rules('name', 'Name', 'required');
                if ($this->form_validation->run()) {
                    if($this->main_model->db->insert("category", $this->input->post())) return 'Added to the store.';
                    else return "Something went wrong.";
                } else return "Fill all the details.";
            } else if ($a3 == 'edit') {
                $this->form_validation->set_rules('name', 'Name', 'required');
                $this->form_validation->set_rules('id', 'Category', 'required');
                if ($this->form_validation->run()) {
                    if($this->main_model->db->where("id", $this->input->post("id"))->update("category", array("name" => $this->input->post("name")))) return 'Information updated.';
                    else return "Something went wrong.";
                } else return "Fill all the details.";
            } else if ($a3 == 'remove') {
                if($this->main_model->db->delete('category',$this->input->post())) return 'Deleted successfully.';
                else return "Something went wrong";
            } else return "Fill all the details.";
        } else return "Error occured.";
    }
    
    function signin () {
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run()) {
            return $this->main_model->signin();
        } else return "Blank fields are not allowed.";
    }
    
    function import($data) {
        if (isset($data['select'])) $this->main_model->db->select($data['select']);
        if (isset($data['where'])) $this->main_model->db->where($data['where']);
        $query = $this->main_model->db->get($data['table'])->result_array();
        if(!$query) return false;
        function cleanData(&$str) {
            $str = preg_replace("/\t/", "\\t", $str);
            $str = preg_replace("/\r?\n/", "\\n", $str);
            if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
        }
        $filename = $data['table'] . date('Y-m-d H:i:s') . ".xls";
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Type: application/vnd.ms-excel");
        $flag = false;
        foreach($query as $row) {
            if(!$flag) {
            echo implode("\t", array_keys($row)) . "\n";
            $flag = true;
            }
            array_walk($row, __NAMESPACE__ . '\cleanData');
            echo implode("\t", array_values($row)) . "\n";
        }
    }
}
