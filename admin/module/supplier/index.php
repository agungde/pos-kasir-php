 <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">

<?php 



$koneksi = new mysqli("localhost","root","","kasir");
$no = mysqli_query($koneksi, "select kode_supplier from supplier order by kode_supplier desc");
$kdsupplier = mysqli_fetch_array($no);
$kode = $kdsupplier['kode_supplier'];
$sql = mysqli_query("select * from supplier");

$urut = substr($kode, 8, 3);
$tambah = (int) $urut + 1;
$bulan = date("m");
$tahun = date("y");

if(strlen($tambah) == 1){
	$format = "SUP-".$bulan.$tahun."00".$tambah;
} else if(strlen($tambah) == 2){
	$format = "SUP-".$bulan.$tahun."0".$tambah;
	
} else{
	$format = "SUP-".$bulan.$tahun.$tambah;

}





?>
							



  <div class="container-fluid">

          <!-- DataTales Example -->
          
          
            </div>
            <div class="card-body">
              <div class="table-responsive">
							
							
							<div class="body">
							
							<form method="POST" enctype="multipart/form-data">
							
							<label for="">Kode Supplier</label>
                            <div class="form-group">
                               <div class="form-line">
                             <input type="text" name="kode_supplier" class="form-control" id="kode_supplier" value="<?php echo $format; ?>" readonly />
							</div>
                            </div>
							
						
							
							<label for="">Nama Supplier</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="nama_supplier" class="form-control" />	 
							</div>
                            </div>
							
					
							<label for="">Alamat</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="alamat" class="form-control" />
                          	 
								</div>
                            </div>
					
							
							<label for="">Telepon</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="number" name="telepon" class="form-control" />	 
							</div>
                            </div>
							
							
						
								<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
							
							</form>
						
							
							
							
							<?php
							
							if (isset($_POST['simpan'])) {
								$kode_supplier= $_POST['kode_supplier'];
								$nama_supplier= $_POST['nama_supplier'];
								$alamat= $_POST['alamat'];
								
								$telepon= $_POST['telepon'];
			
								
								$sql = $koneksi->query("insert into supplier (kode_supplier, nama_supplier, alamat, telepon) values('$kode_supplier','$nama_supplier','$alamat','$telepon')");
								
								if ($sql) {
									?>
									
										<script type="text/javascript">
										alert("Data Berhasil Disimpan");
										window.location.href="index.php?page=supplier";
										</script>
										
										<?php
								}
								}
							
							
							?>
										
										
										
								
								
								
								
								
