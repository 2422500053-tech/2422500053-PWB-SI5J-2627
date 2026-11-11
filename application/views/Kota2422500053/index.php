
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="content-wrapper">

    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kota</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?= site_url('administrator/kota'); ?>">
                                Home
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            Kota
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">

            <?= $this->session->flashdata('pesan'); ?>

            <?php if (validation_errors()): ?>
                <div class="alert alert-danger">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <div class="card card-primary card-outline">

                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-city"></i>
                        Data Kota
                    </h3>

                    <div class="card-tools">
                        <button type="button"
                                class="btn btn-primary btn-sm"
                                data-toggle="modal"
                                data-target="#modalTambah">

                            <i class="fas fa-plus"></i>
                            Tambah Data Kota

                        </button>
                    </div>
                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered table-striped"
                               id="tabelKota">

                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kota</th>
                                    <th>Wilayah</th>
                                    <th>Provinsi</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php
                                $no = 1;
                                foreach ($data_kota as $kota):
                                ?>

                                <tr>
                                    <td><?= $no++; ?></td>

                                    <td>
                                        <?= html_escape($kota['nama_kota053']); ?>
                                    </td>

                                    <td>
                                        <?= html_escape($kota['wilayah053']); ?>
                                    </td>

                                    <td>
                                        <?= html_escape($kota['provinsi053']); ?>
                                    </td>

                                    <td>
                                        <?php if ($kota['status053'] == 'Aktif'): ?>

                                            <span class="badge badge-success">
                                                Aktif
                                            </span>

                                        <?php else: ?>

                                            <span class="badge badge-danger">
                                                Tidak Aktif
                                            </span>

                                        <?php endif; ?>
                                    </td>

                                    <td>

                                        <button type="button"
                                                class="btn btn-warning btn-sm"
                                                data-toggle="modal"
                                                data-target="#modalUbah<?= (int) $kota['id_kota53']; ?>">

                                            <i class="fas fa-edit"></i>
                                            Ubah

                                        </button>

                                        <button type="button"
                                                class="btn btn-danger btn-sm"
                                                data-toggle="modal"
                                                data-target="#modalHapus<?= (int) $kota['id_kota53']; ?>">

                                            <i class="fas fa-trash"></i>
                                            Hapus

                                        </button>

                                    </td>
                                </tr>

                                <?php endforeach; ?>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>
    </section>
</div>


<!-- ===================================== -->
<!-- MODAL TAMBAH DATA KOTA -->
<!-- ===================================== -->

<div class="modal fade" id="modalTambah">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header bg-primary">
                <h5 class="modal-title">
                    Tambah Data Kota
                </h5>

                <button type="button"
                        class="close"
                        data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <form method="post"
                  action="<?= site_url('administrator/kota/tambah'); ?>">

                <div class="modal-body">

                    <?php if ($this->config->item('csrf_protection')): ?>
                        <input type="hidden"
                               name="<?= $this->security->get_csrf_token_name(); ?>"
                               value="<?= $this->security->get_csrf_hash(); ?>">
                    <?php endif; ?>

                    <div class="form-group">
                        <label>Nama Kota</label>

                        <input type="text"
                               name="nama_kota053"
                               class="form-control"
                               placeholder="Masukkan Nama Kota"
                               maxlength="50"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Wilayah</label>

                        <select name="wilayah053"
                                class="form-control"
                                required>

                            <option value="">
                                -- Pilih Wilayah --
                            </option>

                            <option value="Kota">
                                Kota
                            </option>

                            <option value="Kabupaten">
                                Kabupaten
                            </option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label>Provinsi</label>

                        <input type="text"
                               name="provinsi053"
                               class="form-control"
                               placeholder="Masukkan Provinsi"
                               maxlength="50"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Status</label>

                        <select name="status053"
                                class="form-control"
                                required>

                            <option value="">
                                -- Pilih Status --
                            </option>

                            <option value="Aktif">
                                Aktif
                            </option>

                            <option value="Tidak Aktif">
                                Tidak Aktif
                            </option>

                        </select>
                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal">
                        Batal
                    </button>

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="fas fa-save"></i>
                        Simpan

                    </button>

                </div>

            </form>

        </div>
    </div>
</div>


<!-- ===================================== -->
<!-- MODAL UBAH DAN HAPUS DATA KOTA -->
<!-- ===================================== -->

<?php foreach ($data_kota as $kota): ?>

<?php $id = (int) $kota['id_kota53']; ?>

<!-- MODAL UBAH -->

<div class="modal fade" id="modalUbah<?= $id; ?>">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header bg-warning">

                <h5 class="modal-title">
                    Ubah Data Kota
                </h5>

                <button type="button"
                        class="close"
                        data-dismiss="modal">
                    <span>&times;</span>
                </button>

            </div>

            <form method="post"
                  action="<?= site_url('administrator/kota/ubah/' . $id); ?>">

                <div class="modal-body">

                    <?php if ($this->config->item('csrf_protection')): ?>
                        <input type="hidden"
                               name="<?= $this->security->get_csrf_token_name(); ?>"
                               value="<?= $this->security->get_csrf_hash(); ?>">
                    <?php endif; ?>

                    <div class="form-group">
                        <label>Nama Kota</label>

                        <input type="text"
                               name="nama_kota053"
                               class="form-control"
                               maxlength="50"
                               value="<?= html_escape($kota['nama_kota053']); ?>"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Wilayah</label>

                        <select name="wilayah053"
                                class="form-control"
                                required>

                            <option value="Kota"
                                <?= $kota['wilayah053'] == 'Kota' ? 'selected' : ''; ?>>
                                Kota
                            </option>

                            <option value="Kabupaten"
                                <?= $kota['wilayah053'] == 'Kabupaten' ? 'selected' : ''; ?>>
                                Kabupaten
                            </option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label>Provinsi</label>

                        <input type="text"
                               name="provinsi053"
                               class="form-control"
                               maxlength="50"
                               value="<?= html_escape($kota['provinsi053']); ?>"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Status</label>

                        <select name="status053"
                                class="form-control"
                                required>

                            <option value="Aktif"
                                <?= $kota['status053'] == 'Aktif' ? 'selected' : ''; ?>>
                                Aktif
                            </option>

                            <option value="Tidak Aktif"
                                <?= $kota['status053'] == 'Tidak Aktif' ? 'selected' : ''; ?>>
                                Tidak Aktif
                            </option>

                        </select>
                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal">
                        Batal
                    </button>

                    <button type="submit"
                            class="btn btn-warning">

                        <i class="fas fa-save"></i>
                        Simpan Perubahan

                    </button>

                </div>

            </form>

        </div>
    </div>
</div>


<!-- MODAL HAPUS -->

<div class="modal fade" id="modalHapus<?= $id; ?>">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header bg-danger">

                <h5 class="modal-title">
                    Hapus Data Kota
                </h5>

                <button type="button"
                        class="close"
                        data-dismiss="modal">
                    <span>&times;</span>
                </button>

            </div>

            <form method="post"
                  action="<?= site_url('administrator/kota/hapus/' . $id); ?>">

                <div class="modal-body">

                    <?php if ($this->config->item('csrf_protection')): ?>
                        <input type="hidden"
                               name="<?= $this->security->get_csrf_token_name(); ?>"
                               value="<?= $this->security->get_csrf_hash(); ?>">
                    <?php endif; ?>

                    <p>
                        Apakah Anda yakin ingin menghapus data
                        <strong>
                            <?= html_escape($kota['nama_kota053']); ?>
                        </strong>?
                    </p>

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal">
                        Batal
                    </button>

                    <button type="submit"
                            class="btn btn-danger">

                        <i class="fas fa-trash"></i>
                        Hapus

                    </button>

                </div>

            </form>

        </div>
    </div>
</div>

<?php endforeach; ?>
