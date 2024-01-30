<?php
        if (!isset($_SESSION['login']) && ($_SESSION['id_role'] == '3')) {
          header("Location:" . BASEURL . "Login");
          exit;
        }    
?>
<div class="body-beranda">
    <div class="side-bar">
        <div class="profil">
            <div class="logo">
                <img src="<?=BASEURL;?>img/logo bg hitam.svg" alt="logo" />
            </div>
            <div class="data-profil">
                <?php
    if (!isset($data['foto'])) {
        echo '<img src="' . BASEURL . 'img/PersonCircle.png" alt="profile" style="width: 80px; height: 80px" />';
    } else {
        echo '<img src="' . $data['foto'] . '" alt="profile" style="width: 80px; height: 80px" />';
    }
    ?>
                <div class="detail-data-profil">
                    <p id="nama">Profile</p>
                    <p id="role">User</p>
                </div>
            </div>
        </div>
        <hr />
        <div class="menu">
            <ul>
                <li class="beranda">
                    <button onclick="location.href='<?=BASEURL;?>Beranda'">
                        <i class="fa-solid fa-house" style="color: #ffffff;"></i>
                        Beranda
                    </button>
                </li>
                <li class="tambah-jenis-barang">
                    <button onclick="location.href='<?=BASEURL;?>JenisBarang'">
                        <i class="fa-solid fa-box" style="color: #ffffff"></i>
                        Jenis barang
                    </button>
                </li>
                <li class="tambah-merek-barang">
                    <button onclick="location.href='<?=BASEURL?>merekBarang'">
                        <i class="fa-solid fa-barcode" style="color: #ffffff;"></i>
                        Merek barang
                    </button>
                </li>
                <?php
                if (isset($_SESSION['login']) && ($_SESSION['id_role'] == '3')) {
                echo '<li class="kelola-akun">
                    <button onclick="location.href=\''.BASEURL.'KelolaAkun\'">
                        <i class="fa-solid fa-users-gear" style="color: #ffffff"></i>
                        Kelola akun
                    </button>
                </li>';
                }
                ?>
                <li class="keluar">
                    <button onclick="location.href='<?=BASEURL;?>Logout'">
                        <i class="fa-solid fa-arrow-right-from-bracket" style="color: #ffffff"></i>
                        Keluar
                    </button>
                </li>
            </ul>
        </div>
    </div>
    <div class="content">
        <div class="content-beranda" style="overflow-y: auto;">
            <h3 id="title">Kelola Akun</h3>
            <div class="flash" style="width: 40%; margin-left:15px;">
                <?php Flasher::flash();?>
            </div>
            <div class="btn-fitur" style="display: flex; justify-content:space-between;">
                <button onclick="location.href='<?=BASEURL;?>Register'"
                    class="btn d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-plus" style="color: #ffffff"></i> Tambah
                </button>
                <div class="search" style="width:350px">
                    <form action="<?=BASEURL;?>KelolaAkun/cari" method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary" type="submit" id="btn-cari"
                                    style="width: 60px;"><i class="fa-solid fa-magnifying-glass"
                                        style="color: #ffffff;"></i></button>
                            </div>
                            <input type="text" class="form-control" placeholder="Cari..." name="keyword" id="keyword"
                                style="height: 45px;" autocomplete="off">
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-hover table-">
                <thead>
                    <tr>
                        <th scope="col" class="text-nowrap">No.</th>
                        <th scope="col" class="text-nowrap">Foto</th>
                        <th scope="col" class="text-nowrap">Nama User</th>
                        <th scope="col" class="text-nowrap">Email</th>
                        <th scope="col" class="text-nowrap">No Hp</th>
                        <th scope="col" class="text-nowrap">Jenis Kelamin</th>
                        <th scope="col" class="text-nowrap">Alamat</th>
                        <th scope="col" class="text-nowrap">Role</th>
                        <th scope="col" class="text-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data['dataTampilUser'] as $row): ?>
                    <tr>
                        <th scope="row" class="px-2"><?= $i++; ?></th>
                        <td class="px-2"><img src="<?= $row['foto']; ?>" alt="profile"
                                style="height: 100px; width:100px;"></td>
                        <td class="px-2"><?= $row['nama_user']; ?></td>
                        <td class="px-2"><?= $row['email']; ?></td>
                        <td class="px-2"><?= $row['no_hp_user']; ?></td>
                        <td class="px-2"><?= $row['jenis_kelamin']; ?></td>
                        <td class="px-2"><?= $row['alamat']; ?></td>
                        <td class="px-2"><?= $row['role'];?></td>
                        <td class="px-2" style="display: flex;">
                            <!-- hapus -->
                            <a href="<?=BASEURL;?>KelolaAkun/hapusUser/<?= $row['id_user']; ?>"
                                class="btn d-flex align-items-center justify-content-center"
                                onclick="return confirm('yakin');">
                                <i class="fa-solid fa-trash-can fa-lg" style="color: #cc3030;"></i>
                            </a>

                            <!-- ubah -->
                            <a href="<?=BASEURL;?>KelolaAkun/ubahRole/<?= $row['id_user']; ?>"
                                class="btn d-flex align-items-center justify-content-center"
                                data-toggle="modal" data-id="<?=$row['id_user'];?>" data-target="#modalTambah" >
                                <i class="fa-solid fa-pen-to-square fa-lg" style="color: #30cc30;"></i>
                            </a>
                    </tr>
                    <?php endforeach; ?>  
                </tbody>
            </table>
            <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="height: max-content; border-radius:15px">
                        <div class="modal-header">
                            <h5 class="modal-title">Ubah Role User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body body-kelola-akun">
                            <form action="<?=BASEURL?>KelolaAkun/ubahRole" method="post">
                                <input type="hidden" name="id_user" id="id_user">
                                <br>
                                <div class="ubah-role">
                                    <div class="User d-flex align-items-center">
                                        <input type="radio" name="id_role" id="userRole" value="1" required />
                                        <label for="userRole" class="mt-2 ml-2">User</label>
                                    </div>
                                    <div class="Admin d-flex align-items-center">
                                        <input type="radio" name="id_role" id="adminRole" value="2" required />
                                        <label for="adminRole" class="mt-2 ml-2">Admin</label>
                                    </div>
                                    <div class="Super-Admin d-flex align-items-center">
                                        <input type="radio" name="id_role" id="superAdminRole" value="3"
                                            required />
                                        <label for="superAdminRole" class="mt-2 ml-2">Super Admin</label>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="modal-footer" style="margin-right: 30%;">
                                </div>
                                <br>
                                <div style="display: flex; width:100%; justify-content: end; align-items: end;">
                                    <button type="submit" id="kirim" onclick="return confirm('yakin');">Kirim</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>