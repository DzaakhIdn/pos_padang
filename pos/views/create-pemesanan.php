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
            <h1>Tambah Pemesanan</h1>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-6 d-md-flex align-items-center row">
                <div class="col-6 col-md-6 mb-2 px-1">
                  <div class="card text-center border-0 position-relative">
                    <span class="position-absolute top-0 mt-1 ml-1 start-100 translate-middle badge rounded-pill  bg-primary text-white">+1</span>
                    <img alt="image" src="../assets/img/dummy/image.png" class="img-fluid rounded">
                    <div class="card-body p-1">
                      <h5 class="card-title mb-0">Title 1</h5>
                      <p class="card-text d-none d-md-block">This is a short description for the image.</p>
                    </div>
                  </div>
                </div>
                <div class="col-6 col-md-6 mb-2 px-1">
                  <div class="card text-center border-0 position-relative">
                    <span class="position-absolute top-0 mt-1 ml-1 start-100 translate-middle badge rounded-pill  bg-primary text-white">+1</span>
                    <img alt="image" src="../assets/img/dummy/image.png" class="img-fluid rounded">
                    <div class="card-body p-1">
                      <h5 class="card-title mb-0">Title 2</h5>
                      <p class="card-text d-none d-md-block">This is a short description for the image.</p>
                    </div>
                  </div>
                </div>
                <div class="col-6 col-md-6 mb-2 px-1">
                  <div class="card text-center border-0 position-relative">
                    <span class="position-absolute top-0 mt-1 ml-1 start-100 translate-middle badge rounded-pill  bg-primary text-white">+1</span>
                    <img alt="image" src="../assets/img/dummy/image.png" class="img-fluid rounded">
                    <div class="card-body p-1">
                      <h5 class="card-title mb-0">Title 3</h5>
                      <p class="card-text d-none d-md-block">This is a short description for the image.</p>
                    </div>
                  </div>
                </div>
                <div class="col-6 col-md-6 mb-2 px-1">
                  <div class="card text-center border-0 position-relative">
                    <span class="position-absolute top-0 mt-1 ml-1 start-100 translate-middle badge rounded-pill  bg-primary text-white">+1</span>
                    <img alt="image" src="../assets/img/dummy/image.png" class="img-fluid rounded">
                    <div class="card-body p-1">
                      <h5 class="card-title mb-0">Title 4</h5>
                      <p class="card-text d-none d-md-block">This is a short description for the image.</p>
                    </div>
                  </div>
                </div>
              </div>



              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Tambahkan Customer Baru</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Nama Customer</label>
                      <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Catatan</label>
                      <textarea name="text-area" id="" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control selectric">
                        <option>Paid</option>
                        <option>Debt</option>
                        <option>Cancel</option>
                      </select>
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