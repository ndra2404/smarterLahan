<?php
if(isset($_POST['submit'])){
    if($_POST['password']!=""){
        $sql = "update users set level='".$_POST['level']."',nama='".$_POST['nama']."', password='".md5($_POST['password'])."' where id='".$_GET['id']."'";
    }else{
        $sql = "update users set level='".$_POST['level']."',nama='".$_POST['nama']."' where id='".$_GET['id']."'";
    }
    insert($sql);
    echo "<script>
    new swal({
    icon: 'success',
            title: 'Awesome!',
            text: 'Data berhasil diupdate',
            padding: '2em',
        }).then(function() {
            window.location ='?pages=users';
        });</script>";
}
$q = mysqli_query($conn,"select * from users where id='".$_GET['id']."'");
$data = mysqli_fetch_object($q);
?>

<div class="col-xl-12 col-lg-12">
    <div class="card profile-card card-bx">
        <div class="card-header">
            <h6 class="title">Update User</h6>
        </div>
        <form class="profile-form" method="post" action="">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <label class="form-label">Nama</label>
                        <input type="text" name="nama" value="<?=$data->nama?>" class="form-control" value="" placeholder="Nama">
                    </div>
                    <div class="col-sm-6 m-b30">
                        <label class="form-label">Email</label>
                        <input type="email" readonly name="username" value="<?=$data->username?>" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 ">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" value="" placeholder="password">
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label">Level</label>
                        <select name="level" class="default-select  form-control wide" >
                            <option value="">---</option>
                            <option value="1" <?=$data->level==1?'selected':''?>>Administrator</option>
                            <option value="2" <?=$data->level==2?'selected':''?>>Petani</option>
                            <option value="3" <?=$data->level==3?'selected':''?>>Penyuluh</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>