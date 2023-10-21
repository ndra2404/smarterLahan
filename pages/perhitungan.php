<?php
    $lahan = query2("select * From lahan");
    mysqli_query($conn,"truncate table lahan_transform");
    foreach ($lahan as $row) {

        $sql = "select * from kriteria";
        $kriterias = query2($sql);
        $ket=array();
        $ketvalue=array();
        foreach($kriterias as $k){
            array_push($ket,$k['ket']);
            array_push($ketvalue,getValueBobot($k['id_kriteria'],$row[$k['ket']]));
        }
        $sql = "insert into lahan_transform(lahan,".implode(',',$ket).")
        values ('".$row['lahan']."',".implode(',',$ketvalue).")";
        insert($sql);
    }
    $lahanTran = query2("select * From lahan_transform");
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
                            <?php
                                foreach($kriterias as $k){
                                    ?>
                                    <th scope="col"><?=$k['ket']?></th>
                                    <?php
                                }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no =1;
                            foreach($lahanTran as $r):
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
                            <?php
                                foreach($kriterias as $k){
                                    ?>
                                    <th scope="col"><?=$k['kriteria']?>(<?=$k['bobot']?>)</th>
                                    <?php
                                }
                            ?>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no =1;
                            
                            mysqli_query($conn,"truncate table nilai");
                            foreach($lahanTran as $r):
                                //insert("insert into nilai(lahan,nilai,kelompok) values('".$r->lahan."','".$total."','".$kel."')");
                        ?>
                        <tr>
                            <th><?=$no++?></th>
                            <td><?=$r['lahan'] ?></td>
                            <?php
                            $total=0;
                                foreach($kriterias as $k){
                                    $c =0;
                                    $c = $k['bobot']*$r[$k['ket']];
                                    ?>
                                    <td><?=$r[$k['ket']]?>*<?=$k['bobot']?>=<strong><?=$c?></strong></td>
                                    <?php
                                    $total+=$c;
                                }
                                $kel = getKelompok($total);
                                //insert("insert into nilai_harap(kategori,nilai) values('".$row['kelompok']."','".$total."')");
                                insert("insert into nilai(lahan,nilai,kelompok) values('".$row['lahan']."','".$total."','".$kel."')");
                            ?>
                           
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