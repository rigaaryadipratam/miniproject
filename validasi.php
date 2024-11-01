<?php
session_start();

// Membuat dua angka acak untuk operasi penjumlahan
$num1 = rand(1, 10);
$num2 = rand(1, 10);

// Menyimpan hasil penjumlahan di sesi
if (!isset($_SESSION['captcha_answer'])) {
    $_SESSION['captcha_answer'] = $num1 + $num2;
}

// Cek jika jawaban sudah ada
if (isset($_POST['captcha_input'])) {
    // Ambil jawaban dari sesi
    $correct_answer = $_SESSION['captcha_answer'];
    
    // Ambil jawaban pengguna dan konversi ke integer
    $user_answer = intval($_POST['captcha_input']);
    
    // Debugging: Tampilkan nilai yang dibandingkan
    // echo "Jawaban Benar: $correct_answer, Jawaban Pengguna: $user_answer"; // Uncomment untuk debugging

    // Verifikasi jawaban
    if ($user_answer === $correct_answer) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Pengisian Captcha Berhasil',
                    text: 'Anda akan diarahkan ke halaman pendaftaran'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'tambah.php';
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
                    text: 'Captcha Gagal!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '';
                    }
                });
            });
        </script>
        ";
    }
    // Hapus jawaban dari sesi
    unset($_SESSION['captcha_answer']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Captcha</title>
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
        <h3 class="mb-4">Validasi Captcha</h3>
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="captcha" class="form-label">Masukkan Jawaban Dari Soal</label>
                        <p><?php echo "$num1 + $num2 = ?"; ?></p>
                        <input type="text" class="form-control" name="captcha_input" placeholder="Jawaban" required>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
