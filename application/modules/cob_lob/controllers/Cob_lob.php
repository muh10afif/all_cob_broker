<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Cob_lob extends CI_controller
{

  public function __construct() {
    parent::__construct();
    $this->load->model('cob_lob/M_cob', 'cob');
    $this->load->model('cob_lob/M_lob', 'lob');
    $this->load->model('cob_lob/M_coblob', 'coblob');
    if($this->session->userdata('username') == "") {
      redirect(base_url(), 'refresh');
    }
  }

  public function index($value='')
  {
    $data = [
      'title' => 'Entry COB and LOB',
      'tipe_cob' => $this->cob->list_tipe_cob(),
      'list_cob' => $this->cob->list_cob(),
      'list_lob' => $this->lob->list_lob(),
      'role' => get_role($this->session->userdata('id_level_otorisasi'))
    ];
    $this->template->load('template/index', 'index', $data);
  }

  // rubah kode lob 
  public function rubah_kode()
  {
    $this->db->order_by('id_lob', 'asc');
    $hasil = $this->db->get('m_lob')->result_array();

    $o = 1;
    foreach ($hasil as $h) {
      $kode = $h['kode_lob'];

      if ($o == 1) {
        $kode_lob = "LOB000001";
      } else {

        $this->db->where('kode_lob !=', '');
        $this->db->order_by('id_lob', 'desc');
        $cari = $this->db->get('m_lob')->row_array();
        
        $a = strpos($cari['kode_lob'],'B');
        $b = strlen($cari['kode_lob']);
        $c = substr($cari['kode_lob'], $a + 2, $b);
        $w = (int) $c + 1;
        $kd = str_pad($w, 6, "0", STR_PAD_LEFT);

        $kode_lob = "LOB".$kd;

      }

      $this->db->update('m_lob', ['kode_lob' => $kode_lob], ['id_lob' => $h['id_lob']]);
      
      $o++;
    }

    echo "sukses";
  }

  public function cob_lob_kode($value='')
  {
    $kode_cob = codegenerate('m_cob','COB','cob','B');
    $kode_lob = codegenerate('m_lob','LOB','lob','B');

    echo json_encode(['kode_cob' => $kode_cob, 'kode_lob' => $kode_lob]);
  }

  public function setlob($value='')
  {
    $data = $this->lob->list_lob();
    echo json_encode($data);
  }

  public function ajaxdatacob($action)
  {
    $permisi = explode('_',$action);
    $b1 = ''; $b2 = '';

    $no   = $this->input->post('start');
    $data = $this->cob->get_data_cob();

    $datax = array();
    foreach ($data as $key) {
      $tbody = array();

      $no++;
      $tbody[] = "<div align='center'>".$no.".</div>";
      $tbody[] = $key['kode_cob'];
      $tbody[] = wordwrap($key['cob'] ,35,"<br>\n");
      $tbody[] = $key['tipe_cob'];
      if ($permisi[0] == 'true' || $action == '_') {
        $b1 = '<span style="cursor:pointer" class="mr-2 text-primary edit-negara '.(count($data) > 1?'ttip':'').'" data-toggle="tooltip" data-placement="top" title="Ubah" onclick="ubahubah('.$key['id_cob'].',1)"><i class="fas fa-pencil-alt fa-lg"></i></span>';
      }
      if ($permisi[1] == 'true' || $action == '_') {
        $b2 = '<span style="cursor:pointer" class="text-danger hapus-negara '.(count($data) > 1?'ttip':'').'" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="deletedel('.$key['id_cob'].',1)"><i class="far fa-trash-alt fa-lg"></i></span>';
      }
      $tbody[] = $b1.$b2;
      $datax[] = $tbody;
    }

    $output = [
      "draw"            => $_POST['draw'],
      "recordsTotal"    => $this->cob->countalllistcob(),
      "recordsFiltered" => $this->cob->countfilterlistcob(),
      "data"            => $datax
    ];
    echo json_encode($output);
  }

  public function ajaxdatalob($action)
  {
    $permisi = explode('_',$action);
    $b1 = ''; $b2 = ''; $b3 = '';

    $no   = $this->input->post('start');
    $data = $this->lob->get_data_lob();

    $datax = array();
    foreach ($data as $key) {
      $tbody = array();

      $no++;
      $tbody[] = "<div align='center'>".$no.".</div>";
      $tbody[] = $key['kode_lob'];
      $tbody[] = wordwrap($key['lob'] ,35,"<br>\n");
      $tbody[] = $key['singkatan'];
      $tbody[] = $key['diskon'];
      if ($permisi[2] == 'true' || $action == '__') {
        $b1 = '<span style="cursor:pointer" class="mr-2 text-success '.(count($data) > 1?'ttip':'').'" title="Coverage" data-placement="top" title="Coverage" data-toggle="modal" data-target="#myModal" onclick="createcoverage('.$key['id_lob'].',2)"><i class="fas fa-clipboard-list fa-lg"></i></span>&nbsp;&nbsp;';
      }
      if ($permisi[0] == 'true' || $action == '__') {
        $b2 = '<span style="cursor:pointer" class="mr-2 text-primary '.(count($data) > 1?'ttip':'').'" data-toggle="tooltip" data-placement="top" title="Ubah" onclick="ubahubah('.$key['id_lob'].',2)"><i class="fas fa-pencil-alt fa-lg"></i></span>&nbsp;';
      }
      if ($permisi[1] == 'true' || $action == '__') {
        $b3 = '<span style="cursor:pointer" class="text-danger '.(count($data) > 1?'ttip':'').'" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="deletedel('.$key['id_lob'].',2)"><i class="far fa-trash-alt fa-lg"></i></span>';
      }
      $tbody[] = $b1.$b2.$b3;
      $datax[] = $tbody;
    }

    $output = [
      "draw"            => $_POST['draw'],
      "recordsTotal"    => $this->lob->countalllistlob(),
      "recordsFiltered" => $this->lob->countfilterlistlob(),
      "data"            => $datax
    ];
    echo json_encode($output);
  }

  public function ajaxdataboth($action)
  {
    $permisi = explode('_',$action);
    $b1 = ''; $b2 = '';

    $no   = $this->input->post('start');
    $data = $this->coblob->get_data_coblob();

    $datax = array();
    foreach ($data as $key) {
      $tbody = array();

      $no++;
      $tbody[] = "<div align='center'>".$no.".</div>";
      $tbody[] = $key['cob'];
      $tbody[] = $key['tipe_cob'];
      $tbody[] = $key['lob'];
      if ($permisi[0] == 'true' || $action == '_') {
        $b1 = '<span style="cursor:pointer" class="mr-2 text-primary edit-negara '.(count($data) > 1?'ttip':'').'" data-toggle="tooltip" data-placement="top" title="Ubah" onclick="ubahubah('.$key['id_relasi_cob_lob'].',3)"><i class="fas fa-pencil-alt fa-lg"></i></span>';
      }
      if ($permisi[1] == 'true' || $action == '_') {
        $b2 = '<span style="cursor:pointer" class="text-danger hapus-negara '.(count($data) > 1?'ttip':'').'" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="deletedel('.$key['id_relasi_cob_lob'].',3)"><i class="far fa-trash-alt fa-lg"></i></span>';
      }
      $tbody[] = $b1.$b2;
      $datax[] = $tbody;
    }

    $output = [
      "draw"            => $_POST['draw'],
      "recordsTotal"    => $this->coblob->countalllistcoblob(),
      "recordsFiltered" => $this->coblob->countfilterlistcoblob(),
      "data"            => $datax
    ];
    echo json_encode($output);
  }

  public function addcob($value='')
  {
    $data['kode_cob'] = $this->input->post('kdcob');
    $data['cob'] = $this->input->post('nmcob');
    if ($this->input->post('tycob') != 0) {
      $data['id_tipe_cob'] = $this->input->post('tycob');
    }
    $data['add_time'] = date('Y-m-d H:i:s');
    $data['add_by'] = $this->session->userdata('sesi_id');
    if (cek_duplicate('m_cob', 'cob', '', '', $this->input->post('nmcob')) == 0) {
      $this->db->insert('m_cob', $data);
      $data = $this->db->insert_id();
      echo json_encode(['status' => 'sukses', 'list' => $data]);
    } else {
      echo json_encode(['status' => 'gagal', 'list' => '']);
    }
  }

  public function addlob($value='')
  {
    $data['lob']        = $this->input->post('nmlob');
    $data['diskon']     = $this->input->post('tplob');
    $data['kode_lob']   = $this->input->post('kdlob');
    $data['singkatan']  = $this->input->post('singkatan');
    $data['add_time']   = date('Y-m-d H:i:s');
    $data['add_by']     = $this->session->userdata('sesi_id');

    $inputan = ['LOWER(lob)'  => strtolower($this->input->post('nmlob')),
                'diskon'      => $this->input->post('tplob'),
                'singkatan'   => $this->input->post('singkatan')
                ];
    
    $cek = cek_duplicate_banyak('m_lob', '', '', $inputan);

    $ck_skt = cek_duplicate('m_lob', 'singkatan', '', '', $this->input->post('singkatan'));

    if ($cek == 0 && $ck_skt == 0) {
      $this->db->insert('m_lob', $data);
      echo json_encode(['status' => 'sukses']);
    } else {
      if ($ck_skt == 0) {
        echo json_encode(['status' => 'gagal_singkatan']);
      } else {
        echo json_encode(['status' => 'gagal']);
      }
    }
  }

  public function addbth($value='')
  {
    $data['id_cob'] = $this->input->post('cobrl');
    $data['id_lob'] = $this->input->post('lobrl');
    $data['add_time'] = date('Y-m-d H:i:s');
    $data['add_by'] = $this->session->userdata('sesi_id');

    $inputan = ['id_cob' => $this->input->post('cobrl'),
                'id_lob' => $this->input->post('lobrl')
                ];
    
    $cek = cek_duplicate_banyak('relasi_cob_lob', '', '', $inputan);

    if ($cek == 0) {
      $this->db->insert('relasi_cob_lob', $data);
      echo json_encode(['status' => 'sukses']);
    } else {
      echo json_encode(['status' => 'gagal']);
    }
  }

  public function showcob($id)
  {
    $data = $this->cob->cobbyid($id);
    echo json_encode($data);
  }

  public function showlob($id)
  {
    $data = $this->lob->lobbyid($id);
    echo json_encode($data);
  }

  public function showbth($id)
  {
    $data = $this->coblob->coblobbyid($id);
    echo json_encode($data);
  }

  public function editcob($id)
  {
    $data['cob'] = $this->input->post('nmcob');
    if ($this->input->post('tycob') != 0) {
      $data['id_tipe_cob'] = $this->input->post('tycob');
    }
    $data['add_time'] = date('Y-m-d H:i:s');
    $data['add_by'] = $this->session->userdata('sesi_id');
    
    if (cek_duplicate('m_cob', 'cob', 'id_cob', $id, $this->input->post('nmcob')) == 0) {
      $this->db->where('id_cob', $id);
      $this->db->update('m_cob', $data);
      echo json_encode(['status' => 'sukses']);
    } else {
      echo json_encode(['status' => 'gagal']);
    }
  }

  public function editlob($id)
  {
    $data['lob']        = $this->input->post('nmlob');
    $data['diskon']     = $this->input->post('tplob');
    $data['singkatan']  = $this->input->post('singkatan');
    $data['add_time']   = date('Y-m-d H:i:s');
    $data['add_by']     = $this->session->userdata('sesi_id');

    $inputan = ['LOWER(lob)'  => strtolower($this->input->post('nmlob')),
                'diskon'      => $this->input->post('tplob'),
                'singkatan'   => $this->input->post('singkatan')
                ];
    
    $cek    = cek_duplicate_banyak('m_lob', 'id_lob', $id, $inputan);

    $ck_skt = cek_duplicate('m_lob', 'singkatan', 'id_lob', $id, $this->input->post('singkatan'));

    if ($cek == 0 && $ck_skt == 0) {
      $this->db->where('id_lob', $id);
      $this->db->update('m_lob', $data);  
      echo json_encode(['status' => 'sukses']);
    } else {
      if ($ck_skt == 0) {
        echo json_encode(['status' => 'gagal_singkatan']);
      } else {
        echo json_encode(['status' => 'gagal']);
      }
    }
  }

  public function editbth($id)
  {
    $data['id_cob'] = $this->input->post('cobrl');
    $data['id_lob'] = $this->input->post('lobrl');
    $data['add_time'] = date('Y-m-d H:i:s');
    $data['add_by'] = $this->session->userdata('sesi_id');

    $inputan = ['id_cob' => $this->input->post('cobrl'),
                'id_lob' => $this->input->post('lobrl')
                ];
    
    $cek = cek_duplicate_banyak('relasi_cob_lob', 'id_relasi_cob_lob', $id, $inputan);
    
    if ($cek == 0) {
      $this->db->where('id_relasi_cob_lob', $id);
      $this->db->update('relasi_cob_lob', $data);
      echo json_encode(['status' => 'sukses']);
    } else {
      echo json_encode(['status' => 'gagal']);
    }
  }

  public function removecob($id)
  {
    $this->db->where('id_cob', $id);
    $this->db->delete('m_cob');

    echo json_encode(['status' => 'sukses']);
  }

  public function removelob($id)
  {
    $this->db->where('id_lob', $id);
    $this->db->delete('m_lob');

    echo json_encode(['status' => 'sukses']);
  }

  public function removebth($id)
  {
    $this->db->where('id_relasi_cob_lob', $id);
    $this->db->delete('relasi_cob_lob');

    echo json_encode(['status' => 'sukses']);
  }
}
?>
