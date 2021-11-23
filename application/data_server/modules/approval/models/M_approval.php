<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_approval extends CI_Model {

    public function __construct() {
        parent::__construct();
        
        $this->id_lvl_otorisasi = $this->session->userdata('id_level_otorisasi');
        $this->id_user          = $this->session->userdata('sesi_id');

    }
    
    // 16-05-2021
    public function cari_data($tabel, $where)
    {
        return $this->db->get_where($tabel, $where);
    }

    public function cari_data_order($tabel, $where, $field, $order)
    {
        $this->db->order_by($field, $order);

        return $this->db->get_where($tabel, $where);
    }

    public function get_data_order($tabel, $field, $order)
    {
        $this->db->order_by($field, $order);
        
        return $this->db->get($tabel);
    }

    public function get_data($tabel)
    {
        return $this->db->get($tabel);
    }

    public function input_data($tabel, $data)
    {
        $this->db->insert($tabel, $data);
    }

    public function ubah_data($tabel, $data, $where)
    {
        return $this->db->update($tabel, $data, $where);
    }

    public function hapus_data($tabel, $where)
    {
        $this->db->delete($tabel, $where);
    }

    // 05-08-2021
    public function cari_data_sppa($id_user)
    {
        // 'tr_sppa_quotation', ['approval' => false, 'sppa_number !=' => null], 'sppa_number', 'asc'

        $cr = $this->db->get_where('m_user', ['id_user' => $id_user])->row_array();

        $this->db->select('t.*');
        $this->db->from('tr_sppa_quotation as t');
        
        $this->db->where('t.approval', false);
        $this->db->where('t.sppa_number !=', null);

        if ($this->id_lvl_otorisasi != 0) {
            
            
            if ($cr['id_level_user'] != 0) {

                $this->db->where('t.add_by', $id_user);
                
            }   
        }

        $this->db->order_by('t.sppa_number', 'asc');

        return $this->db->get();
    }

    // 16-05-2021
    public function get_data_approval()
    {
        $this->_get_datatables_query_approval();

        if ($this->input->post('length') != -1) {
            $this->db->limit($this->input->post('length'), $this->input->post('start'));
            
            return $this->db->get()->result_array();
        }
    }

    var $kolom_order_approval = [null, 't.sppa_number', 's.sob', 'c.cob', 'a.nama_asuransi'];
    var $kolom_cari_approval  = ['LOWER(t.sppa_number)', 'LOWER(s.sob)', 'LOWER(c.cob)', 'LOWER(l.lob)', 'LOWER(a.nama_asuransi)'];
    var $order_approval       = ['p.tgl_approve' => 'desc'];

    public function _get_datatables_query_approval()
    {
        $cr = $this->db->get_where('m_user', ['id_user' => $this->input->post('id_user')])->row_array();

        $this->db->select('t.id_sppa_quotation as id, t.sppa_number, c.cob, l.lob, a.nama_asuransi, h.id_sob, s.sob, h.nama_sob, t.approval, t.id_mop');
        $this->db->from('tr_sppa_quotation as t');
        $this->db->join('m_cob as c', 'c.id_cob = t.id_cob', 'inner');
        $this->db->join('m_lob as l', 'l.id_lob = t.id_lob', 'inner');
        $this->db->join('tr_approve_sppa as p', 'id_sppa_quotation', 'inner');
        $this->db->join('m_asuransi as a', 'id_asuransi', 'inner');
        $this->db->join('tr_histori_status_sob as h', 'h.id_sppa_quotation = t.id_sppa_quotation', 'inner');
        $this->db->join('m_sob as s', 's.id_sob = h.id_sob', 'left');
        
        $this->db->where('t.approval', true);
        $this->db->where('t.status_aktif', true);

        if ($this->input->post('id_lvl_otorisasi') != 0) {
            
            
            if ($cr['id_level_user'] != 0) {

                $this->db->where('t.add_by', $this->input->post('id_user'));
                
            }   
        }
        
        $b = 0;
        
        $input_cari = strtolower($_POST['search']['value']);
        $kolom_cari = $this->kolom_cari_approval;

        foreach ($kolom_cari as $cari) {
            if ($input_cari) {
                if ($b === 0) {
                    $this->db->group_start();
                    $this->db->like($cari, $input_cari);
                } else {
                    $this->db->or_like($cari, $input_cari);
                }

                if ((count($kolom_cari) - 1) == $b ) {
                    $this->db->group_end();
                }
            }

            $b++;
        }

        if (isset($_POST['order'])) {

            $kolom_order = $this->kolom_order_approval;
            $this->db->order_by($kolom_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            
        } elseif (isset($this->order_approval)) {
            
            $order = $this->order_approval;
            $this->db->order_by(key($order), $order[key($order)]);
            
        }
        
    }

    public function jumlah_semua_approval()
    {
        $cr = $this->db->get_where('m_user', ['id_user' => $this->input->post('id_user')])->row_array();

        $this->db->select('t.id_sppa_quotation as id, t.sppa_number, c.cob, l.lob, a.nama_asuransi, h.id_sob, s.sob, h.nama_sob, t.approval, t.id_mop');
        $this->db->from('tr_sppa_quotation as t');
        $this->db->join('m_cob as c', 'c.id_cob = t.id_cob', 'inner');
        $this->db->join('m_lob as l', 'l.id_lob = t.id_lob', 'inner');
        $this->db->join('tr_approve_sppa as p', 'id_sppa_quotation', 'inner');
        $this->db->join('m_asuransi as a', 'id_asuransi', 'inner');
        $this->db->join('tr_histori_status_sob as h', 'h.id_sppa_quotation = t.id_sppa_quotation', 'inner');
        $this->db->join('m_sob as s', 's.id_sob = h.id_sob', 'left');
        
        $this->db->where('t.approval', true);
        $this->db->where('t.status_aktif', true);

        if ($this->input->post('id_lvl_otorisasi') != 0) {
            
            if ($cr['id_level_user'] != 0) {

                $this->db->where('t.add_by', $this->input->post('id_user'));
                
            }   
        }
        
      return $this->db->count_all_results();
    }

    public function jumlah_filter_approval()
    {
        $this->_get_datatables_query_approval();

        return $this->db->get()->num_rows();
        
    }

    // 16-05-2021
    public function get_approval()
    {
        $cr = $this->db->get_where('m_user', ['id_user' => $this->id_user])->row_array();
        
        $this->db->select('t.id_sppa_quotation as id, t.sppa_number, c.cob, l.lob');    
        $this->db->from('tr_sppa_quotation as t');
        $this->db->join('m_cob as c', 'id_cob', 'inner');
        $this->db->join('m_lob as l', 'id_lob', 'inner');
        $this->db->where('t.approval', false);
        $this->db->where('t.sppa_number !=', null);

        if ($this->id_lvl_otorisasi != 0) {
            
            
            if ($cr['id_level_user'] != 0) {

                $this->db->where('t.add_by', $this->id_user);
                
            }   
        }

        return $this->db->get();
        
    }

    // 19-05-2021
    public function data_approve($id_sppa)
    {
        $this->db->select('p.*, a.nama_asuransi, k.nama_karyawan');
        $this->db->from('tr_approve_sppa as p');
        $this->db->join('m_karyawan as k', 'k.id_karyawan = p.id_pegawai', 'inner');
        $this->db->join('m_asuransi as a', 'id_asuransi', 'inner');
        $this->db->where('p.id_sppa_quotation', $id_sppa);
        
        return $this->db->get();
    }

}

/* End of file M_approval.php */
