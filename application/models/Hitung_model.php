<?php
class Hitung_model extends CI_Model
{

    public function hitungJumlahSuara()
    {
        $query = $this->db->select_sum('jumlah_suara')
            ->get('datamasuk'); // Ganti 'nama_tabel' dengan nama tabel yang sesuai

        if ($query->num_rows() > 0) {
            return $query->row()->jumlah_suara;
        } else {
            return 0; // Jika tidak ada data, kembalikan 0
        }
    }

    public function getDataSuara()
    {
        $query = $this->db->select('tps, SUM(jumlah_suara) as total_suara')
            ->group_by('tps')
            ->get('datamasuk');

        return $query->result();
    }


    public function getDataTPS()
    {
        $query = $this->db->select('id, wilayah, SUM(jumlah_suara) as total_suara')
            ->group_by('wilayah')
            ->get('datamasuk');

        return $query->result();
    }

    public function getDataTPSWilayah()
    {
        $query = $this->db->get('data_wilayah'); // Ganti 'namatabel_tps_wilayah' dengan nama tabel Anda
        return $query->result();
    }


    public function getDataDesa()
    {
        $query = $this->db->select('wilayah')
            ->group_by('wilayah')
            ->get('datamasuk');

        return $query->result();
    }

    public function getDataTPSByDesa($namaDesa)
    {
        $query = $this->db->select('*')
            ->where('desa', $namaDesa)
            ->get('datamasuk');

        return $query->result();
    }

    public function inputDataMasuk($data)
    {
        $this->db->insert('datamasuk', $data);
    }

    public function get_data_tps()
    {
        $query = $this->db->select('*')
            ->get('data_tps');

        return $query->result();
    }

    public function get_data_wilayah()
    {
        $query = $this->db->select('*')
            ->get('data_wilayah');

        return $query->result();
    }

    public function getDataTPSByWilayah($wilayah)
    {
        $query = $this->db->select('tps, nama_lengkap, SUM(jumlah_suara) as total_suara')
            ->where('wilayah', $wilayah)
            ->group_by('tps')
            ->get('datamasuk');

        return $query->result();
    }

    public function getSortedData()
    {
        $this->db->order_by('wilayah', 'ASC');
        return $this->db->get('datamasuk')->result_array();
    }
}
