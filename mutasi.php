<?php
    include_once 'koneksi.php';  // Pastikan koneksi database sudah dimuat

    // Query untuk ambil data mutasi barang, termasuk nama supplier
		$query = "SELECT 
		m_mutasi.mutasi_id,
		m_mutasi.mutasi_item_id,
		m_mutasi.mutasi_date,
		m_mutasi.mutasi_quantity,
		m_mutasi.mutasi_price,
		m_item.item_name,
		m_supplier.supplier_name
		FROM m_mutasi
		JOIN m_item ON m_mutasi.mutasi_item_id = m_item.item_id
		JOIN m_supplier ON m_item.item_supplier_id = m_supplier.supplier_id";

		$result = mysqli_query($koneksi, $query);

		


    
    // Eksekusi query
    $mutasi = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mutasi Barang</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <!-- Header Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#"><img src="assets/img/trolley.png" alt="" style="max-width: 35px;"></a>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item">
		        <a class="nav-link" href="index.php">Home</a>
		    </li>
		    <li class="nav-item">
		        <a class="nav-link" href="supplier.php">Daftar Supplier </a>
		    </li>
		    <li class="nav-item">
		        <a class="nav-link" href="barang.php">Daftar Barang</a>
		    </li>
		    <li class="nav-item active">
		        <a class="nav-link" href="mutasi.php">Mutasi Barang <span class="sr-only">(current)</span></a>
		    </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Daftar Mutasi Barang</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Tanggal Mutasi</th>
                    <th>Jumlah Mutasi</th>
                    <th>Harga</th>
					<th>Nama Supplier</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1; 
				?>

                <?php    //Menampilkan data mutasi barang
					while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>" . $no++ . "</td>";
					echo "<td>" . $row['item_name'] . "</td>"; // Nama Barang
					echo "<td>" . $row['mutasi_date'] . "</td>";
					echo "<td>" . $row['mutasi_quantity'] . "</td>";
					echo "<td>" . $row['mutasi_price'] . "</td>";
					echo "<td>" . $row['supplier_name'] . "</td>"; // Nama Supplier
					echo "</tr>";
		}
		?>
		
                
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <div class="container-fluid fixed-bottom bg-light" style="color: #999; padding: 10px 0;">
        <div class="row">
            <div class="col-sm-12">
                <p align="center">&copy; Ngawi 2021</p>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
