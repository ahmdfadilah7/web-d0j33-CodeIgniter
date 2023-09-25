<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Hitung Alternatif</h5>
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
        ?>
        <div class="table-responsive mt-4">
            <table class="table table-bordered text-nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Kriteria</th>
                        <th>Kriteria</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        foreach ($kriteria->result() as $row) {
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row->kode_kriteria ?></td>
                            <td><?= $row->kriteria ?></td>
                            <td>
                                <a href="<?=base_url('matriks/kriteria/'.$row->kode_kriteria)?>" class="btn btn-primary btn-sm"><i class="ti ti-arrow-right"></i></a>
                            </td>
                        </tr>
                    <?php
                        $no++;
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <a href="<?= site_url('matriks/save_ranking') ?>" class="d-block btn btn-success">SIMPAN HASIL PERHITUNGAN</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Ranking</h5>
        <div class="table-responsive mt-4">
            <table class="table table-bordered text-nowrap">
                <thead>
                    <tr>
                        <th>Guru</th>
                        <th>Nilai</th>
                        <th>Ranking</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        foreach ($ranking->result() as $row) {
                    ?>
                        <tr>
                            <td><?= $row->nama ?></td>
                            <td><?= $row->nilai ?></td>
                            <td>
                                <?php
                                    if ($row->nilai <> NULL) {
                                        if ($no==1) {
                                            echo 'PERTAMA';
                                        } else {
                                            echo $no;
                                        }
                                    } else {
                                        echo 'NO RANKING';
                                    }
                                ?>
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