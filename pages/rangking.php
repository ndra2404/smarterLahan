<div class="col-xl-12">
    <div class="card dz-card" id="bootstrap-table13">                    
        <div class="card-header flex-wrap d-flex justify-content-between  border-0">
        <h1 class="heading mb-0">
           Jumlah Kelompok
        </h1>
        </div>
        <div class="card-body pt-0">
            <div class="table-responsive">
                <table class="table primary-table-bordered">
                    <thead class="thead-primary">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kelompok</th>
                            <th scope="col">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                         $nilaidata = query("select a.kelompok,IFNULL(jml,0)jml from lahan_harap a left join (
                            select kelompok,count(IFNULL(kelompok,0)) jml  from nilai n group by kelompok
                            )b on a.kelompok = b.kelompok order by b.jml desc");
                         $no=1;
                         foreach($nilaidata as $row):
                        ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$row->kelompok?></td>
                            <td><?=$row->jml?></td>
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
        <h3>
            NILAI AKHIR TINGKAT KESESUIAN LAHAN 
        </h3>
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
                            <td><?=$row->kelompok?></td>
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