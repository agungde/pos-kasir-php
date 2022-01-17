 <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
						<h3>Data Barang</h3>
						<br/>
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
						
						
							
						<a href="index.php?page=tambahbarangkeluar" style="margin-right :0.5pc;" 
							class="btn btn-warning btn-md pull-right">Insert Data</button>
						</a>
						
						
						<!-- view barang -->	
						<div class="modal-view">
							<table class="table table-bordered table-striped" id="example1">
								<thead>
									<tr style="background:#DFF0D8;color:#333;">
										<th> No</th>
										<th> ID Barang</th>
										<th> Nama Barang</th>
										<th style="width:10%;"> Jumlah</th>
										<th style="width:10%;"> Harga Beli</th>
										<th style="width:10%;"> Harga Jual</th>
										<th> Kasir</th>
										<th> Tanggal Input</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$no=1; 
										if(!empty($_GET['cari'])){
											$periode = $_POST['bln'].'-'.$_POST['thn'];
											$no=1; 
											$jumlah = 0;
											$bayar = 0;
											$hasil = $lihat -> periode_jual($periode);
										}elseif(!empty($_GET['hari'])){
											$hari = $_POST['hari'];
											$no=1; 
											$jumlah = 0;
											$bayar = 0;
											$hasil = $lihat -> hari_jual($hari);
										}else{
											$hasil = $lihat -> jual();
										}
									?>
									<?php 
										$bayar = 0;
										$jumlah = 0;
										$modal = 0;
										foreach($hasil as $isi){ 
											$bayar += $isi['total'];
											$modal += $isi['harga_beli']* $isi['jumlah'];
											$jumlah += $isi['jumlah'];
									?>
									<tr>
										<td><?php echo $no;?></td>
										<td><?php echo $isi['id_barang'];?></td>
										<td><?php echo $isi['nama_barang'];?></td>
										<td><?php echo $isi['jumlah'];?> </td>
										<td>Rp.<?php echo number_format($isi['harga_beli']* $isi['jumlah']);?>,-</td>
										<td>Rp.<?php echo number_format($isi['total']);?>,-</td>
										<td><?php echo $isi['nm_member'];?></td>
										<td><?php echo $isi['tanggal_input'];?></td>
									</tr>
									<?php $no++; }?>
								</tbody>
								<tfoot>
							
								</tfoot>
							</table>
						</div>
						<div class="clearfix" style="padding-top:5pc;"></div>
					</div>
				  </div>
              </div>
          </section>
      </section>
	

