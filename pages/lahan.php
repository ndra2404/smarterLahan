<?php
if(isset($_GET['id'])){
    insert("delete from lahan where id='".$_GET['id']."'");
    echo "<script>location.href='?pages=lahan'</script>";
}
$lahan = query2("select * from lahan");
$sql = "select * from kriteria";
$kriterias = query2($sql);
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
                    <a href="?pages=add-data" class="btn btn-primary btn-sm">Add</a>
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
                            <?php
                                foreach($kriterias as $k){
                                    ?>
                                    <th scope="col"><?=$k['kriteria']?></th>
                                    <?php
                                }
                            ?>
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
                            <td><?=$r['lahan']?></td>
                            <?php
                                foreach($kriterias as $k){
                                    ?>
                                    <td><?=$r[$k['ket']]?></td>
                                    <?php
                                }
                            ?>
                            <td>
                                <a class="btn btn-info btn-sm" href='?pages=update-lahan&id=<?=$r['id']?>'>Update</a>
                                <a class="btn btn-danger btn-sm" href='?pages=lahan&id=<?=$r['id']?>' onclick="return confirm('Are you sure you want delete data?')">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>	
    </div>
</div>