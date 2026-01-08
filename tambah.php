<?php
include 'koneksi.php';

if(isset($_POST['username'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];

    $foto = '';
    if(isset($_FILES['foto']) && $_FILES['foto']['error'] == 0){
        $foto = $_FILES['foto']['name'];
        $tmp  = $_FILES['foto']['tmp_name'];
        move_uploaded_file($tmp, "uploads/".$foto);
    }

    $stmt = $conn->prepare("INSERT INTO users (username, password, nama_lengkap, email, foto) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $username, $password, $nama_lengkap, $email, $foto);
    $stmt->execute();
    $stmt->close();

    header("Location: user.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
<h3>Tambah User</h3>

<form method="POST" action="tambah.php" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <input type="text" name="nama" class="form-control">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" name="foto" class="form-control" accept="image/*">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="user.php" class="btn btn-secondary">Kembali</a>
</form>
</div>

</body>
</html>
