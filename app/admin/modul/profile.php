<?php
require_once '../../config/config.php';

session_start();
$act = $_POST['act'];
$id  = $_POST['id'];

date_default_timezone_set("Asia/Jakarta");

// ////////m_siswa//////////

$id_pgw         = $_POST['id_pgw'];
$nama_pgw       = $_POST['nama_pgw'];
$nip_pgw        = $_POST['nip_pgw'];
$pangkat_pgw    = $_POST['pangkat_pgw'];
$jabatan_pgw    = $_POST['jabatan_pgw'];
$unit_kerja_pgw = $_POST['unit_kerja_pgw'];
$no_telpn_pgw   = $_POST['no_telpn_pgw'];
$alamat_pgw     = $_POST['alamat_pgw'];
$img_pgw        = $_POST['img_pgw'];

$old_password = $_POST['old_password'];
$password     = $_POST['password'];
$pass         = $_POST['pass'];

// ////////////////////////////////////////////////m_siswa//////////////////////////////////////////////////

if ($act == "profile") {
    $sql  = "SELECT concat(id_pgw,'#',nama_pgw,'#',nip_pgw,'#',pangkat_pgw,'#',jabatan_pgw,'#',unit_kerja_pgw,'#',no_telpn_pgw,'#',alamat_pgw,'#',img_pgw) as name FROM m_pgw WHERE id_pgw = '" . $id . "' limit 1";
    $row  = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($row);
    echo $data['name'];
} elseif ($act == "editprofile" AND $old_password=="" AND $password=="" AND $pass=="") {
    $log1 = "UPDATE m_pgw SET nama_pgw = '" . $nama_pgw . "', nip_pgw = '" . $nip_pgw . "', pangkat_pgw = '" . $pangkat_pgw . "', jabatan_pgw = '" . $jabatan_pgw . "', unit_kerja_pgw = '" . $unit_kerja_pgw . "', no_telpn_pgw = '" . $no_telpn_pgw . "', alamat_pgw = '" . $alamat_pgw . "', img_pgw = '" . $img_pgw . "' WHERE id_pgw = '" . $id . "'";
    if ($conn->query($log1) == true) {
        $log2 = "UPDATE m_user SET nama_user = '" . $nama_pgw . "', username = '" . $nip_pgw . "' WHERE username = '" . $nip_pgw . "'";
    }
    if ($conn->query($log2) == true) {
        $status = '1'; //Berhasil
        $_SESSION['nama_user']= $nama_pgw;
        $_SESSION['username']= $nip_pgw;
    }
    else {
        echo "error";
    }
} elseif ($act == "editprofile" AND $old_password!="" AND $password!="" AND $pass!="") {
    $log1 = "UPDATE m_pgw SET nama_pgw = '" . $nama_pgw . "', nip_pgw = '" . $nip_pgw . "', pangkat_pgw = '" . $pangkat_pgw . "', jabatan_pgw = '" . $jabatan_pgw . "', unit_kerja_pgw = '" . $unit_kerja_pgw . "', no_telpn_pgw = '" . $no_telpn_pgw . "', alamat_pgw = '" . $alamat_pgw . "', img_pgw = '" . $img_pgw . "' WHERE id_pgw = '" . $id . "'";
    if ($conn->query($log1) == true) {
        $enc  = base64_encode(base64_encode($password));
        $log2 = "UPDATE m_user SET nama_user = '" . $nama_pgw . "', username = '" . $nip_pgw . "', password = '" . $enc . "' WHERE username = '" . $nip_pgw . "'";
    }
    if ($conn->query($log2) == true) {
        $status = '1'; //Berhasil
        $_SESSION['nama_user']= $nama_pgw;
        $_SESSION['username']= $nip_pgw;
        $_SESSION['password']= $enc;
    }
    else {
        echo "error";
    }
}

echo $status;
?>