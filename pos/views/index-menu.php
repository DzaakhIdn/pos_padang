<?php
require_once __DIR__ . '/../DB/Connections.php';
require_once __DIR__ . '/../Model/init.php';

$menu = new Item();

$limit = 3; // Data per page
$pageActive = isset($_GET["page"]) ? (int)$_GET["page"] : 1; // Halaman yang aktif
$length = count($menu->all()); // Total data
$countPage = ceil($length / $limit);

$key = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$offset = ($pageActive - 1) * $limit;

$prev = ($pageActive > 1) ? $pageActive - 1 : 1;
$next = ($pageActive < $countPage) ? $pageActive + 1 : $countPage;

// Query dengan pagination
$menus = $menu->all2($offset, $limit);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Menu Page &mdash; POS Padang</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="../assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/modules/fontawesome/css/all.min.css">

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
            <h1>Home Menu</h1>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Advanced Table</h4>
                    <div class="card-header-form">
                      <form>
                        <div class="input-group">
                          <input type="text" id="keyword" class="form-control" placeholder="Search">
                          <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div id="bungkus" class="table-responsive">
                      <?php if (empty($menus)) : ?>
                        <div class="d-flex justify-content-center m-5">
                          <div class="pesan">
                          <img src="../assets/img/icon/no-data.gif" alt="" width="100">
                          <p>Tidak Ada Data</p>
                          </div>
                        </div>
                      <?php else: ?>
                        <table class="table table-striped">
                          <tr>
                            <th>
                              <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                              </div>
                            </th>
                            <th>Name</th>
                            <th>Attachment</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Due Date</th>
                            <th>Action</th>
                          </tr>
                          <?php foreach ($menus as $m) : ?>
                            <tr>
                              <td class="">
                                <div class="custom-checkbox custom-control">
                                  <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                  <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                </div>
                              </td>
                              <td><?= $m["name"] ?></td>
                              <td><img src="../public/img/items/<?= $m["attachment"] ?>" alt="" width="50"></td>
                              <td><?= $m["price"] ?></td>
                              <td><?= $m["category_name"] ?></td>
                              <td> <?= $m["created_at"] ?></td>
                              <td>
                                <a href="#" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                <a href="#" class="btn btn-success"><i class="fas fa-edit"></i></a>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        </table>
                        <div class="card-body d-flex justify-content-center">
                          <nav aria-label="Page navigation">
                            <ul class="pagination">
                              <li class="page-item <?= $pageActive == 1 ? 'disabled' : '' ?>">
                                <a class="page-link" href="?page=<?= $prev ?>&keyword=<?= $key ?>">Previous</a>
                              </li>
                              <?php for ($i = 1; $i <= $countPage; $i++) : ?>
                                <li class="page-item <?= $pageActive == $i ? 'active' : '' ?>">
                                  <a class="page-link" href="?page=<?= $i ?>&keyword=<?= $key ?>"><?= $i ?></a>
                                </li>
                              <?php endfor; ?>
                              <li class="page-item <?= $pageActive == $countPage ? 'disabled' : '' ?>">
                                <a class="page-link" href="?page=<?= $next ?>&keyword=<?= $key ?>">Next</a>
                              </li>
                            </ul>
                          </nav>
                        </div>
                      <?php endif; ?>
                    </div>
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

  <!-- JS Libraies -->

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>
  <script type="text/javascript">
    var keyword = $("#keyword")
    var container = $("#bungkus")

    keyword.on("keyup", () => {
      //console.log(keyword.val())
      container.load("../search/search-menu.php?keyword=" + keyword.val())
    })
  </script>
</body>

</html>