<?php
	/*
	 * PROSES TAMPIL  
	 */ 
	 class view {
		protected $db;
		function __construct($db){
			$this->db = $db;
		}
			
			function member(){
				$sql = "select member.*, login.*
						from member inner join login on member.id_member = login.id_member";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetchAll();
				return $hasil;
			}

			function member_edit($id){
				$sql = "select member.*, login.*
						from member inner join login on member.id_member = login.id_member
						where member.id_member= ?";
				$row = $this-> db -> prepare($sql);
				$row -> execute(array($id));
				$hasil = $row -> fetch();
				return $hasil;
			}
				function member_tambah($id){
				$sql = "select member.*, login.*
						from member inner join login on member.id_member = login.id_member
						where member.id_member= ?";
				$row = $this-> db -> prepare($sql);
				$row -> execute(array($id));
				$hasil = $row -> fetch();
				return $hasil;
			}
			
			
			
			function toko(){
				$sql = "select*from toko where id_toko='1'";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetch();
				return $hasil;
			}
	function supplier(){
				$sql = "select*from supplier";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetch();
				return $hasil;
			}
			
			function kategori(){
				$sql = "select*from kategori";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetchAll();
				return $hasil;
			}
             function satuan(){
				$sql = "select*from satuan";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetchAll();
				return $hasil;
			}
				function satuan_edit($id){
				$sql = "select*from satuan where id_satuan =?";
				$row = $this-> db -> prepare($sql);
				$row -> execute(array($id));
				$hasil = $row -> fetch();
				return $hasil;
			}
			
			    function satuan_row(){
				$sql = "select*from satuan";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> rowCount();
				return $hasil;
			}
	
			
			function barang(){
				$sql = "select barang.*, kategori.id_kategori, kategori.nama_kategori
						from barang inner join kategori on barang.id_kategori = kategori.id_kategori 
						ORDER BY id DESC";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetchAll();
				return $hasil;
			}
			
			
			function barang_stok(){
				$sql = "select barang.*, kategori.id_kategori, kategori.nama_kategori
						from barang inner join kategori on barang.id_kategori = kategori.id_kategori 
						where stok <= 3 
						ORDER BY id DESC";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetchAll();
				return $hasil;
			}

			function barang_edit($id){
				$sql = "select barang.*, kategori.id_kategori, kategori.nama_kategori
						from barang inner join kategori on barang.id_kategori = kategori.id_kategori
						where id_barang=?";
				$row = $this-> db -> prepare($sql);
				$row -> execute(array($id));
				$hasil = $row -> fetch();
				return $hasil;
			}

			function barang_cari($cari){
				$sql = "select barang.*, kategori.id_kategori, kategori.nama_kategori
						from barang inner join kategori on barang.id_kategori = kategori.id_kategori
						where id_barang like '%$cari%' or nama_barang like '%$cari%' or merk like '%$cari%'";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetchAll();
				return $hasil;
			}

			function barang_id(){
				$sql = 'SELECT * FROM barang ORDER BY id DESC';
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetch();
				return $hasil;
			}

			function kategori_edit($id){
				$sql = "select*from kategori where id_kategori=?";
				$row = $this-> db -> prepare($sql);
				$row -> execute(array($id));
				$hasil = $row -> fetch();
				return $hasil;
			}

			function kategori_row(){
				$sql = "select*from kategori";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> rowCount();
				return $hasil;
			}

			function barang_row(){
				$sql = "select*from barang";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> rowCount();
				return $hasil;
			}

			function barang_stok_row(){
				$sql ="SELECT SUM(stok) as jml FROM barang";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetch();
				return $hasil;
			}

				function jual_row(){
				$sql ="SELECT SUM(jumlah) as stok FROM nota";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetch();
				return $hasil;
			}
			
			function jual(){
				$sql ="SELECT nota.* , barang.id_barang, barang.nama_barang, barang.harga_jual, barang.harga_beli, member.id_member,
						member.nm_member from nota 
					   left join barang on barang.id_barang=nota.id_barang 
					   left join member on member.id_member=nota.id_member 
					   where nota.periode = ?
					   ORDER BY id_nota DESC";
				$row = $this-> db -> prepare($sql);
				$row -> execute(array(date('m-Y')));
				$hasil = $row -> fetchAll();
				return $hasil;
			}

			function periode_jual($periode){
				$sql ="SELECT nota.* , barang.id_barang, barang.nama_barang, barang.harga_jual, barang.harga_beli, member.id_member,
						member.nm_member from nota 
					   left join barang on barang.id_barang=nota.id_barang 
					   left join member on member.id_member=nota.id_member WHERE nota.periode = ? 
					   ORDER BY id_nota ASC";
				$row = $this-> db -> prepare($sql);
				$row -> execute(array($periode));
				$hasil = $row -> fetchAll();
				return $hasil;
			}

			function hari_jual($hari){
				$ex = explode('-', $hari);
				$monthNum  = $ex[1];
				$monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
				if($ex[2] > 9)
				{
					$tgl = $ex[2];
				}else{
					$tgl1 = explode('0',$ex[2]);
					$tgl = $tgl1[1];
				}
				$cek = $tgl.' '.$monthName.' '.$ex[0];
				$param = "%{$cek}%";
				$sql ="SELECT nota.* , barang.id_barang, barang.nama_barang,  barang.harga_jual,barang.harga_beli, member.id_member,
						member.nm_member from nota 
					   left join barang on barang.id_barang=nota.id_barang 
					   left join member on member.id_member=nota.id_member WHERE nota.tanggal_input LIKE ? 
					   ORDER BY id_nota ASC";
				$row = $this-> db -> prepare($sql);
				$row -> execute(array($param));
				$hasil = $row -> fetchAll();
				return $hasil;
			}

			function penjualan(){
				$sql ="SELECT penjualan.* , barang.id_barang, barang.nama_barang, member.id_member,
						member.nm_member from penjualan 
					   left join barang on barang.id_barang=penjualan.id_barang 
					   left join member on member.id_member=penjualan.id_member
					   ORDER BY id_penjualan";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetchAll();
				return $hasil;
			}

			function jumlah(){
				$sql ="SELECT SUM(total) as bayar FROM penjualan";
				$row = $this -> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetch();
				return $hasil;
			}

			function jumlah_nota(){
				$sql ="SELECT SUM(total) as bayar FROM nota";
				$row = $this -> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetch();
				return $hasil;
			}

			function jml(){
				$sql ="SELECT SUM(harga_beli*stok) as byr FROM barang";
				$row = $this -> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetch();
				return $hasil;
			}
	 
	 



			
			function beli(){
				$sql ="SELECT notabeli.* , barang.id_barang, barang.nama_barang, barang.harga_beli, member.id_member,
						member.nm_member from notabeli 
					   left join barang on barang.id_barang=notabeli.id_barang 
					   left join member on member.id_member=notabeli.id_member 
					   where notabeli.periode = ?
					   ORDER BY id_nota DESC";
				$row = $this-> db -> prepare($sql);
				$row -> execute(array(date('m-Y')));
				$hasil = $row -> fetchAll();
				return $hasil;
			}

			function periode_beli($periode){
				$sql ="SELECT notabeli.* , barang.id_barang, barang.nama_barang, barang.harga_beli, member.id_member,
						member.nm_member from notabeli 
					   left join barang on barang.id_barang=notabeli.id_barang 
					   left join member on member.id_member=notabeli.id_member WHERE notabeli.periode = ? 
					   ORDER BY id_nota ASC";
				$row = $this-> db -> prepare($sql);
				$row -> execute(array($periode));
				$hasil = $row -> fetchAll();
				return $hasil;
			}

			function hari_beli($hari){
				$ex = explode('-', $hari);
				$monthNum  = $ex[1];
				$monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
				if($ex[2] > 9)
				{
					$tgl = $ex[2];
				}else{
					$tgl1 = explode('0',$ex[2]);
					$tgl = $tgl1[1];
				}
				$cek = $tgl.' '.$monthName.' '.$ex[0];
				$param = "%{$cek}%";
				$sql ="SELECT notabeli.* , barang.id_barang, barang.nama_barang,  barang.harga_beli, member.id_member,
						member.nm_member from notabeli 
					   left join barang on barang.id_barang=notabeli.id_barang 
					   left join member on member.id_member=notabeli.id_member WHERE notabeli.tanggal_input LIKE ? 
					   ORDER BY id_nota ASC";
				$row = $this-> db -> prepare($sql);
				$row -> execute(array($param));
				$hasil = $row -> fetchAll();
				return $hasil;
			}


			function pembelian(){
				$sql ="SELECT pembelian.* , barang.id_barang, barang.nama_barang, member.id_member,
						member.nm_member from pembelian 
					   left join barang on barang.id_barang=pembelian.id_barang 
					   left join member on member.id_member=pembelian.id_member
					   ORDER BY id_pembelian";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetchAll();
				return $hasil;
			}

		

	 }
	 
		
	
