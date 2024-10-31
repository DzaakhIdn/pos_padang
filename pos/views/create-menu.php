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
                <img src="../assets/img/svg/mie.png" alt="" width="450">
              </div>
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Tambahkan Menu Baru</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Nama Menu</label>
                      <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label class="form-control-label">Attachment</label>
                      <div class="">
                        <div class="custom-file">
                          <input type="file" name="site_favicon" class="custom-file-input" id="site-favicon">
                          <label class="custom-file-label">Choose File</label>
                        </div>
                        <div class="form-text text-muted">The image must have a maximum size of 1MB</div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Categories</label>
                      <select class="form-control selectric">
                        <option>Option 1</option>
                        <option>Option 2</option>
                        <option>Option 3</option>
                        <option>Option 4</option>
                        <option>Option 5</option>
                        <option>Option 6</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Harga</label>
                      <input type="number" class="form-control">
                    </div>
                    <div class="d-flex justify-content-end">
                      <button class="btn btn-primary">Tambahkan</button>
                    </div>
                  </div>
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