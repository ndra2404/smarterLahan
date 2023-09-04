<?php
    $lahan = query("select * From lahan");
    mysqli_query($conn,"truncate table lahan_transform");
    foreach ($lahan as $row) {
        $ip = getValueBobot(1,$row->irigasi_pengairan);
        $ph = getValueBobot(2,$row->ph);
        $kelembaban = getValueBobot(3,$row->kelembaban);
        $penyiapan_lahan = getValueBobot(4,$row->penyiapan_lahan);
        $gambut = getValueBobot(5,$row->gambut);
        $lereng = getValueBobot(6,$row->lereng);
        $rotasi_tanaman = getValueBobot(7,$row->rotasi_tanaman);
        $sql = "insert into lahan_transform(lahan,irigasi_pengairan,ph,kelembaban,penyiapan_lahan,gambut,lereng,rotasi_tanaman)
        values ('".$row->lahan."','".$ip."','".$ph."','".$kelembaban."','".$penyiapan_lahan."','".$gambut."','".$lereng."','".$rotasi_tanaman."')";
        insert($sql);
    }

    $lahanTran = query("select * From lahan_transform");
?>
<div class="col-xl-12">
    <div class="card dz-card" id="bootstrap-table13">                    
        <div class="card-header flex-wrap d-flex justify-content-between  border-0">
        <h1>
            Data Transformation
        </h1>
        </div>
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no =1;
                            foreach($lahanTran as $r):
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
                            
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>	
    </div>
</div>

<?php
    $ph = getBobotKriteria(2);
    $rotasi = getBobotKriteria(7);
    $kelembaban = getBobotKriteria(3);
    $lereng = getBobotKriteria(6);
    $iri = getBobotKriteria(1);
    $lahan = getBobotKriteria(4);
    $gambut = getBobotKriteria(5);
?>
<div class="col-xl-12">
    <div class="card dz-card" id="bootstrap-table13">                    
        <div class="card-header flex-wrap d-flex justify-content-between  border-0">
        <h1>
            Data Perhitungan
        </h1>
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no =1;
                            
                            mysqli_query($conn,"truncate table nilai");
                            foreach($lahanTran as $r):
                                $hph = round($r->ph*$ph,6);
                                $hrotasi = round($r->rotasi_tanaman*$rotasi,6);
                                $hkelembaban = round($r->kelembaban*$kelembaban,6);
                                $hlereng = round($r->lereng*$lereng,6);
                                $hlahan = round($r->penyiapan_lahan*$lahan,6);
                                $hiri = round($r->irigasi_pengairan*$iri,6);
                                $hgambut = round($r->gambut*$gambut,6);

                                
                                $total = round($hph+$hrotasi+$hkelembaban+$hlereng+$hlahan+$hiri+$hgambut,6);
                                $kel = getKelompok($total);
                                insert("insert into nilai(lahan,nilai,kelompok) values('".$r->lahan."','".$total."','".$kel."')");
                        ?>
                        <tr>
                            <th><?=$no++?></th>
                            <td><?=$r->lahan ?></td>
                            <td><?=$r->ph?>*<?=$ph?> = <b><?=$hph?></b></td>
                            <td><?=$r->rotasi_tanaman?>*<?=$rotasi?> = <b><?=$hrotasi?></b></td>
                            <td><?=$r->kelembaban?>*<?=$kelembaban?> = <b><?=$hkelembaban?></b></td>
                            <td><?=$r->lereng?>*<?=$lereng?> = <b><?=$hlereng?></b></td>
                            <td><?=$r->irigasi_pengairan?>*<?=$iri?> = <b><?=$hiri?></b></td>
                            <td><?=$r->penyiapan_lahan?>*<?=$lahan?> = <b><?=$hlahan?></b></td>
                            <td><?=$r->gambut?>*<?=$gambut?> = <b><?=$hgambut?></b></td>
                            <td><span style="color:red"><b><?=$total?></b></span></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>	
    </div>
</div>

<div class="col-xl-12">
    <div class="card dz-card" id="bootstrap-table13">                    
        <div class="card-header flex-wrap d-flex justify-content-between  border-0">
        <h4>
            BATAS NILAI
        </h4>
        </div>
        <div class="card-body pt-0">
            <div class="table-responsive">
                <table class="table primary-table-bordered">
                    <thead class="thead-primary">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">kelompok</th>
                            <th scope="col">Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                         $nilaidata = query("select * from nilai_harap");
                         $no=1;
                         foreach($nilaidata as $row):
                        ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$row->kategori?></td>
                            <td><b><?=$row->nilai?></b></td>
                        </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-12">
    <div class="card dz-card" id="bootstrap-table13">                    
        <div class="card-header flex-wrap d-flex justify-content-between  border-0">
        <h4>
            NILAI AKHIR TINGKAT KESESUIAN LAHAN 
        </h4>
        </div>
        <div class="card-body pt-0">
            <div class="table-responsive">
                <table class="table primary-table-bordered">
                    <thead class="thead-primary">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Nilai</th>
                            <th scope="col">kategori</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                         $nilaidata = query("select * from nilai");
                         $no=1;
                         foreach($nilaidata as $row):
                        ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$row->lahan?></td>
                            <td><?=$row->nilai?></td>
                            <td><b><?=$row->kelompok?></b></td>
                        </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>