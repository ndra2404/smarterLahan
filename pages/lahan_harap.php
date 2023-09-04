<?php
    $lahanharap = query("select * From lahan_harap");
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
?>
<div class="col-xl-12">
    <div class="card dz-card" id="bootstrap-table13">                    
        <div class="card-header flex-wrap d-flex justify-content-between  border-0">
        <div>
            <a class="btn btn-primary" href="?pages=add-lahan-harap">Tambah data</a>
        </div>
        </div>
        <div class="card-body pt-0">
            <div class="table-responsive">
                <table class="table primary-table-bordered">
                    <thead class="thead-primary">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">PH * (<?php echo $ph?>)</th>
                            <th scope="col">Rotasi tanaman * (<?php echo $rotasi?>)</th>
                            <th scope="col">Kelembaban (%) * (<?php echo $kelembaban?>)</th>
                            <th scope="col">Lereng * (<?php echo $lereng?>)</th>
                            <th scope="col">Irigasi Pengairan * (<?php echo $iri?>)</th>
                            <th scope="col">Penyiapan lahan * (<?php echo $lahan?>)</th>
                            <th scope="col">Gambut * (<?php echo $gambut?>)</th>
                            <th scope="col">Total</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no =1;
                            mysqli_query($conn,"truncate table nilai_harap");
                            foreach($lahanharap as $row):

                                $ipr = $row->irigasi_pengairan;
                                $phr = $row->ph;
                                $kelembabanr = $row->kelembaban;
                                $penyiapan_lahanr = $row->penyiapan_lahan;
                                $gambutr = $row->gambut;
                                $lerengr =$row->lereng;
                                $rotasi_tanamanr =$row->rotasi_tanaman;

                                $hph = round($ph*$phr,6);
                                $hrotasi = round($rotasi*$rotasi_tanamanr,6);
                                $hkelembaban = round($kelembaban*$kelembabanr,6);
                                $hlereng = round($lereng*$lerengr,6);
                                $hlahan = round($lahan*$penyiapan_lahanr,6);
                                $hiri = round($iri*$ipr,6);
                                $hgambut = round($gambut*$gambutr,6);

                                $total = round($hph+$hrotasi+$hkelembaban+$hlereng+$hlahan+$hiri+$hgambut,6);
                                insert("insert into nilai_harap(kategori,nilai) values('".$row->kelompok."','".$total."')");
                        ?>
                        <tr>
                            <th><?=$no++?></th>
                            <td><?=$row->kelompok ?></td>
                            <td><?=$ph?>*<?=$phr?> = <b><?=$hph?></b></td>
                            <td><?=$rotasi?>*<?=$rotasi_tanamanr?> = <b><?=$hrotasi?></b></td>
                            <td><?=$kelembaban?>*<?=$kelembabanr?> = <b><?=$hkelembaban?></b></td>
                            <td><?=$lereng?>*<?=$lerengr?> = <b><?=$hlereng?></b></td>
                            <td><?=$iri?>*<?=$ipr?> = <b><?=$hiri?></b></td>
                            <td><?=$lahan?>*<?=$penyiapan_lahanr?> = <b><?=$hlahan?></b></td>
                            <td><?=$gambut?>*<?=$gambutr?> = <b><?=$hgambut?></b></td>
                            <td><span style="color:red"><b><?=$total?></b></span></td>
                            <td>
                                <a class="btn btn-info" href='?pages=update-lahan-harap&id=<?=$row->id?>'>Update</a>
                                <a class="btn btn-danger" href='?pages=lahan_harap&id=<?=$row->id?>' onclick="return confirm('Are you sure you want delete data?')">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>	
    </div>
</div>