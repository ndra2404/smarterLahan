<?php
if(isset($_POST['submit'])){
    $sql = "insert into users(nama,username,password,level) values('".$_POST['nama']."','".$_POST['username']."','".md5($_POST['password'])."','".$_POST['level']."')";
    insert($sql);
    echo "<script>
    new swal({
    icon: 'success',
            title: 'Awesome!',
            text: 'Data berhasil disimpan',
            padding: '2em',
        }).then(function() {
            window.location ='?pages=users';
        });</script>";
}
?>
<div class="col-xl-12 col-lg-12">
    <div class="card profile-card card-bx">
        <div class="card-header">
            <h6 class="title">Add User</h6>
        </div>
        <form class="profile-form" method="post" action="">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <label class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" value="" placeholder="Nama">
                    </div>
                    <div class="col-sm-6 m-b30">
                        <label class="form-label">Email</label>
                        <input type="email" name="username" class="form-control">
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
                            <option value="1">Administrator</option>
                            <option value="2">Petani</option>
                            <option value="3">Penyuluh</option>
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