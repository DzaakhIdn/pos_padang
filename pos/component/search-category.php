<?php
require_once __DIR__ . '/../Model/init.php';
require_once __DIR__ . '/../Model/Category.php';
// require_once __DIR__ . '/../views/index-category.php';

$key = $_GET['keyword'];
$kategori = new Category();
$categories = $kategori->search($key);
?>
<div class="table-responsive">
    <table class="table table-striped">
        <tr>
            <th>
                <div class="custom-checkbox custom-control">
                    <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                    <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                </div>
            </th>
            <th>Nama Kategori</th>
            <th>Action</th>
        </tr>
        <?php
        foreach ($categories as $category) : ?>
            <tr>
                <td class="">
                    <div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                        <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                    </div>
                </td>
                <td> <?= $category['name'] ?></td>
                <td>
                    <a href="#" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                    <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    <a href="#" class="btn btn-success"><i class="fas fa-edit"></i></a>
                </td>
            </tr>
        <?php
        endforeach;
        ?>
    </table>
</div>