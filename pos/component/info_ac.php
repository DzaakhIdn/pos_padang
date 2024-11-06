<?php
require_once __DIR__ . '/../Model/init.php';

$users = new User();

$user = $users->all();
//var_dump($user);
?>

<div class="row">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <img src="../assets/img/vector/info-account.jpg" alt="">
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4>Informasi Akun</h4>
            </div>
            <div class="card-body">
            <div class="card profile-widget">
                  <div class="profile-widget-header">                     
                    <img alt="image" src="../public/img/users/<?= $user[0]["avatar"] ?>" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Bergabung Sejak</div>
                        <div class="profile-widget-item-value">1987</div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Penjualan</div>
                        <div class="profile-widget-item-value">$6,8K</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" value="<?= $user[0]["name"] ?>">
                </div>
                <div class="form-group">
                    <label>email</label>
                    <input type="email" class="form-control" value="<?= $user[0]["email"] ?>">
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <select class="form-control selectric">
                        <option>Laki-Laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>