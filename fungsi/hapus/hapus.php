<?php 
session_start();
if(!empty($_SESSION['admin'])){
	require '../../config.php';
	if(!empty($_GET['kategori'])){
		$id= $_GET['id'];
		$data[] = $id;
		$sql = 'DELETE FROM kategori WHERE id_kategori=?';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=kategori&&remove=hapus-data"</script>';
	}
		if(!empty($_GET['satuan'])){
		$id= $_GET['id'];
		$data[] = $id;
		$sql = 'DELETE FROM satuan WHERE id_satuan=?';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=satuan&&remove=hapus-data"</script>';
	}
	
		if(!empty($_GET['supplier'])){
		$id= $_GET['id'];
		$data[] = $id;
		$sql = 'DELETE FROM supplier WHERE id=?';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=supplier&&remove=hapus-data"</script>';
	}
	
	
	if(!empty($_GET['barang'])){
		$id= $_GET['id'];
		$data[] = $id;
		$sql = 'DELETE FROM barang WHERE id_barang=?';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=barang&&remove=hapus-data"</script>';
	}
	if(!empty($_GET['jual'])){
		
		$dataI[] = $_GET['brg'];
		$sqlI = 'select*from barang where id_barang=?';
		$rowI = $config -> prepare($sqlI);
		$rowI -> execute($dataI);
		$hasil = $rowI -> fetch();
	
		
		$id = $_GET['id'];
		$data[] = $id;
		$sql = 'DELETE FROM penjualan WHERE id_penjualan=?';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=jual"</script>';
	}
	if(!empty($_GET['penjualan'])){
		
		$sql = 'DELETE FROM penjualan';
		$row = $config -> prepare($sql);
		$row -> execute();
		echo '<script>window.location="../../index.php?page=jual"</script>';
	}
	if(!empty($_GET['laporan'])){
		
		$sql = 'DELETE FROM nota';
		$row = $config -> prepare($sql);
		$row -> execute();
		echo '<script>window.location="../../index.php?page=laporan&remove=hapus"</script>';
	}





		if(!empty($_GET['beli'])){
		
		$dataI[] = $_GET['brg'];
		$sqlI = 'select*from barang where id_barang=?';
		$rowI = $config -> prepare($sqlI);
		$rowI -> execute($dataI);
		$hasil = $rowI -> fetch();
	
		
		$id = $_GET['id'];
		$data[] = $id;
		$sql = 'DELETE FROM pembelian WHERE id_pembelian=?';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=beli"</script>';
	}
	if(!empty($_GET['pembelian'])){
		
		$sql = 'DELETE FROM pembelian';
		$row = $config -> prepare($sql);
		$row -> execute();
		echo '<script>window.location="../../index.php?page=beli"</script>';
	}
	if(!empty($_GET['laporanjual'])){
		
		$sql = 'DELETE FROM nota';
		$row = $config -> prepare($sql);
		$row -> execute();
		echo '<script>window.location="../../index.php?page=laporanjual&remove=hapus"</script>';
	}
}
