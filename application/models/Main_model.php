<?php
class Main_model extends CI_Model {

    public function __construct()
    {
            $this->load->database();
            
    }
    
    
    public function place_order($det) {
        $code = rand(000000, 999999);
        $data = array (
                "customer" => $this->session->id,
                "first_name" => $this->session->firstname,
                "last_name" => $this->session->lastname,
                "email" => $this->session->email,
                "mobile" => $this->session->mobile,
                "address" => $this->session->address,
                "city" => $this->session->city,
                "state" => $this->session->state,
                "country" => $this->session->country,
                "pin" => $this->session->pin,
                "method" => $det['method'],
                'pstatus' => $det['status'],
                'cr_date' => date("Y-m-d H:i:s"),
                'dl_date' => date("Y-m-d H:i:s"),
                'status' => "Hold",
                'dl_code' => $code
             );
        if($this->db->insert("orders", $data)) { 
            $oid = $this->db->insert_id(); $data = array();
            foreach ($this->cart->contents() as $row) {
                array_push($data, array (
                        "od" => $oid,
                        "product" => $row['name'],
                        "qty" => $row['qty'],
                        "price" => $row['price']
                    ));
            }
            $this->cart->destroy();
            return $this->db->insert_batch("odetails", $data);
        }
    }
    
    public function products() {
		return $this->db->get_where('product', array())->result_object();
    }
    
    public function cart_product($pr) {
        $set = '';
        foreach ($pr as $row) {
            $set = $row['id'].',';
        }
        $this->db->where_in("id", $set);
        return $this->db->get_where('product', array())->result_object();
    }
    public function product ($id) {
        $query = $this->db->get_where('product', array('id' => $id))->row_object();
        if (!is_null($query)) {
            $images = $this->db->get_where('pictures', array('id_produit' => $query->id_picture))->result_object();
            $query->images = $images;
        }
        return $query;
    }
    
    public function category () {
        return $this->db->get('category')->result_object();
    }
    public function orders() {
        $this->db->order_by("orders.id", "DESC");
        $data = $this->db->get_where('orders', array("customer" => $this->session->id))->result_object();
        $i = 0;
        foreach ($data as $row) {
            $data[$i++]->items = $this->db->get_where('odetails', array("od" => $row->id))->result_object();
        }
        return $data;
    }
    public function all_orders() {
        $this->db->order_by("id", "DESC");
        $this->db->limit(20);
        if ($this->input->get('q')) $this->db->where("id<", base64_decode($this->input->get("q")));
        if ($this->input->get('status')) $this->db->where("status", $this->input->get("status"));
        $data = $this->db->get_where('orders', array())->result_object();
        $i = 0;
        foreach ($data as $row) {
            $data[$i++]->items = $this->db->get_where('odetails', array("od" => $row->id))->result_object();
        }
        return $data;
    }
    public function subcat () {
        return $this->db->get('subcat')->result_object();
    }
    public function signin() {
        $data = array (
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        );
        $res = $this->db->get_where('users', $data)->row_array();
        if (!is_null($res)) {
            $this->session->set_userdata($res);
            $this->session->logged_in = true;
            return "success";
        } else return "Invalid credentials.";
    }
    
    public function signup() {
        $data = $this->input->post();
        if($this->db->insert('users', $data)) {
            return "Account was created successfully.";
        } else return "Database error.";
    }
    
    function slug($string, $wordLimit = 0){
        $separator = '-';
        if($wordLimit != 0){
            $wordArr = explode(' ', $string);
            $string = implode(' ', array_slice($wordArr, 0, $wordLimit));
        }
        $quoteSeparator = preg_quote($separator, '#');
        $trans = array(
            '&.+?;'                    => '',
            '[^\w\d _-]'            => '',
            '\s+'                    => $separator,
            '('.$quoteSeparator.')+'=> $separator
        );
        $string = strip_tags($string);
        foreach ($trans as $key => $val){
            $string = preg_replace('#'.$key.'#i'.(UTF8_ENABLED ? 'u' : ''), $val, $string);
        }
        $string = strtolower($string);
        return trim(trim($string, $separator));
    }
}