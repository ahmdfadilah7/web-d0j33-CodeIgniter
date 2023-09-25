<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold"><?= $kriteria->row()->kriteria.' ('.$kriteria->row()->kode_kriteria.')' ?></h5>
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
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p><?= $this->session->flashdata('gagal') ?></p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            }
        ?>
        <form action="<?= site_url('matriks/update_nilai_alternatif/'.$kriteria->row()->kode_kriteria) ?>" method="post">
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="" class="form-label">Baris:</label>
                        <select name="guru_id_1" class="form-control">
                            <?php
                                foreach ($guru->result() as $row) {
                            ?>
                                <option value="<?= $row->id ?>"><?= $row->nama ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="" class="form-label">Kolom:</label>
                        <select name="guru_id_2" class="form-control">
                            <?php
                                foreach ($guru->result() as $row) {
                            ?>
                                <option value="<?= $row->id ?>"><?= $row->nama ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="" class="form-label">Nilai:</label>
                        <div class="d-flex">
                            <select name="nilai" class="form-control" style="margin-right:20px">
                                <?php
                                    foreach ($nilai->result() as $row) {
                                ?>
                                    <option value="<?= $row->kepentingan ?>"><?= $row->kepentingan.' - '.$row->keterangan ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                            <button type="submit" class="btn btn-primary d-block">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="table-responsive mt-4">
            <table class="table table-bordered text-nowrap">
                <thead>
                    <tr>
                        <th><?= $kriteria->row()->kriteria.' ('.$kriteria->row()->kode_kriteria.')' ?></th>
                        <?php
                            foreach ($guru->result() as $row) {
                        ?>
                            <th><?= $row->nama ?></th>
                        <?php
                            }
                        ?>
                    </tr>
                    <?php
                        $kode_kriteria = $this->uri->segment(3);
                        $no = 1;
                        $total = array();
                        foreach ($guru->result() as $row) {
                            $matriks_sum = $this->db->query("SELECT SUM(nilai) as total_nilai FROM analisis_alternatif WHERE kode_kriteria = '$kode_kriteria' AND guru_id_2 = '$row->id'");
                            foreach ($matriks_sum->result() as $value) {
                                $total[] = $value->total_nilai;
                            }
                    ?>
                        <tr>
                            <th><?= $row->nama ?></th>
                            <?php
                                $matriks = $this->db->query("SELECT nilai FROM analisis_alternatif WHERE kode_kriteria = '$kode_kriteria' AND guru_id_1 = '$row->id'");
                                foreach ($matriks->result() as $row) {
                            ?>
                                <th><?= round($row->nilai, 9) ?></th>
                            <?php
                                }                                
                            ?>
                        </tr>
                    <?php
                        $no++;
                        }
                    ?>
                    <tr>
                        <th><strong>Total</strong></th>
                        <?php
                            for ($i=0; $i < $guru->num_rows(); $i++) { 
                        ?>
                            <th><strong><?= round($total[$i], 9) ?></strong></th>
                        <?php
                            }
                        ?>
                    </tr>
                </thead>
            </table>
        </div>
        <a href="<?= site_url('matriks/save_alternatif_result/'.$kriteria->row()->kode_kriteria) ?>" class="d-block btn btn-primary">SIMPAN HASIL PERHITUNGAN</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold">Nilai Eigen</h5>
        <div class="table-responsive mt-3">

            <table class="table table-bordered text-nowrap">
                <thead>
                    <tr>
                        <th><?= $kriteria->row()->kriteria.' ('.$kriteria->row()->kode_kriteria.')' ?></th>
                        <?php
                            foreach ($guru->result() as $row) {
                        ?>
                            <th><?= $row->nama ?></th>
                        <?php
                            }
                        ?>
                        <th>Jumlah</th>
                        <th>Rata - Rata</th>
                    </tr>
                    <?php
                        $no = 1;
                        $total = array();
                        $jumlah = array();
                        foreach ($guru->result() as $row) {
                    ?>
                        <tr>
                            <th><?= $row->nama ?></th>
                            <?php
                                $matriks = $this->db->query("SELECT nilai, bobot, jumlah FROM analisis_alternatif WHERE kode_kriteria = '$kode_kriteria' AND guru_id_1 = '$row->id'");
                                foreach ($matriks->result() as $r) {
                            ?>
                                <th><?= round($r->jumlah, 9) ?></th>
                            <?php
                                }

                                $jumlahmatriks = $this->db->query("SELECT SUM(jumlah) as jumlah_kriteria FROM analisis_alternatif WHERE kode_kriteria = '$kode_kriteria' AND guru_id_1 = '$row->id'");
                                $jumlah[] = $jumlah_matriks = $jumlahmatriks->row()->jumlah_kriteria/$guru->num_rows();
                            ?>
                            <th><?= round($jumlahmatriks->row()->jumlah_kriteria, 9) ?></th>
                            <th><?= round($jumlah_matriks, 9) ?></th>
                        </tr>
                    <?php
                        $no++;
                        }
                    ?>
                    <tr>
                        <th style="font-weight:700">TOTAL</th>
                        <th colspan="<?= $guru->num_rows()+1 ?>" class="text-center" style="font-weight:700">NILAI KONSISTENSI</th>
                        <th style="font-weight:700"><?= array_sum(($jumlah)) ?></th>
                    </tr>
                </thead>
            </table>

        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold">Result :</h5>
        <div class="table-responsive mt-3">
            <?php
                $nilailamdamax = array();
                foreach ($guru->result() as $row) {
                    $jumlahmatriks = $this->db->query("SELECT SUM(jumlah) as jumlah_kriteria FROM analisis_alternatif WHERE kode_kriteria = '$kode_kriteria' AND guru_id_1 = '$row->id'");
                    $jumlah_matriks = round($jumlahmatriks->row()->jumlah_kriteria, 9)/$guru->num_rows();
                    
                    $analisis = $this->db->query("SELECT * FROM analisis_alternatif WHERE kode_kriteria = '$kode_kriteria' AND guru_id_1 = '$row->id' AND guru_id_2 = '$row->id'");
                    foreach ($analisis->result() as $value) {
                        $nilailamdamax[] = round(round($value->bobot, 9)*$jumlah_matriks, 9);
                    }
                }
                $nilai_lamda = array_sum($nilailamdamax);
                $nilai_ci = ($nilai_lamda-$guru->num_rows())+($guru->num_rows()-1);
                $nilai_cr = $nilai_ci/112;
                if ($nilai_cr <= 0.1) {
                    $kons = 'KONSISTEN';
                } else {
                    $kons = 'TIDAK KONSISTEN';
                }
            ?>
            <table class="table table-bordered text-nowrap">
                <thead>
                    <tr>
                        <th style="width:50%;">NILAI LAMDA MAX</th>
                        <th><?= $nilai_lamda ?></th>
                    </tr>
                    <tr>
                        <th style="width:50%;">NILAI CI</th>
                        <th><?= $nilai_ci ?></th>
                    </tr>
                    <tr>
                        <th style="width:50%;">NILAI CR</th>
                        <th><?= round($nilai_cr, 9).' - '.$kons ?></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>