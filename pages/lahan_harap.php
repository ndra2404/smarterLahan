<?php
    $lahanharap = query2("select * From lahan_harap");
    $ph = getBobotKriteria(2);
    $rotasi = getBobotKriteria(7);
    $kelembaban = getBobotKriteria(3);
    $lereng = getBobotKriteria(6);
    $iri = getBobotKriteria(1);
    $lahan = getBobotKriteria(4);
    $gambut = getBobotKriteria(5);
    if(isset($_GET['id'])){
        insert("delete from lahan_harap where id='".$_GET['id']."'");
        echo "<script>location.href='?pages=lahan_harap'</script>";
    }
    $sql = "select * from kriteria";
    $kriterias = query2($sql);
?>
<div class="col-xl-12">
    <div class="card dz-card" id="bootstrap-table13">                    
        <div class="card-header flex-wrap d-flex justify-content-between  border-0">
        <div>
            <a class="btn btn-primary btn-sm" href="?pages=add-lahan-harap">Tambah data</a>
        </div>
        </div>
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
                                    <th scope="col"><?=$k['kriteria']?>(<?=$k['bobot']?>)</th>
                                    <?php
                                }
                            ?>
                            <th scope="col">Total</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no =1;
                            mysqli_query($conn,"truncate table nilai_harap");
                            foreach($lahanharap as $row):
                        ?>
                        <tr>
                            <th><?=$no++?></th>
                            <td><?=$row['kelompok'] ?></td>
                            <?php
                            $total=0;
                                foreach($kriterias as $k){
                                    $c =0;
                                    $c = $k['bobot']*$row[$k['ket']];
                                    ?>
                                    <td><?=$row[$k['ket']]?>*<?=$k['bobot']?>=<strong><?=$c?></strong></td>
                                    <?php
                                    $total+=$c;
                                }
                                insert("insert into nilai_harap(kategori,nilai) values('".$row['kelompok']."','".$total."')");
                            ?>
                            <td><span style="color:red"><b><?=$total?></b></span></td>
                            <td>
                                <a class="btn btn-info btn-sm" href='?pages=update-lahan-harap&id=<?=$row['id']?>'>Update</a>
                                <a class="btn btn-danger btn-sm" href='?pages=lahan_harap&id=<?=$row['id']?>' onclick="return confirm('Are you sure you want delete data?')">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>	
    </div>
</div>