<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class M_role extends CI_Model
{

  function __construct() {
    parent::__construct();
  }

  public function alljabatan()
  {
    return $this->db->get('m_jabatan')->result();
  }

  public function datagrup($value)
  {

    $this->db->join('level_user', 'level_user.id_level_user = level_otorisasi.id_level_user', 'inner');
    $this->db->where($value);
    $data = $this->db->get('level_otorisasi')->result();
    return $data;
  }

  public function menubyjabatan($value)
  {
    $this->db->where($value);
    $res = $this->db->get('privilage');
    return $res->result();
  }
}

?>
