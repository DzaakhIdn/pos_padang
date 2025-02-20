<?php
session_start();
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
  <link rel="stylesheet" href="../assets/modules/prism/prism.css">

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
                      <?php if (empty($categories)) : ?>
                        <div class="d-flex justify-content-center m-5">
                          <div class="pesan">
                            <img src="../assets/img/icon/no-data.gif" alt="" width="100">
                            <p>Tidak Ada Data</p>
                          </div>
                        </div>kzz
                      <?php else : ?>
                        <table class="table table-striped">
                          <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Action</th>
                          </tr>
                          <?php foreach ($categories as $category) : ?>
                            <tr>
                              <td>1</td>
                              <td> <?= htmlspecialchars($category['name_category']) ?></td>
                              <td>
                                <button class="btn btn-primary" onclick="modalDetail(<?= $category['id_category'] ?>, '<?= $category['name_category'] ?>')"><i class="fas fa-eye"></i></button>
                                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                <a href="./../services/edit-category.php?id=<?= $category['id_category'] ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
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
        </section>
      </div>
      <?php include('../component/footer.php') ?>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="detailModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Detail Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
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

  <!-- JS Libraies -->
  <script src="../assets/modules/prism/prism.js"></script>

  <!-- Page Specific JS File -->
  <script src="../assets/js/page/modules-sweetalert.js"></script>
  <script src="../assets/js/page/bootstrap-modal.js"></script>


  <script type="text/javascript">
    var keyword = $("#keyword")
    var container = $("#bungkus")

    keyword.on("keyup", () => {
      //console.log(keyword.val())
      container.load("../search/search-category.php?keyword=" + keyword.val())
    });

    function modalDetail(id, name) {
      $('#detailModal .modal').empty();
      let content = '<ul>';
      content += `<li><strong> Id Kategori: </strong>${id}</li>`;
      content += `<li><strong> Name Kategori: </strong>${name}</li>`;
      content += `</ul>`;

      $('#detailModal .modal-body').html(content);
      $('#detailModal').modal('show');
    }
  </script>
</body>

</html>