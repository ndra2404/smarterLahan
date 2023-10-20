<?php
    if(isset($_GET['id'])){
        $alter = "alter table lahan drop ".$_GET['id']."";
        insert($alter);
        $alter = "alter table lahan_harap drop ".$_GET['id']."";
        insert($alter);        
        $alter = "alter table lahan_transform drop ".$_GET['id']."";
        insert($alter);

        $q = "delete from kriteria where ket='".$_GET['id']."'";
        insert($q);

        echo "<script>
    new swal({
    icon: 'success',
            title: 'Awesome!',
            text: 'Data berhasil dihapus',
            padding: '2em',
        }).then(function() {
            window.location ='?pages=kriteria';
        });</script>";
    }
    $sql = "select * from kriteria";
    $kriterias = query2($sql);
    $b = count($kriterias);
    foreach($kriterias as $row){
        $bobot = getBobot($row['rangking'],$b);
        $update = "update kriteria set bobot='".$bobot."' where id_kriteria='$row[id_kriteria]'";
        insert($update);
    }
    $kriteria = query("select * from kriteria");
?>
<div class="col-xl-12">
    <div class="card dz-card" id="bootstrap-table13">                    
        <div class="card-header flex-wrap d-flex justify-content-between  border-0">
            <a href='?pages=add-kriteria' class="btn btn-sm btn-primary">Tambah Kriteria</a>
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
                            <th scope="col">Sub Kriteria</th>
                            <th scope="col">Action</th>
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
                            <td><a href='?pages=subkriteria&id=<?=$r->id_kriteria?>'>View</a></td>
                            <td><a href='?pages=kriteria&id=<?=$r->ket?>' class='btn btn-danger btn-sm'>Delete</a></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>	
    </div>
</div>