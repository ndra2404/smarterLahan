<?php
if(isset($_POST['submit'])){
    $sql = "select * from kriteria";
    $kriteria = query2($sql);
    $val=array();
    foreach($kriteria as $row){
        $val[]=$row['ket']."='".$_POST[$row['ket']]."'";
    }
    $sqlsave = "update lahan set lahan='".$_POST['kelompok']."',". implode(',',$val)." where id='".$_GET['id']."'";
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
$q = mysqli_query($conn,"select * from lahan where id='".$_GET['id']."'");
$data = mysqli_fetch_array($q);
?>
<div class="col-xl-12 col-xxl-12">
    <div class="card">
        <div class="card-header">
            <h4 class="heading mb-0">Update Lahan</h4>
        </div>
        <div class="card-body">
            <form class="finance-hr" action="" method="post">
                <div class="form-group mb-3">
                    <label class="text-secondary font-w500">lahan
                    </label>
                    <input type="text" name="kelompok" value="<?=$data['lahan']?>" class="form-control" placeholder="Kelompok">
                </div>
                <?php
                $sql = "select * from kriteria";
                $kriteria = query2($sql);
                foreach($kriteria as $row):
                ?>
                <div class="form-group mb-3 mt-3">
                <div class="form-group mb-3 mt-3">
                <div class="dropdown bootstrap-select default-select form-control wide form-control-sm">
                    <label class="text-secondary font-w500"><?=$row['kriteria']?></label>
                    <input type="number" required name='<?=$row['ket']?>' value="<?=$data[$row['ket']]?>" step="any" class="form-control form-control-sm" placeholder="<?=$row['kriteria']?>">
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