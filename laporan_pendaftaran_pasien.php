 <?php
 include"header.php";
include("../../library/koneksi.php");
?>
<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
 
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">LAPORAN PENDAFTARAN PASIEN</strong>
                            </div>
    
                            <div class="card-body">
	
<table >
        <tr><td>
            LAPORAN PERBULAN DAN PERTAHUN
        </td><td>
            LAPORAN PERTANGGAL
        </td></tr>
        <tr>
            <td width="50%">
<form action="export_laporan_pendaftaran_pasien.php" method="post">
    <div class="row form-group">

        <div class="col-md-4">
        <select class="form-control " name="bln">
                            
                            <option value="all" selected="">ALL</option>
                            <option value="1" >January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                    </select>
                </div>
                <div class="col-md-3">
                <?php
$now=date('Y');
echo "<select name='thn' class='form-control'>";
for ($a=2018;$a<=$now;$a++)
{
     echo "<option value='$a'>$a</option>";
}
echo "</select>";
?>
</div>
        
        <input type="submit" class="" name="submit" value="Export to Excel">
    </div>
    </form>
    <form id="Myform">
    <div class="row form-group">

        <div class="col-md-4">
        <select class="form-control " name="bln">
                            
                            <option value="all" selected="">ALL</option>
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                    </select>
                </div>
                <div class="col-md-3">
                <?php
$now=date('Y');
echo "<select name='thn' class='form-control'>";
for ($a=2018;$a<=$now;$a++)
{
     echo "<option value='$a'>$a</option>";
}
echo "</select>";
?>
</div>
        <input type="submit" class="" name="submit2"  value="Tampilkan">
    </div>
    </form>
    </td>
    
            <td width="50%">
<form action="export_laporan_pendaftaran_pasien2.php" method="post">
    <div class="row form-group">
        <div class="col-md-12">
<label> Tanggal </label>
<input type="date" name="tgl1">-
<input type="date" name="tgl2">
        
        <input type="submit" class="" name="submit3" value="Export to Excel">
    </div>
</div>
    </form>
    <form id="Myform2">
    <div class="row form-group">
        <div class="col-md-12">
<label> Tanggal </label>
<input type="date"  name="tgl1">-
<input type="date" name="tgl2">

        <input type="submit" class="" name="submit4"  value="Tampilkan">
        </div>
  </div>
    </form>
    </td>
    </tr>
   </table>
   
    <div class="tampung">
         <div  class="table-responsive">
	<table id="bootstrap-data-table-export" class="table table-striped table-bordered bootstrap-datatable ">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Pasien</th>
                                            <th>Tanggal Daftar</th>
                                            <th>Nama Pasien</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Umur</th>
                                            <th>Orang Tua/ Wali</th>
                                           <th >Action</th>
                                         
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php 
                                    $sql = "SELECT a.id, a.tanggal_daftar, a.nama, d.nama_provinsi, e.nama_kabupaten, f.nama_kecamatan, g.nama_kelurahan, a.alamat, a.jenis_kelamin, a.pekerjaan, a.umur, a.orangtua FROM data_pasien a
                                    
                                    INNER JOIN provinsi d ON d.id_prov = a.provinsi
                                    INNER JOIN kabupaten e ON e.id_kab = a.kabupaten
                                    INNER JOIN kecamatan f ON f.id_kec = a.kecamatan
                                    INNER JOIN kelurahan g ON g.id_kel = a.kelurahan order by a.id asc";
                                    $result = mysqli_query($koneksi, $sql);
                                    $nomor = 0;
                                    if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while($row = mysqli_fetch_assoc($result)) {
                                        $nomor++;
                                    //echo "id: " . $row["berita_id"]. " - Name: " . $row["judul"]. " " . $row["intisari"]. "<br>";
                                    ?>
                                        <tr>
                                            <td class="center"><?php echo $nomor;?></td>
                                            <td class="center"><?php echo $row["id"];?></td>
                                            <td class="center"><?php echo $row["tanggal_daftar"];?></td>
                                            <td class="center"><?php echo $row["nama"];?></td>
                                            <td class="center"><?php echo $row["jenis_kelamin"];?></td>
                                            <td class="center"><?php echo $row["umur"];?></td>
                                            <td class="center"><?php echo $row["orangtua"];?></td>
                                            <td>
                                        
                                         <?php echo"<a href='../proses/detail_pasien.php?id_pasien=$row[id]' class='btn btn-secondary fa fa-question-circle' > Detail</a>"?></td>
                                        </tr>
                                        <?php
                                        }
                                        } else {
                                            echo "0 results";
                                        }

                                      
                                        ?>

                                    </tbody>
                                </table>
	
    </div>
    <?php

$data4 = mysqli_query($koneksi,"SELECT COUNT(id) as jumlah_pasien FROM data_pasien ");
        while($row3 = mysqli_fetch_array($data4)){
            ?>
            

                <h5 align="center">JUMLAH PASIEN= <?php echo number_format( $row3['jumlah_pasien'], 0, ".", ".");?></h5>
                
            <?php
        }
    ?>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</body>

    <script type="text/javascript" src="../../tampilan/vendors/jquery/dist/jquery.min.js"></script>
     <script src="../../tampilan/vendors/popper.js/dist/umd/popper.min.js"></script>
       <script src="../../tampilan/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../tampilan/assets/js/main.js"></script>
    <script src="../../tampilan/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../tampilan/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../tampilan/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../tampilan/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="../../tampilan/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../../tampilan/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../../tampilan/vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="../../tampilan/assets/js/init-scripts/data-table/datatables-init.js"></script>
    <script src="../../tampilan/bower/responsive-tables/responsive-tables.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>
</html>
      <script type="text/javascript">
    jQuery(document).ready(function($){
        $(function(){
    $('#Myform').submit(function() {
        $.ajax({
            type: 'POST',
            url: 'export_laporan_pendaftaran_pasien.php',
            data: $(this).serialize(),
            success: function(data) {
             $(".tampung").html(data);
             $('.table').DataTable();

            }
        });

        return false;
         e.preventDefault();
        });
    });
});
</script>
<script type="text/javascript">
    jQuery(document).ready(function($){
        $(function(){
    $('#Myform2').submit(function() {
        $.ajax({
            type: 'POST',
            url: 'export_laporan_pendaftaran_pasien2.php',
            data: $(this).serialize(),
            success: function(data) {
             $(".tampung").html(data);
             $('.table').DataTable();

            }
        });

        return false;
         e.preventDefault();
        });
    });
});
</script>