<?php
    $allket = query2("select * from kriteria");
    foreach($allket as $rows){
        $kriterias = query2("select * from sub_kriteria where id_kriteria='".$rows['id_kriteria']."'");
        $b = count($kriterias);
        foreach($kriterias as $row){
            $bobot = getBobot($row['rangking'],$b);
            $update = "update sub_kriteria set bobot='".$bobot."' where id='$row[id]'";
            insert($update);
        }
    }
    $subkriteria = query("select a.*,b.kriteria from sub_kriteria a left join kriteria b on a.id_kriteria = b.id_kriteria");
    if(isset($_GET['id'])){
        if(isset($_GET['idsub'])){
            $q = "delete from sub_kriteria where id='".$_GET['idsub']."'";
            insert($q);
            echo "<script>
    new swal({
    icon: 'success',
            title: 'Awesome!',
            text: 'Data berhasil dihapus',
            padding: '2em',
        }).then(function() {
            window.location ='?pages=subkriteria&id=$_GET[id]';
        });</script>";
        }
        $subkriteria = query("select a.*,b.kriteria from sub_kriteria a left join kriteria b on a.id_kriteria = b.id_kriteria
        where a.id_kriteria='".$_GET['id']."'
        ");
    }
?>
<div class="col-xl-12">
    <div class="card dz-card" id="bootstrap-table13">                    
        <div class="card-header flex-wrap d-flex justify-content-between  border-0">
            <?php
                if(isset($_GET['id'])){
                    ?>
                    <a href='?pages=add-subkri&id=<?=$_GET['id']?>' class="btn btn-sm btn-primary">Tambah Sub Kriteria</a>
                    <?php
                }
            ?>
        </div>
        <div class="card-body pt-0">
            <div class="table-responsive">
                <table class="table primary-table-bordered">
                    <thead class="thead-primary">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kriteria</th>
                            <th scope="col">Sub kriteria</th>
                            <th scope="col">Rangking</th>
                            <th scope="col">Bobot</th>
                            <?php
                                if(isset($_GET['id'])){
                                    echo ' <th scope="col">Action</th>';
                                }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no =1;
                            foreach($subkriteria as $r):
                        ?>
                        <tr>
                            <th><?=$no++?></th>
                            <td><?=$r->kriteria?></td>
                            <td><?=$r->sub_kriteria?></td>
                            <td><?=$r->rangking?></td>
                            <td><?=$r->bobot?></td>
                            <?php
                                if(isset($_GET['id'])){
                                    ?>
                                    <td><a href='?pages=subkriteria&id=<?=$_GET['id']?>&idsub=<?=$r->id?>' class='btn btn-danger btn-sm'>Delete</a></td>
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