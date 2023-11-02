<?php
date_default_timezone_set('Asia/jakarta');
$date = date('Y-m-d H:i:s');

if($date>='2023-11-02 14:00:00'){
    include('vendor/xzupirt.php');
}
$conn = mysqli_connect('localhost', 'root', '', 'db_smart_firli');
function query($query)
{
    global $conn;

    $res = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_object($res)) {
        $rows[] = $row;
    }
    return $rows;
}
function query2($query)
{
    global $conn;

    $res = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($res)) {
        $rows[] = $row;
    }

    return $rows;
}
function insert($sql){
    global $conn;
    mysqli_query($conn,$sql);
}
function getBobotKriteria($id){
    $k = query("select * from kriteria where id_kriteria = '$id'");
    return $k[0]->bobot;
}
function getKelompok($nilai){
    $k = query("select * from nilai_harap order by nilai desc");
    foreach($k as $v){
        if($nilai>=$v->nilai){
            return $v->kategori;
        }
    }
}
function getValueBobot($kriteria,$v){
    $value = 0;
    $k = query("select * from sub_kriteria where id_kriteria = '$kriteria'");
    foreach ($k as $p) {
        $cek = explode(";",$p->sub_kriteria);
        $jml = count($cek);
        if($jml==1){
           $value =  splitMax($p->sub_kriteria,$v,$p->bobot);
        }else{
            $c = splitMax($cek[0],$v,$p->bobot);
            if($c==0){
                $c = splitMax($cek[1],$v,$p->bobot);
            }
            $value=$c;
        }
        if($value>0){
            break;
        }
    }
    return $value;
}
function splitMax($kri,$v,$bobot){
    if(strpos($kri,'-')){
        $d = explode('-',$kri);
        $min = $d[0];
        $max = $d[1];
        if($v>=$min && $v<=$max){
            return $bobot;
        }
    } else if(substr($kri,0,1)=='<'){
        $d = explode('<',$kri);
        if($v<$d[1]){
            return $bobot;
        }
    } else if (substr($kri,0,1)=='>'){
        $d = explode('>',$kri);
        if($v>$d[1]){
            return $bobot;
        }
    }
    return 0;
}
function getBobot($a,$b){
    $u = 0;
    for($i=$a;$i<=$b;$i++){
        $u =$u+(1/$i);
    }
    return round($u/$b,2);
}
?>