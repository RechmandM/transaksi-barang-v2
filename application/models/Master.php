<?php
///////////////////// MANDIRI //////////////////
defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');

class Master extends CI_Model
{
    private $table;
    // Membuat encapsulation untuk properties table
    /// bisa di disable, not yet test
    public function __construct()
    {
        parent::__construct();
    }

    function getAll($table, $lainnya = null)
    {
        // bisa seeprti ini
        // return $this->db->query("SELECT * FROM $table");

        $query = "SELECT * FROM $table $lainnya";
        return $this->db->query($query);
    }
    function getAllSupp($table)
    {
        $query = $this->db->get_where($table);
        return $query->result();
    }

    function input_data($table, $fieldColumn)
    {
        $this->db->insert($table, $fieldColumn);
    }

    ////// with Query
    function getby_id($table, ?string $idfieldColumn, ?string $id)
    {
        $query = "SELECT * FROM $table where $idfieldColumn='$id'";
        return $this->db->query($query);
    }


    //// UNTUK EDITv2 baris /////
    // function edit_data($table, $idfieldcolumnpost, $id)
    // {

    //     $row = $this->db->get_where($table, [$idfieldcolumnpost => $id]);
    //     return $row->row();
    // }

    //// UNTUK EDITv2 Loop /////
    function edit_data($table, $idfieldcolumnpost, $id)
    {

        $row = $this->db->get_where($table, [$idfieldcolumnpost => $id]);
        return $row->result();
    }

    function update_data($table, $data, $idfield, $id)
    {
        // by bang erwin
        // $this->db->where($idfield);
        // $this->db->where([$idfield => $id]);
        $this->db->update($table, $data, [$idfield => $id]);
    }
    function pesan($table): void
    {
        $hasil = ucfirst($table);
        // $redirect = 'data' . $table;
        echo "<script type='text/javascript'>alert('Data $hasil berhasil disimpan..!!!')</script>";
        // echo "<script>window.location = '../$redirect'</script>";
        echo "<script>window.location = '../'</script>";
    }

    function pesan2($table): void
    {
        $hasil = ucfirst($table);
        echo "<script type='text/javascript'>alert('Data $hasil berhasil dihapus..!!!')</script>";
        // echo "<script>window.location = '../$redirect'</script>";
        echo "<script>window.location = '../../'</script>";
    }

    // function update_data1($table, $data, $idfield, $id)
    // {
    //     $where = $idwherearray;
    //     $this->db->delete($table, $where);

    //     $this->db->where($idasosiatifarray);
    //     $this->db->delete($table);
    // }

    function delete_data($table, $idfieldcolumn, $id)
    {
        $this->db->delete($table, [$idfieldcolumn => $id]);
    }

    function delete_transaksi($table_h, $idfieldcolumn, $id, $table_d, $idfieldcolumn_d)
    {
        $this->db->delete($table_h, [$idfieldcolumn => $id]);
        $this->db->delete($table_d, [$idfieldcolumn_d => $id]);
    }

    //////////////////////////////// KODE BARANG ///////////////////////////
    //////////////////////////////// KODE BARANG ///////////////////////////
    //////////////////////////////// KODE BARANG ///////////////////////////
    function kodeb($tipe, $idfieldColumn, $table)
    {
        // $query = "SELECT IFNULL(
        //     CONCAT('$tipe',LPAD(MAX(RIGHT(id_trans,4))+1,4,'0')), 
        //     CONCAT('$tipe',LPAD(1,4,'0'))) 
        //     AS nomor FROM transaksi_h WHERE id_trans= (SELECT MAX(id_trans) FROM transaksi_h ORDER BY id_trans DESC)";

        // // $query = "SELECT IFNULL(CONCAT('$tipe',LPAD(MAX(RIGHT($idfield,4))+1,4,'0')), CONCAT('$tipe',LPAD(1,4,'0'))) FROM $table WHERE $idfield= (SELECT MAX($idfield) FROM $table ORDER BY $idfield DESC)";
        // $row_cek = "SELECT * FROM $table";
        // $row_cek2 = $this->db->query($row_cek)->row();
        $query = "SELECT * FROM $table ORDER BY $idfieldColumn DESC";
        $row = $this->db->query($query)->result();
        if ($row == null) :
            return $tipe . '0001';
        else :
            foreach ($row as $rowdata) :
                $hasil = substr($rowdata->kdbarang, -4);
                if (substr($hasil, 0, 1) == 0) :
                    if (substr($hasil, 0, 2) == 00) :
                        if (substr($hasil, 0, 3) == 000) :
                            if (substr($hasil, 0, 4) == 0000) :
                                return $tipe . '0001';
                            else :
                                $ambil = substr($hasil, -1);
                                $kembali = $ambil + 1;
                                if ($kembali >= 10) :
                                    return $tipe . '00' . $kembali;
                                else :
                                    return $tipe . '000' . $kembali;
                                endif;
                            endif;
                        else :
                            $ambil = substr($hasil, -2);
                            $kembali = $ambil + 1;
                            if ($kembali >= 100) :
                                return $tipe . '0' . $kembali;
                            else :
                                return $tipe . '00' . $kembali;
                            endif;
                        endif;
                    else :
                        $ambil = substr($hasil, -3);
                        $kembali = $ambil + 1;
                        if ($kembali >= 1000) :
                            return $tipe . $kembali;
                        else :
                            return $tipe . '0' . $kembali;
                        endif;
                    endif;
                else :
                    $ambil = substr($hasil, -4);
                    $kembali = $ambil + 1;
                    if ($kembali > 9999) :
                        return strtoupper("kode melebihi batas, silahkan pergi dari sini..");
                    else :
                        return $tipe . $kembali;
                    endif;
                endif;
                break;
            endforeach;
        endif;
    }

    //////////////////////////////// KODE BARANG v2 ///////////////////////////
    //////////////////////////////// KODE BARANG v2 ///////////////////////////
    //////////////////////////////// KODE BARANG v2 ///////////////////////////
    function kodebv2($tipe, $idfieldColumn, $table, $key1, $key2)
    {
        $query = "SELECT * FROM $table ORDER BY $idfieldColumn DESC LIMIT 1";
        $row = $this->db->query($query)->result();
        if ($row != null) :
            foreach ($row as $rowdata) :
                $ambil = (int)substr($rowdata->$idfieldColumn, $key1, $key2) + 1;
                if ($ambil > 9999) :
                    return strtoupper("kode melebihi batas, silahkan pergi dari sini..");
                endif;
                $ambil = sprintf("%0{$key2}s", $ambil);
                return $tipe . $ambil;
            endforeach;
        else :
            return $tipe . '0001';
        endif;
    }

    //autogenerate dengan query
    function autogenerate($table, $kode, $tipe)
    {
        $sql = "SELECT IFNULL(
             CONCAT('$tipe',LPAD(MAX(RIGHT($kode,4))+1,4,'0')), 
            CONCAT('$tipe',LPAD(1,4,'0'))) 
            AS nomor FROM $table WHERE $kode= (SELECT MAX($kode) FROM $table ORDER BY $kode DESC)";
        return $this->db->query($sql)->row()->nomor;
    }

    ///////////////////////////////////////// KODE TGL //////////////////////
    ///////////////////////////////////////// KODE TGL //////////////////////
    ///////////////////////////////////////// KODE TGL //////////////////////
    function kodetgl($tipe): string
    {
        $kodetj = date('ymdhis');
        if (strlen($kodetj) > 12) :
            return strtoupper("kode melebihi batas, silahkan pergi dari sini..");
        else :
            return $tipe . $kodetj;
        endif;
    }
    ///////////////////////////////////////// DASHBOARD //////////////////////
    ///////////////////////////////////////// DASHBOARD //////////////////////
    ///////////////////////////////////////// DASHBOARD //////////////////////

    function jumlahData($table)
    {
        $rows = $this->db->get_where($table)->result();
        $jumlah = count($rows);
        return $jumlah;
    }

    function riwayat($table, $field)
    {
        // $rows = $this->db->get_where($table);
        // return $rows->result();
        $this->db->order_by($field, 'DESC');
        return $this->db->get_where($table)->result();
    }

    function riwayat_baru($table, $idfieldColumn): void
    {

        $this->db->insert($table, $idfieldColumn);
    }

    //////////// pribadi ///////////
    function tampil_data_custdansupp($table)
    {
        $query = "SELECT * FROM $table";
        return $this->db->query($query);
    }

    //////////// fungsi joind ////////////
    function getAllJoin($query)
    {
        $table = $query['table'];
        $select = $query['select'];
        $join = $query['join'];

        $sql = "SELECT $select FROM $table $join";
        $sql_full = "SELECT a.* customer a order by a.id ASC "; //===================

        $this->db->query($sql);
        if ($query['where'] != '') {
            $sql .= 'where ' . $query['where'];
        }

        return $this->db->query($sql);
    }
}
