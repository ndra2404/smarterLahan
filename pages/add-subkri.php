<?php
if(isset($_POST['submit'])){
    

    $kriteria = $_POST['kriteriaRank'];
    

    $result=array();
    foreach( array_count_values($kriteria) as $key => $val ) {
        if ( $val > 1 ) $result[] = $key;   //Push the key to the array sice the value is more than 1
    }
    
    $c = count($result);
    if($c>=1){
        echo "<script>
    new swal({
    icon: 'warning',
            title: 'Warning',
            text: 'Data rangking tidak boleh sama',
            padding: '2em',
        })</script>";
    }
    //update table
    foreach($_POST['kriteriaRank'] as $key=>$value){
        $update = "update sub_kriteria set sub_kriteria='".$_POST['kriteriaName'][$key]."',rangking='$key' where id_kriteria='$key'";
        insert($update);
    }
    foreach($_POST['kriteriaRankNew'] as $key=>$value){
        $update = "insert into sub_kriteria(rangking,sub_kriteria,id_kriteria) values('".$value."','".$_POST['kriteriaNameNew'][$key]."','".$_GET['id']."')";
        insert($update);
    }
    echo "<script>
    new swal({
    icon: 'success',
            title: 'Awesome!',
            text: 'Data berhasil disimpan',
            padding: '2em',
        }).then(function() {
            window.location ='?pages=subkriteria&id=$_GET[id]';
        });</script>";
}
$kriteria = query("select * from sub_kriteria where id_kriteria='".$_GET['id']."'");
?>
<div class="col-xl-12 col-xxl-12">
    <div class="card">
        <div class="card-header">
            <h4 class="heading mb-0">Tambah Sub Kriteria</h4>
        </div>
        <div class="card-body">
            <form class="finance-hr" action="" method="post">
            <div class="table-responsive">
                <table class="table primary-table-bordered" id='myTable'>
                    <thead class="thead-primary">
                        <tr>
                            <th scope="col">Kriteria</th>
                            <th scope="col">Rangking</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no =1;
                            foreach($kriteria as $r):
                        ?>
                        <tr>
                            <td><input type='text' class='form-control' name="kriteriaName[<?=$r->id?>]" value='<?=$r->sub_kriteria?>'></td>
                            <td><input type='text' class='form-control ranking' name="kriteriaRank[<?=$r->id?>]" value='<?=$r->rangking?>'></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <input type="button" class="btn btn-primary btn-sm" value="Add" onclick="addrow();">
            </div>
                <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
</div>
<script>
    function addrow(){
        var myTable = document.getElementById("myTable");
            var currentIndex = myTable.rows.length;
            var currentRow = myTable.insertRow(-1);

            var kriteriaName = document.createElement("input");
            kriteriaName.setAttribute("name", "kriteriaNameNew[]");
            kriteriaName.setAttribute("class", "form-control");

            var addRowBox = document.createElement("input");
            addRowBox.setAttribute("class", "form-control ranking");
            addRowBox.setAttribute("name", "kriteriaRankNew[]");

            var currentCell = currentRow.insertCell(-1);
            currentCell.appendChild(kriteriaName);
            currentCell = currentRow.insertCell(-1);
            currentCell.appendChild(addRowBox);
    }
</script>