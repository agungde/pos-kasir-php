 <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
	  <?php 
			$bulan_tes =array(
				'01'=>"Januari",
				'02'=>"Februari",
				'03'=>"Maret",
				'04'=>"April",
				'05'=>"Mei",
				'06'=>"Juni",
				'07'=>"Juli",
				'08'=>"Agustus",
				'09'=>"September",
				'10'=>"Oktober",
				'11'=>"November",
				'12'=>"Desember"
			);
		?>
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
						<h3>
							<!--<a  style="padding-left:2pc;" href="fungsi/hapus/hapus.php?laporan=jual" onclick="javascript:return confirm('Data Laporan akan di Hapus ?');">
								<button class="btn btn-danger">RESET</button>
							</a>-->
							<?php if(!empty($_GET['cari'])){ ?>
								Data Laporan Pembelian <?= $bulan_tes[$_POST['bln']];?> <?= $_POST['thn'];?>
							<?php }elseif(!empty($_GET['hari'])){?>
								Data Laporan Pembelian <?= $_POST['hari'];?>
							<?php }else{?>
								Data Laporan Pembelian <?= $bulan_tes[date('m')];?> <?= date('Y');?>
							<?php }?>
						</h3>
						<br/>
						<h4>Cari Laporan Per Bulan</h4>
						<form method="post" action="index.php?page=laporan&cari=ok">
							<table class="table table-striped">
								<tr>
									<th>
										Pilih Bulan
									</th>
									<th>
										Pilih Tahun
									</th>
									<th>
										Aksi
									</th>
								</tr>
								<tr>
								<td>
								<select name="bln" class="form-control">
									<option selected="selected">Bulan</option>
									<?php
										$bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
										$jlh_bln=count($bulan);
										$bln1 = array('01','02','03','04','05','06','07','08','09','10','11','12');
										$no=1;
										for($c=0; $c<$jlh_bln; $c+=1){
											echo"<option value='$bln1[$c]'> $bulan[$c] </option>";
										$no++;}
									?>
									</select>
								</td>
								<td>
								<?php
									$now=date('Y');
									echo "<select name='thn' class='form-control'>";
									echo '
									<option selected="selected">Tahun</option>';
									for ($a=2017;$a<=$now;$a++)
									{
										echo "<option value='$a'>$a</option>";
									}
									echo "</select>";
									?>
								</td>
								<td>
									<input type="hidden" name="periode" value="ya">
									<button class="btn btn-primary">
										<i class="fa fa-search"></i> Cari
									</button>
									<a href="index.php?page=laporan" class="btn btn-success">
										<i class="fa fa-refresh"></i> Refresh</a>
										
									<?php if(!empty($_GET['cari'])){?>
										<a href="excel.php?cari=yes&bln=<?=$_POST['bln'];?>&thn=<?=$_POST['thn'];?>" class="btn btn-info"><i class="fa fa-download"></i>
										Excel</a>
									<?php }else{?>
										<a href="excel.php" class="btn btn-info"><i class="fa fa-download"></i>
										Excel</a>
									<?php }?>
								</td>
								</tr>
							</table>
						</form>
						<form method="post" action="index.php?page=laporan&hari=cek">
							<table class="table table-striped">
								<tr>
									<th>
										Pilih Hari
									</th>
									<th>
										Aksi
									</th>
								</tr>
								<tr>
								<td>
									<input type="date" value="<?= date('Y-m-d');?>" class="form-control" name="hari">
								</td>
								<td>
									<input type="hidden" name="periode" value="ya">
									<button class="btn btn-primary">
										<i class="fa fa-search"></i> Cari
									</button>
									<a href="index.php?page=laporan" class="btn btn-success">
										<i class="fa fa-refresh"></i> Refresh</a>
										
									<?php if(!empty($_GET['hari'])){?>
										<a href="excel.php?hari=cek&tgl=<?= $_POST['hari'];?>" class="btn btn-info"><i class="fa fa-download"></i>
										Excel</a>
									<?php }else{?>
										<a href="excel.php" class="btn btn-info"><i class="fa fa-download"></i>
										Excel</a>
									<?php }?>
								</td>
								</tr>
						
						
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                
						<?php if(isset($_GET['success-stok'])){?>
						<div class="alert alert-success">
							<p>Tambah Stok Berhasil !</p>
						</div>
						<?php }?>
						<?php if(isset($_GET['success'])){?>
						<div class="alert alert-success">
							<p>Tambah Data Berhasil !</p>
						</div>
						<?php }?>
						<?php if(isset($_GET['remove'])){?>
						<div class="alert alert-danger">
							<p>Hapus Data Berhasil !</p>
						</div>
						<?php }?>
						
						<?php 
							$sql=" select * from barang where stok <= 3";
							$row = $config -> prepare($sql);
							$row -> execute();
							$r = $row -> rowCount();
							if($r > 0){
						?>	
						<?php
								echo "
								<div class='alert alert-warning'>
									<span class='glyphicon glyphicon-info-sign'></span> Ada <span style='color:red'>$r</span> barang yang Stok tersisa sudah kurang dari 3 items. silahkan pesan lagi !!
									<span class='pull-right'><a href='index.php?page=barang&stok=yes'>Cek Barang <i class='fa fa-angle-double-right'></i></a></span>
								</div>
								";	
							}
						?>

						<!-- Trigger the modal with a button -->
						
						
						<!-- view barang -->	
						<div class="modal-view">
							<table class="table table-bordered table-striped" id="example1">
								<thead>
									<tr style="background:#DFF0D8;color:#333;">
										<th>No.</th>
										<th>ID Barang</th>
										<th>Kategori</th>
										<th>Satuan Barang</th>
										<th>Nama Barang</th>
										<th>Merk</th>
										<th>Stok</th>
										<th>Harga Beli</th>
										<th>Harga Jual</th>
									
										
									</tr>
								</thead>
								<tbody>

								<?php 
									$totalBeli = 0;
									$totalJual = 0;
									$totalStok = 0;
									if($_GET['stok'] == 'yes')
									{
										$hasil = $lihat -> barang_stok();

									}else{
										$hasil = $lihat -> barang();
									}
									$no=1;
									foreach($hasil as $isi) {
								?>
									<tr>
										<td><?php echo $no;?></td>
										<td><?php echo $isi['id_barang'];?></td>
										<td><?php echo $isi['nama_kategori'];?></td>
									
										<td><?php echo $isi['satuan_barang'];?></td>
										<td><?php echo $isi['nama_barang'];?></td>
										<td><?php echo $isi['merk'];?></td>
										<td>
											<?php if($isi['stok'] == '0'){?>
												<button class="btn btn-danger"> Habis</button>
											<?php }else{?>
												<?php echo $isi['stok'];?>
											<?php }?>
										</td>
										<td>Rp.<?php echo number_format($isi['harga_beli']);?>,-</td>
										<td>Rp.<?php echo number_format($isi['harga_jual']);?>,-</td>
										
										<td>
											<?php if($isi['stok'] <=  '3'){?>
												<form method="POST" action="fungsi/edit/edit.php?stok=edit">
													<input type="text" name="restok" class="form-control">
													<input type="hidden" name="id" value="<?php echo $isi['id_barang'];?>" class="form-control">
													<button class="btn btn-primary btn-sm">
														Restok
													</button>
													<a href="fungsi/hapus/hapus.php?barang=hapus&id=<?php echo $isi['id_barang'];?>" 
														onclick="javascript:return confirm('Hapus Data barang ?');">
														<button class="btn btn-danger btn-sm">Hapus</button></a>
												</form>
											<?php }else{?>
										
											<?php }?>
											
											
									</tr>
								<?php 
										$no++; 
										$totalBeli += $isi['harga_beli'] * $isi['stok']; 
										$totalJual += $isi['harga_jual'] * $isi['stok'];
										$totalStok += $isi['stok'];
									}
								?>
								</tbody>
								<tfoot>
									<tr>
										<th colspan="5">Total Pembelian</td>
										<th><?php echo $totalStok;?></td>
										<th>Rp.<?php echo number_format($totalBeli);?>,-</td>
										<th>Rp.<?php echo number_format($totalJual);?>,-</td>
										<th colspan="2" style="background:#ddd"></th>
									</tr>
								</tfoot>
							</table>
						</div>
						<div class="clearfix" style="margin-top:7pc;"></div>
					<!-- end view barang -->
					<!-- tambah barang MODALS-->
						<!-- Modal -->
					
						<div id="myModal" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content" style=" border-radius:0px;">
								<div class="modal-header" style="background:#285c64;color:#fff;">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Barang</h4>
								</div>										
								<form action="fungsi/tambah/tambah.php?barang=tambah" method="POST">
									<div class="modal-body">
								
										<table class="table table-striped bordered">
											
											<?php
												$format = $lihat -> barang_id();
											?>
											<tr>
												<td>ID Barang</td>
												<td><input type="text" text="text" required value="<?php echo $format;?>" class="form-control"  name="id"></td>
											</tr>
											<tr>
												<td>Kategori</td>
												<td>
												<select name="kategori" class="form-control" required>
													<option value="#">Pilih Kategori</option>
													<?php  $kat = $lihat -> kategori(); foreach($kat as $isi){ 	?>
													<option value="<?php echo $isi['id_kategori'];?>"><?php echo $isi['nama_kategori'];?></option>
													<?php }?>
												</select>
												</td>
											</tr>
											<tr>
												<td>Satuan</td>
												<td>
												<select name="satuan" class="form-control" required>
													<option value="#">Pilih Satuan</option>
													<?php  $kat = $lihat -> satuan(); foreach($kat as $isi){ 	?>
													<option value="<?php echo $isi['nama_satuan'];?>"><?php echo $isi['nama_satuan'];?></option>
													<?php }?>
												</select>
												</td>
											</tr>
											
											
											
											<tr>
												<td>Nama Barang</td>
												<td><input type="text" placeholder="Nama Barang" required class="form-control" name="nama"></td>
											</tr>
											<tr>
												<td>Merk Barang</td>
												<td><input type="text" placeholder="Merk Barang" required class="form-control"  name="merk"></td>
											</tr>
											<tr>
												<td>Harga Beli</td>
												<td><input type="number" placeholder="Harga beli" required class="form-control" name="beli"></td>
											</tr>
											<tr>
												<td>Harga Jual</td>
												<td><input type="number" placeholder="Harga Jual" required class="form-control"  name="jual"></td>
											</tr>
										
											</tr>
											<tr>
												<td>Stok</td>
												<td><input type="number" required Placeholder="Stok" class="form-control"  name="stok"></td>
											</tr>
											<tr>
												<td>Tanggal Input</td>
												<td><input type="text" required readonly="readonly" class="form-control" value="<?php echo  date("j F Y, G:i");?>" name="tgl"></td>
											</tr>
										</table>
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Insert Data</button>
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</form>
							</div>
						</div>
						
					</div>
              	</div>
          	</section>
      	</section>
	
