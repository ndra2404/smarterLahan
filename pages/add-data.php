<?php
if(isset($_POST['submit'])){
    $sql = "select * from kriteria";
    $kriteria = query2($sql);
    $kri=array();
    $val=array();
    foreach($kriteria as $row){
        $kri[]=$row['ket'];
        $val[]="'".$_POST[$row['ket']]."'";
    }
    $sqlsave = "insert into lahan(lahan,".implode(',',$kri).") values('".$_POST['kelompok']."',".implode(',',$val).")";
    insert($sqlsave);
    echo "<script>
    new swal({
    icon: 'success',
            title: 'Awesome!',
            text: 'Data berhasil disimpan',
            padding: '2em',
        }).then(function() {
            window.location ='?pages=lahan';
        });</script>";
}
?>
<div class="col-xl-12 col-xxl-12">
    <div class="card">
        <div class="card-header">
            <h4 class="heading mb-0">Tambah Lahan </h4>
        </div>
        <div class="card-body">
            <form class="finance-hr" action="" method="post">
                <div class="form-group mb-3">
                    <label class="text-secondary font-w500">Lahan
                    </label>
                    <input type="text" name="kelompok" required class="form-control" placeholder="lahan">
                </div>
                <?php
                $sql = "select * from kriteria";
                $kriteria = query2($sql);
                foreach($kriteria as $row):
                ?>
                <div class="form-group mb-3 mt-3">
                <div class="dropdown bootstrap-select default-select form-control wide form-control-sm">
                    <label class="text-secondary font-w500"><?=$row['kriteria']?></label>
                    <input type="number" required name='<?=$row['ket']?>' step="any" class="form-control form-control-sm" placeholder="<?=$row['kriteria']?>">
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