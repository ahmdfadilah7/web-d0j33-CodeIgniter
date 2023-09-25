
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h5 class="card-title fw-semibold">Nilai Eigen</h5>
            <a href="<?= site_url('matriks/perbandingan') ?>" class="btn btn-primary d-block">Kembali</a>
        </div>
        <div class="table-responsive mt-4">

            <table class="table table-bordered text-nowrap">
                <thead>
                    <tr>
                        <th>Kriteria</th>
                        <?php
                            foreach ($kriteria->result() as $row) {
                        ?>
                            <th><?= $row->kriteria ?></th>
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
                        foreach ($kriteria->result() as $row) {
                    ?>
                        <tr>
                            <th><?= $row->kriteria ?></th>
                            <?php
                                $matriks = $this->db->query("SELECT nilai, bobot, jumlah FROM analisis_kriteria WHERE kode_kriteria_1 = '$row->kode_kriteria'");
                                foreach ($matriks->result() as $r) {
                            ?>
                                <th><?= round($r->jumlah, 9) ?></th>
                            <?php
                                }

                                $jumlahmatriks = $this->db->query("SELECT SUM(jumlah) as jumlah_kriteria FROM analisis_kriteria WHERE kode_kriteria_1 = '$row->kode_kriteria'");
                                $jumlah[] = $jumlah_matriks = round($jumlahmatriks->row()->jumlah_kriteria, 9)/$kriteria->num_rows();
                            ?>
                            <th><?= round($jumlahmatriks->row()->jumlah_kriteria, 9) ?></th>
                            <th><?= round($jumlah_matriks, 9) ?></th>
                        </tr>
                    <?php
                        $no++;
                        }
                    ?>
                    <tr>
                        <th colspan="7">Total</th>
                        <th><?= array_sum(($jumlah)) ?></th>
                    </tr>
                </thead>
            </table>

        </div>
        <div class="table-responsive mt-5">
            <h5 class="card-title fw-semibold">Result :</h5>
            <?php
                foreach ($kriteria->result() as $row) {
                    $jumlahmatriks = $this->db->query("SELECT SUM(jumlah) as jumlah_kriteria FROM analisis_kriteria WHERE kode_kriteria_1 = '$row->kode_kriteria'");
                    $jumlah_matriks = round($jumlahmatriks->row()->jumlah_kriteria, 9)/$kriteria->num_rows();
                    
                    $analisis = $this->db->query("SELECT * FROM analisis_kriteria WHERE kode_kriteria_1 = '$row->kode_kriteria' AND kode_kriteria_2 = '$row->kode_kriteria'");
                    foreach ($analisis->result() as $value) {
                        $nilailamdamax[] = round(round($value->bobot, 9)*$jumlah_matriks, 9);
                    }
                }
                $nilai_lamda = array_sum($nilailamdamax);
                $nilai_ci = (array_sum($nilailamdamax)-$kriteria->num_rows())+($kriteria->num_rows()-1);
                $nilai_cr = $nilai_ci/112;
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
                        <th><?= round($nilai_cr, 9) ?></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>