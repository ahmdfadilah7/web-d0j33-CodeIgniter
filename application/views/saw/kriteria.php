<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Hitung Kriteria - SAW</h5>
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
        <form action="<?= site_url('saw/save') ?>" method="post">
            
            <div class="table-responsive mt-4">
                <table class="table table-bordered text-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kriteria</th>
                            <th>Benefit/Cost</th>
                            <th style="width:20%;">Bobot</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach ($kriteria->result() as $row) {
                                $total[] = $row->bobot;
                        ?>
                            <input type="hidden" name="id_<?=$row->kode_kriteria?>" value="<?=$row->kode_kriteria?>">
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $row->kriteria ?></td>
                                <td>
                                    <select name="jenis_<?=$row->kode_kriteria?>" class="form-control">
                                        <option value="benefit" <?php if($row->jenis=='benefit') { echo 'selected'; } ?>>Benefit</option>
                                        <option value="cost" <?php if($row->jenis=='cost') { echo 'selected'; } ?>>Cost</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="number" name="bobot_<?=$row->kode_kriteria?>" class="form-control" value="<?= $row->bobot ?>">    
                                </td>
                            </tr>
                        <?php
                            $no++;
                            }
                        ?>
                        <tr>
                            <th colspan="3" class="text-center">Total</th>
                            <th class="text-center"><?= array_sum($total) ?></th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="d-block text-right">
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </div>
            
        </form>

    </div>
</div>