<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Tambah Guru</h5>
        <?php if ($this->session->flashdata('berhasil')) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p><?= $this->session->flashdata('berhasil') ?></p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } elseif ($this->session->flashdata('gagal')) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p><?= $this->session->flashdata('gagal') ?></p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <form action="<?= base_url('guru/proses_add') ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Tempat Lahir</label>
                        <input type="text" name="tmp_lahir" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Jenis Kelamin</label>
                        <select name="jns_kelamin" class="form-control">
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">NIP</label>
                        <input type="text" name="nip" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Gelar Depan</label>
                        <input type="text" name="gelar_depan" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Gelar Belakang</label>
                        <input type="text" name="gelar_belakang" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Jenjang</label>
                        <input type="text" name="jenjang" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Jurusan</label>
                        <input type="text" name="jurusan" class="form-control">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Sertifikasi</label>
                        <input type="text" name="sertifikasi" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Kompetensi</label>
                        <input type="text" name="kompetensi" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Tanggal Daftar</label>
                        <input type="date" name="tgl_daftar" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= site_url('guru') ?>" class="btn btn-warning">Kembali</a>
            </div>
        </form>
    </div>
</div>