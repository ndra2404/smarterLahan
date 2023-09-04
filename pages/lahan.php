<?php
if(isset($_GET['id'])){
    insert("delete from lahan where id='".$_GET['id']."'");
    echo "<script>location.href='?pages=lahan'</script>";
}
$lahan = query("select * from lahan");
?>
<div class="col-xl-12">
    <div class="card dz-card" id="bootstrap-table13">
        <div class="col-xl-6 p-4">
            <h1>Lahan</h1>
        </div>   
        <form class="profile-form" method="post" action="">
            <div class="col-xl-12 p-4">
                <div class="row">
                    <!-- <div class="mb-3 col-xl-10">
                        <input name="file" class="form-control col-xl-10" type="file" id="formFile">
                    </div>
                    <div class="col-xl-1">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div> -->
                    <div class="col-xl-1">
                    <a href="?pages=add-data" class="btn btn-primary">Add</a>
                    </div>
                </div>
            </div>
        </form>
        <div class="card-body pt-0">
            <div class="table-responsive">
                <table class="table primary-table-bordered">
                    <thead class="thead-primary">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">PH</th>
                            <th scope="col">Rotasi tanaman</th>
                            <th scope="col">Kelembaban (%)</th>
                            <th scope="col">Lereng</th>
                            <th scope="col">Irigasi Pengairan</th>
                            <th scope="col">Penyiapan lahan</th>
                            <th scope="col">Gambut</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no =1;
                            foreach($lahan as $r):
                        ?>
                        <tr>
                            <th><?=$no++?></th>
                            <td><?=$r->lahan?></td>
                            <td><?=$r->ph?></td>
                            <td><?=$r->rotasi_tanaman?></td>
                            <td><?=$r->kelembaban?></td>
                            <td><?=$r->lereng?></td>
                            <td><?=$r->irigasi_pengairan?></td>
                            <td><?=$r->penyiapan_lahan?></td>
                            <td><?=$r->gambut?></td>
                            <td>
                                <a class="btn btn-info" href='?pages=update-lahan&id=<?=$r->id?>'>Update</a>
                                <a class="btn btn-danger" href='?pages=lahan&id=<?=$r->id?>' onclick="return confirm('Are you sure you want delete data?')">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>	
    </div>
</div>