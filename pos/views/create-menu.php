<?php
session_start();
require_once __DIR__ . '/../DB/Connections.php';
require_once __DIR__ . '/../Model/init.php';

$categori = new Category();
$menu = new Item();

$categories = $categori->all();

if(isset($_POST["submit"])){
  $datas = [
    "post" => $_POST,
    "files" => $_FILES
  ];
  $result = $menu->create($datas);
  if(gettype($result) == "String"){
    echo "<script> alert('{$result}') window.location.href = 'create-menu.php'";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Blank Page &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="../assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/modules/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="../assets/modules/jquery-selectric/selectric.css">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
  <!-- Start GA -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
  </script>
  <!-- /END GA -->
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <!-- Navbar -->
      <?php include('../component/navbar.php') ?>
      <!-- SideBar -->
      <?php include('../component/sidebar.php') ?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Tambah Menu</h1>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-6 col-lg-6 d-flex align-items-center">
                <div class="card">
                <img src="../assets/img/vector/mie.png" alt="">
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Tambahkan Menu Baru</h4>
                  </div>
                  <form action="" method="post" enctype="multipart/form-data" class="card-body">
                    <div class="form-group">
                      <label for="name">Nama Menu</label>
                      <input type="text" name="name_item" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                      <label class="form-control-label" for="attachment">Attachment</label>
                      <div class="">
                        <div class="custom-file">
                          <input type="file" name="attachment" class="custom-file-input" id="attachment">
                          <label class="custom-file-label">Choose File</label>
                        </div>
                        <div class="form-text text-muted">The image must have a maximum size of 1MB</div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="category_id">Categories</label>
                      <select class="form-control selectric" name="category_id" id="category_id">
                      <?php foreach ($categories as $c) : ?>
                        <option value="<?= $c["id_category"] ?>"><?= $c["name_category"] ?></option>
                      <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="price">Harga</label>
                      <input type="number" name="price" id="price" class="form-control">
                    </div>
                    <div class="d-flex justify-content-end">
                      <button class="btn btn-primary" name="submit" type="submit">Tambahkan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <!-- Footer -->
      <?php include('../component/footer.php') ?>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="../assets/modules/jquery.min.js"></script>
  <script src="../assets/modules/popper.js"></script>
  <script src="../assets/modules/tooltip.js"></script>
  <script src="../assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="../assets/modules/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>
  <script src="../assets/modules/jquery-selectric/jquery.selectric.min.js"></script>

  <!-- JS Libraies -->

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>
</body>

</html>