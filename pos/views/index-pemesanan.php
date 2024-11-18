<?php
session_start();
require_once __DIR__ . '/../Model/init.php';

$sales = new Sales();

$limit = 3; // Data per page
$pageActive = isset($_GET["page"]) ? (int)$_GET["page"] : 1; // Halaman yang aktif
$length = count($sales->all()); // Total data
$countPage = ceil($length / $limit);

$key = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$offset = ($pageActive - 1) * $limit;

$prev = ($pageActive > 1) ? $pageActive - 1 : 1;
$next = ($pageActive < $countPage) ? $pageActive + 1 : $countPage;

$data = $sales->all2($offset, $limit);
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

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../assets/modules/prism/prism.css">

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
            <h1>Home Pemesanan</h1>
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
                          <input type="text" class="form-control" placeholder="Search">
                          <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                              <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                            </div>
                          </th>
                          <th>Name</th>
                          <th>Note</th>
                          <th>Status</th>
                          <th>Amount</th>
                          <th>User</th>
                          <th>Due Date</th>
                          <th>Action</th>
                        </tr>
                        <?php foreach ($data as $item) : ?>
                          <tr>
                            <td class="p-0 text-center">
                              <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                              </div>
                            </td>
                            <td><?= $item["name_customer"] ?></td>
                            <td><?= $item["note"] ?></td>
                            <td><a href="#" class="btn <?= $item["status"] == "paid" ? "btn-success" : "btn-danger" ?>"><?= $item["status"] ?></a></td>
                            <td><?= $item["amount"] ?></td>
                            <td><?= $item["full_name"] ?></td>
                            <td> <?= $item["created_at_sale"] ?></td>
                            <td>
                              <button class="btn btn-primary" onclick="modalDetail('<?= $item['name_customer'] ?>', '<?= $item['note'] ?>', '<?= $item['status'] ?>', <?= $item['amount'] ?>, '<?= $item['full_name'] ?>', '<?= $item['created_at_sale'] ?>')"><i class="fas fa-eye"></i></button>
                              <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                              <a href="#" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                        <link rel="stylesheet" href="../assets/modules/prism/prism.css">
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
      </div>
      </section>
    </div>
    <!-- Footer -->
    <?php include('../component/footer.php') ?>
  </div>

  <div class="modal fade" tabindex="-1" role="dialog" id="detailModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Detail Pemesanan</h5>
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

  <!-- General JS Scripts -->
  <script src="../assets/modules/jquery.min.js"></script>
  <script src="../assets/modules/popper.js"></script>
  <script src="../assets/modules/tooltip.js"></script>
  <script src="../assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="../assets/modules/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>
  <script src="../assets/modules/prism/prism.js"></script>
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  <script src="../assets/js/page/modules-sweetalert.js"></script>
  <script src="../assets/js/page/bootstrap-modal.js"></script>

  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>
  <script type="text/javascript">
    function modalDetail(name_customer, note, status, amount, full_name, created_at_sale) {
        let content = '<ul class="list-unstyled">';
        content += `<li class="mb-3"><strong>Nama Customer : </strong>${name_customer}</li>`;
        content += `<li class="mb-3"><strong>Catatan : </strong>${note}</li>`;
        content += `<li class="mb-3"><strong>Status : </strong>${status}</li>`;
        content += `<li class="mb-3"><strong>Jumlah : </strong>${amount}</li>`;
        content += `<li class="mb-3"><strong>Nama Pelayan : </strong>${full_name}</li>`;
        content += `<li class="mb-3"><strong>Di Buat pada: </strong>${created_at_sale}</li>`;
        content += '</ul>';

        $('#detailModal .modal-body').html(content);
        $('#detailModal').modal('show');
    }
  </script>
</body>

</html>