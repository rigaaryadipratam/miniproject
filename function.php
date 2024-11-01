<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "pweb");


function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data)
{
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $nisn = htmlspecialchars($data["nisn"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $jeniskelamin = htmlspecialchars($data["jeniskelamin"]);
    $agama = htmlspecialchars($data["agama"]);
    $asalsekolah = htmlspecialchars($data["asalsekolah"]);
    
    
    $query = "INSERT INTO siswa
				VALUES
			  ('', '$nama','$nisn', '$alamat','$jeniskelamin', '$agama', '$asalsekolah')
			";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM siswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}
