<?php
require_once __DIR__ . '/../DB/Connections.php';
require_once __DIR__ . '/../Model/init.php';

$kategori = new Category();

$limit = 3; // Data per page
$pageActive = isset($_GET["page"]) ? (int)$_GET["page"] : 1; // Halaman yang aktif
$length = count($kategori->all()); // Total data
$countPage = ceil($length / $limit);

$key = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$offset = ($pageActive - 1) * $limit;

$prev = ($pageActive > 1) ? $pageActive - 1 : 1;
$next = ($pageActive < $countPage) ? $pageActive + 1 : $countPage;

// Query dengan pagination
$categories = $kategori->paginate($offset, $limit);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Home Category</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="../assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <?php include('../component/navbar.php') ?>
      <?php include('../component/sidebar.php') ?>

      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Home Kategori</h1>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Advanced Table</h4>
                    <div class="card-header-form">
                      <form method="GET" action="">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search" id="keyword" name="keyword" value="<?= $key ?>">
                          <div class="input-group-btn">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div id="bungkus" class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>No</th>
                          <th>Nama Kategori</th>
                          <th>Action</th>
                        </tr>
                        <?php foreach ($categories as $category) : ?>
                          <tr>
                            <td>1</td>
                            <td> <?= htmlspecialchars($category['name']) ?></td>
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <?php include('../component/footer.php') ?>
    </div>
  </div>

  <script src="../assets/modules/jquery.min.js"></script>
  <script src="../assets/modules/popper.js"></script>
  <script src="../assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="../assets/modules/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>

  <script type="text/javascript">
    var keyword = $("#keyword")
    var container = $("#bungkus")

    keyword.on("keyup", () => {
      //console.log(keyword.val())
      container.load("../search/search-category.php?keyword=" + keyword.val())
    })
  </script>
</body>

</html>