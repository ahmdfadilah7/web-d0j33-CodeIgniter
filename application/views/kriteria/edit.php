<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Edit Kriteria</h5>
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
        <form action="<?= base_url('kriteria/proses_edit/'. $kriteria->kode_kriteria) ?>" method="post" enctype="multipart/form-data">
            <div class="form-group mb-3">
                <label for="" class="form-label">Kriteria</label>
                <input type="text" name="kriteria" class="form-control" value="<?= $kriteria->kriteria ?>">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= site_url('kriteria') ?>" class="btn btn-warning">Kembali</a>
            </div>
        </form>
    </div>
</div>