<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Setting</h5>
        <?php
            if ($this->session->flashdata('berhasil')) {
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p><?= $this->session->flashdata('berhasil') ?></p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            } elseif ($this->session->flashdata('gagal')) {
        ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p><?= $this->session->flashdata('gagal') ?></p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            }

            if ($setting->num_rows() == 0) {
        ?>
            <a href="<?= site_url('setting/add') ?>" class="btn btn-primary"><i class="ti ti-plus"></i></a>
        <?php
            }
        ?>

        <div class="table-responsive mt-4">
            <table class="table table-bordered text-nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Website</th>
                        <th>Logo Website</th>
                        <th>Favicon Website</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        foreach ($setting->result() as $row) {
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row->nama_website ?></td>
                            <td>
                                <img src="<?= base_url($row->logo_website) ?>" width="70">
                            </td>
                            <td>
                                <img src="<?= base_url($row->favicon_website) ?>" width="70">
                            </td>
                            <td>
                                <a href="<?=base_url('setting/edit/'.$row->id)?>" class="btn btn-primary btn-sm"><i class="ti ti-edit"></i></a>
                            </td>
                        </tr>
                    <?php
                        $no++;
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>