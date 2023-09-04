<?php
    $kriteria = query("select * from kriteria");
?>
<div class="col-xl-12">
    <div class="card dz-card" id="bootstrap-table13">                    
        <div class="card-header flex-wrap d-flex justify-content-between  border-0">
        </div>
        <div class="card-body pt-0">
            <div class="table-responsive">
                <table class="table primary-table-bordered">
                    <thead class="thead-primary">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kriteria</th>
                            <th scope="col">Rangking</th>
                            <th scope="col">Bobot</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no =1;
                            foreach($kriteria as $r):
                        ?>
                        <tr>
                            <th><?=$no++?></th>
                            <td><?=$r->kriteria?></td>
                            <td><?=$r->rangking?></td>
                            <td><?=$r->bobot?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>	
    </div>
</div>