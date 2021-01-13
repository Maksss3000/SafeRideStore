<div class="container">
    <div class="row my-2 justify-content-center">
        <div class="col-5"></div>
        <div class="col-2">
            <select id="year" name="year" class="form-control">
                <?php
                $selected = '';
                for ($i = 2019; $i <=  date("Y"); $i++) {
                    if ($i == date("Y"))
                        $selected = 'selected';
                    echo   '<option value=' . $i . ' ' . $selected . '>' . $i . '</option>';
                    $selected = '';
                }
                ?>
            </select>
        </div>
        <div class="col-5"></div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>