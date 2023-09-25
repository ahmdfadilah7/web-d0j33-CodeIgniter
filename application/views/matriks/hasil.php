<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Ranking - AHP</h5>
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
                        foreach ($rankingahp->result() as $row) {
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
                        foreach ($rankingsaw->result() as $row) {
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
                                    $no++;
                                ?>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
</div>