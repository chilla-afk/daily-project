<?php
include 'koneksi.php';

if(isset($_POST['update'])){
    $id       = $_POST['id'];
    $username = $_POST['username'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $email    = $_POST['email'];

    $foto = $_POST['foto_lama'];
    if(isset($_FILES['foto']) && $_FILES['foto']['error'] == 0){
        $foto = $_FILES['foto']['name'];
        $tmp  = $_FILES['foto']['tmp_name'];
        move_uploaded_file($tmp, "uploads/".$foto);
    }

    $stmt = $conn->prepare("UPDATE users SET username=?, nama_lengkap=?, email=?, foto=? WHERE id=?");
    $stmt->bind_param("ssssi", $username, $nama_lengkap, $email, $foto, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: user.php");
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM users WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
<h3>Edit User</h3>

<form method="POST" action="edit.php" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    <input type="hidden" name="foto_lama" value="<?= $data['foto'] ?>">
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" value="<?= $data['username'] ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <input type="text" name="nama" value="<?= $data['nama_lengkap'] ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" value="<?= $data['email'] ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label for="foto" class="form-label">Foto Baru (kosongkan jika tidak diubah)</label>
        <input type="file" name="foto" class="form-control" accept="image/*">
        <?php if($data['foto']): ?>
            <small class="form-text text-muted">Foto saat ini: <img src="uploads/<?= $data['foto'] ?>" width="50" class="img-thumbnail"></small>
        <?php endif; ?>
    </div>
    <button type="submit" name="update" class="btn btn-primary">Update</button>
    <a href="user.php" class="btn btn-secondary">Kembali</a>
</form>
</div>

</body>
</html>
