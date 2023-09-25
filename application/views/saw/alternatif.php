<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Hitung Alternatif - SAW</h5>
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

        <form action="<?= site_url('saw/save_alternatif') ?>" method="post">

            <div class="table-responsive mt-4">
                <table class="table table-bordered text-nowrap">
                    <thead>
                        <tr>
                            <th class="text-center" style="padding-bottom:70px;" rowspan="3">Kepentingan</th>
                            <?php
                                foreach ($kriteria->result() as $row) {
                            ?>
                                <th class="text-center"><?= $row->kriteria ?></th>
                            <?php
                                }
                            ?>
                        </tr>
                        <tr>
                            <?php
                                foreach ($kriteria->result() as $row) {
                            ?>
                                <th class="text-center"><?= $row->nilai_kriteria ?></th>
                            <?php
                                }
                            ?>
                        </tr>
                        <tr>
                            <?php
                                foreach ($kriteria->result() as $row) {
                            ?>
                                <th class="text-center"><?= $row->jenis ?></th>
                            <?php
                                }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach ($guru->result() as $row) {
                        ?>
                            <tr>
                                <td><?= $row->nama ?></td>
                                <?php
                                    foreach ($kriteria->result() as $kr) {
                                ?>
                                    <input type="hidden" name="guru_<?= $row->id.$kr->kode_kriteria ?>" value="<?= $row->id ?>">
                                    <input type="hidden" name="kriteria_<?= $row->id.$kr->kode_kriteria ?>" value="<?= $kr->kode_kriteria ?>">
                                    <td class="text-center">
                                        <input type="number" class="form-control" name="<?= $row->id.'_'.$kr->kode_kriteria ?>" value="0">
                                    </td>
                                <?php
                                    }
                                ?>
                            </tr>
                        <?php
                            $no++;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="d-block text-right">
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </div>
            
        </form>

    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Hasil Alternatif - SAW</h5>

        <div class="table-responsive mt-4">
            <table class="table table-bordered text-nowrap">
                <thead>
                    <tr>
                        <th class="text-center" style="padding-bottom:70px;" rowspan="3">Kepentingan</th>
                        <?php
                            foreach ($kriteria->result() as $row) {
                        ?>
                            <th class="text-center"><?= $row->kriteria ?></th>
                        <?php
                            }
                        ?>
                    </tr>
                    <tr>
                        <?php
                            foreach ($kriteria->result() as $row) {
                        ?>
                            <th class="text-center"><?= $row->nilai_kriteria ?></th>
                        <?php
                            }
                        ?>
                    </tr>
                    <tr>
                        <?php
                            foreach ($kriteria->result() as $row) {
                        ?>
                            <th class="text-center"><?= $row->jenis ?></th>
                        <?php
                            }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        foreach ($guru->result() as $row) {
                    ?>
                        <tr>
                            <td><?= $row->nama ?></td>
                            <?php
                                foreach ($kriteria->result() as $kr) {
                                    $nilai = $this->db->query("SELECT nilai FROM hasil_alternatif_saw WHERE guru_id = '$row->id' AND kode_kriteria = '$kr->kode_kriteria'");
                            ?>
                                <td class="text-center">
                                    <?= $nilai->row()->nilai ?>
                                </td>
                            <?php
                                }
                            ?>
                        </tr>
                    <?php
                        $no++;
                        }
                    ?>
                    <tr>
                        <td>PEMBAGI</td>
                        <?php
                            foreach ($kriteria->result() as $k) {
                                $max = $this->db->query("SELECT MAX(nilai) as nilai_max FROM hasil_alternatif_saw WHERE kode_kriteria = '$k->kode_kriteria'");
                        ?>
                            <td class="text-center"><?= $max->row()->nilai_max ?></td>
                        <?php
                            }
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Normalisasi - SAW</h5>

        <div class="table-responsive mt-4">
            <table class="table table-bordered text-nowrap">
                <thead>
                    <tr>
                        <th class="text-center" style="padding-bottom:70px;" rowspan="3">Kepentingan</th>
                        <?php
                            foreach ($kriteria->result() as $row) {
                        ?>
                            <th class="text-center"><?= $row->kriteria ?></th>
                        <?php
                            }
                        ?>
                    </tr>
                    <tr>
                        <?php
                            foreach ($kriteria->result() as $row) {
                        ?>
                            <th class="text-center"><?= $row->nilai_kriteria ?></th>
                        <?php
                            }
                        ?>
                    </tr>
                    <tr>
                        <?php
                            foreach ($kriteria->result() as $row) {
                        ?>
                            <th class="text-center"><?= $row->jenis ?></th>
                        <?php
                            }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        foreach ($guru->result() as $row) {
                    ?>
                        <tr>
                            <td><?= $row->nama ?></td>
                            <?php
                                foreach ($kriteria->result() as $kr) {
                                    $nilai = $this->db->query("SELECT nilai FROM hasil_alternatif_saw WHERE guru_id = '$row->id' AND kode_kriteria = '$kr->kode_kriteria'");
                                    $max = $this->db->query("SELECT MAX(nilai) as nilai_max FROM hasil_alternatif_saw WHERE kode_kriteria = '$kr->kode_kriteria'");
                            ?>
                                <td class="text-center">
                                    <?= $nilai->row()->nilai/$max->row()->nilai_max ?>
                                </td>
                            <?php
                                }
                            ?>
                        </tr>
                    <?php
                        $no++;
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <a href="<?= site_url('saw/save_ranking') ?>" class="btn btn-primary d-block">SIMPAN HASIL NORMALISASI</a>

    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Ranking - SAW</h5>

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
                                    if ($no==1) {
                                        echo 'PERTAMA';
                                    } else {
                                        echo $no;
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