<?php
if(isset($_POST['submit'])){
    $sql = "select * from kriteria";
    $kriteria = query2($sql);
    $val=array();
    foreach($kriteria as $row){
        $val[]=$row['ket']."='".$_POST[$row['ket']]."'";
    }
    $sqlsave = "update lahan_harap set kelompok='".$_POST['kelompok']."',keterangan='".$_POST['keterangan']."',". implode(',',$val)." where id='".$_GET['id']."'";
    insert($sqlsave);
    echo "<script>
    new swal({
    icon: 'success',
            title: 'Awesome!',
            text: 'Data berhasil disimpan',
            padding: '2em',
        }).then(function() {
            window.location ='?pages=lahan_harap';
        });</script>";
}
$q = mysqli_query($conn,"select * from lahan_harap where id='".$_GET['id']."'");
$data = mysqli_fetch_array($q);
?>
<div class="col-xl-12 col-xxl-12">
    <div class="card">
        <div class="card-header">
            <h4 class="heading mb-0">Tambah kategori </h4>
        </div>
        <div class="card-body">
            <form class="finance-hr" action="" method="post">
                <div class="form-group mb-3">
                    <label class="text-secondary font-w500">Kelempok
                    </label>
                    <input type="text" name="kelompok" value="<?=$data['kelompok']?>" class="form-control" placeholder="Kelompok">
                </div>
                <div class="form-group mb-3">
                    <label class="text-secondary font-w500">Keterangan
                    </label>
                    <input type="text" name="keterangan" value="<?=$data['keterangan']?>" class="form-control" placeholder="Sangat sesuai">
                </div>
                <?php
                $sql = "select * from kriteria";
                $kriteria = query2($sql);
                foreach($kriteria as $row):
                ?>
                <div class="form-group mb-3 mt-3">
                <div class="dropdown bootstrap-select default-select form-control wide form-control-sm">
                    <label class="text-secondary font-w500"><?=$row['kriteria']?></label>
                    <select name='<?=$row['ket']?>' class="default-select form-control wide form-control-sm">
                            <option>Pilih <?=$row['kriteria']?></option>
                            <?php
                                $sub = query("select * from sub_kriteria where id_kriteria='".$row['id_kriteria']."'");
                                foreach($sub as $r):
                            ?>
                                <option value='<?=$r->bobot?>' <?=$r->bobot==$data[$row['ket']]?'selected':''?>><?=$r->sub_kriteria?></option>
                            <?php
                            endforeach;
                            ?>
                    </select>					
                </div>
                </div>
                <?php
                endforeach;
                ?>
                <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
</div>