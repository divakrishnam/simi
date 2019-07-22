<?php
class M_Login extends CI_Model{
    function login_check($where){
        return $this->db->get_where('user', $where);
    }
}
?>