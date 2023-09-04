
<?php
if(isset($_GET['id'])){
    insert("delete from users where id='$_GET[id]'");
    echo "<script>location.href='?pages=users';</script>";
}
?>
<div class="col-xl-12">
    <div class="card dz-card" id="bootstrap-table13">                    
        <div class="card-header flex-wrap d-flex justify-content-between  border-0">
        <div>
            <a class="btn btn-primary" href="?pages=add-user">Tambah Users</a>
        </div>
        </div>
        <div class="card-body pt-0">
            <div class="table-responsive">
                <table class="table primary-table-bordered">
                    <thead class="thead-primary">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Username</th>
                            <th scope="col">Level</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $users = query("select * from users");
                            $no =1;
                            $level = array(1=>'Administrator',2=>'Petani',3=>'Penyuluh');
                            foreach($users as $r):
                        ?>
                        <tr>
                            <th><?=$no++?></th>
                            <td><?=$r->nama?></td>
                            <td><?=$r->username?></td>
                            <td><?=$level[$r->level]?></td>
                            <td>
                                <a class="btn btn-info" href='?pages=update-user&id=<?=$r->id?>'>Update</a>
                                <a class="btn btn-danger" href='?pages=users&id=<?=$r->id?>' onclick="return confirm('Are you sure you want delete data?')">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>	
    </div>
</div>