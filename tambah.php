<?php
require 'function.php';

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
	// cek apakah data berhasil ditambahkan atau tidak
	if (tambah($_POST) > 0) {
		echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Pendaftaran Berhasil',
                        text: 'Selamat Pendaftaran Berhasil!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'index.php#data';
                        }
                    });
                });
            </script>
        ";
	} else {
		echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Pendaftaran Gagal!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'index.php';
                        }
                    });
                });
            </script>
        ";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Pendaftaran Siswa</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

	<style>
		body {
			font-family: "Urbanist", system-ui !important;
		}

		.form-label {
			font-weight: bold !important;
		}
	</style>
</head>

<body>
	<div class="container mt-5">
		<h3 class="mb-4">Form Pendaftaran Siswa</h3>
		<div class="card">
			<div class="card-body">
				<form action="" method="post">
					<div class="mb-3">
						<label for="nama" class="form-label">Nama:</label>
						<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Siswa" required>
					</div>

					<div class="mb-3">
						<label for="nrp" class="form-label">NISN</label>
						<input type="text" class="form-control" name="nisn" placeholder="NISN Siswa" id="nrp" required>
					</div>
					<div class="mb-3">
						<label for="nrp" class="form-label">Alamat</label>
						<input type="text" class="form-control" name="alamat" placeholder="Alamat Siswa" id="nrp" required>
					</div>

					<div class="mb-3">
						<label class="form-label">Jenis Kelamin:</label><br>
						<div class="form-check form-check-inline">
							<input class="form-check-input border-dark" type="radio" name="jeniskelamin" id="laki-laki" value="Laki-laki" required>
							<label class="form-check-label" for="laki-laki">Laki-laki</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input border-dark" type="radio" name="jeniskelamin" id="perempuan" value="Perempuan" required>
							<label class="form-check-label" for="perempuan">Perempuan</label>
						</div>
					</div>

					<div class="mb-3">
						<label for="agama" class="form-label">Agama</label>
						<select class="form-select" name="agama" id="agama" required>
							<option value="" disabled selected>Pilih Agama</option>
							<option value="Islam">Islam</option>
							<option value="Kristen">Kristen</option>
							<option value="Katolik">Katolik</option>
							<option value="Hindu">Hindu</option>
							<option value="Buddha">Buddha</option>
							<option value="Konghucu">Konghucu</option>
						</select>
					</div>

					<div class="mb-3">
						<label for="nrp" class="form-label">Asal Sekolah</label>
						<input type="text" class="form-control" name="asalsekolah" placeholder="Asal Sekolah" id="nrp" required>
					</div>

					

					<button type="submit" name="submit" class="btn btn-primary">Daftar!</button>
				</form>
			</div>
		</div>
	</div>
</body>

</html>