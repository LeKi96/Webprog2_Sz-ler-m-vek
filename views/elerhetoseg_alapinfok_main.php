<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<form action="" method="post">

<br>
    <div class="row">
        <div class="col">
            <h2 class="mr-sm-2" style="background-color: #333; color: antiquewhite; width: fit-content;
             padding: 5px; border-radius: 5px; opacity: 0.9;">Napi árfolyam lekérdezése:</h2><br>
        </div>
    </div>
    <div class="form-row align-items-center" style="background-color: #333; color: antiquewhite; width: fit-content;
     padding: 5px; border-radius: 5px; opacity: 0.9;">
        <div class="col-auto my-1">


            <label class="mr-sm-2">Dátum</label>
            <input type="date" name="on_date" class="form-control" max="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>" required>
            <label class="mr-sm-2">Összeg</label>
            <input type="number" name="sum" class="form-control" value="1" required>
        </div>
        <div class="col-auto my-1">
            <label class="mr-sm-2">1. Deviza</label>
            <select name="from_deviza" class="custom-select mr-sm-2">
                <option value="EUR">EUR - Euro</option>
                <option value="HUF">HUF - Magyar forint</option>
                <option value="USD">USD - Amerikai dollár</option>
                <option value="GBP">GBP - Angol font</option>
                <option value="AUD">AUD - Ausztrál dollár</option>
                <option value="BGN">BGN - Bolgár leva</option>
                <option value="CAD">CAD - Kanadai dollár</option>
                <option value="CHF">CHF - Svájci frank</option>
                <option value="CNY">CNY - Kínai juan</option>
                <option value="CZK">CZK - Cseh korona</option>
                <option value="DKK">DKK - Dán korona</option>
                <option value="HRK">HRK - Horvát kuna</option>
                <option value="JPY">JPY - Japán yen</option>
            </select>
            <label class="mr-sm-2">2. Deviza</label>
            <select name="to_deviza" class="custom-select mr-sm-2">
                <option value="HUF">HUF - Magyar forint</option>
                <option value="JPY">JPY - Japán yen</option>
                <option value="CAD">CAD - Kanadai dollár</option>
                <option value="EUR">EUR - Euro</option>
                <option value="USD">USD - Amerikai dollár</option>
                <option value="GBP">GBP - Angol font</option>
                <option value="AUD">AUD - Ausztrál dollár</option>
                <option value="BGN">BGN - Bolgár leva</option>
                <option value="CHF">CHF - Svájci frank</option>
                <option value="CNY">CNY - Kínai juan</option>
                <option value="CZK">CZK - Cseh korona</option>
                <option value="DKK">DKK - Dán korona</option>
                <option value="HRK">HRK - Horvát kuna</option>

            </select>

        </div>
        <div class="col-12">
            <input class="btn btn-info" type="submit" name="get_currency_on_day" value="Lekérdezés"><br><br>
        </div>
    </div>
</form>
<h3 style="background-color: #333; color: antiquewhite; width: fit-content; padding: 5px; border-radius: 5px;
opacity: 0.9;">
    <?php
    if (isset($viewData['eredmeny']) && $viewData['eredmeny'] != 0) {
        echo $viewData['on_date'] . " napon: " . $viewData['sum']
            . " " . $viewData['from_deviza'] . " = " . number_format($viewData['eredmeny'], 2)
            . " " . $viewData['to_deviza'];
    } else {
        echo "Ünnepnapokon és hétvégén az árfolyam nem változik!";
    }
    ?>
</h3>

<br>
<br>
<form action="" method="post">
    <div class="row">
        <div class="col">
            <h2 class="mr-sm-2" style="background-color: #333; color: antiquewhite; width: fit-content; padding: 5px; 
            border-radius: 5px; opacity: 0.9;">Adott deviza havi árfolyama:</h2><br>
        </div>
    </div>
    <div class="form-row align-items-center" style="background-color: #333; color: antiquewhite; padding: 5px;
    border-radius: 5 px; opacity: 0.9;">
        <div class="col-4">
            <label class="mr-sm-2">Válasszon hónapot:</label>
            <input type="month" name="on_month" class="form-control" value="<?php echo date('Y-m'); ?>" required>
        </div>
        <div class="col-4">
            <label class="mr-sm-2">1. Deviza</label>
            <select name="from_deviza_month" class="custom-select mr-sm-2">
                <option value="EUR">EUR - Euro</option>
                <option value="USD">USD - Amerikai dollár</option>
                <option value="GBP">GBP - Angol font</option>
                <option value="AUD">AUD - Ausztrál dollár</option>
                <option value="BGN">BGN - Bolgár leva</option>
                <option value="CAD">CAD - Kanadai dollár</option>
                <option value="CHF">CHF - Svájci frank</option>
                <option value="CNY">CNY - Kínai juan</option>
                <option value="CZK">CZK - Cseh korona</option>
                <option value="DKK">DKK - Dán korona</option>
                <option value="HRK">HRK - Horvát kuna</option>
                <option value="JPY">JPY - Japán yen</option>
            </select>
        </div>
        <div class="col-4">
            <label class="mr-sm-2">2. Deviza</label>
            <select name="to_deviza_month" class="custom-select mr-sm-2">

                <option value="JPY">JPY - Japán yen</option>
                <option value="CAD">CAD - Kanadai dollár</option>
                <option value="EUR">EUR - Euro</option>
                <option value="USD">USD - Amerikai dollár</option>
                <option value="GBP">GBP - Angol font</option>
                <option value="AUD">AUD - Ausztrál dollár</option>
                <option value="BGN">BGN - Bolgár leva</option>
                <option value="CHF">CHF - Svájci frank</option>
                <option value="CNY">CNY - Kínai juan</option>
                <option value="CZK">CZK - Cseh korona</option>
                <option value="DKK">DKK - Dán korona</option>
                <option value="HRK">HRK - Horvát kuna</option>

            </select>
        </div>
        <div class="col-12 mt-3">
            <input class="btn btn-info" type="submit" name="get_currency_on_month" value="Lekérdezés"><br><br>
        </div>
    </div>
</form>

<br>

<table class="table table-dark" style="background-color: #333; color: antiquewhite; opacity: 0.9;">
    <thead>
        <tr>
            <th scope="col">Dátum</th>
            <th>Devizapár</th>
            <th>Árfolyam</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $currency_pair_value = array();

        if (isset($viewData['date'])) {
            $y = (count($viewData['date']) - 1);
            for ($x = 0; $x <= $y; $x++) {
                if (
                    isset($viewData['unit2_month'][$x]) && isset($viewData['to_deviza_month'][$x]) &&
                    isset($viewData['value_of_currency2_month'][$x])
                ) {

                    $currency_pair_value[$x] = number_format((($viewData['value_of_currency1_month'][$x] /
                        $viewData['unit1_month'][$x]) /
                        ($viewData['value_of_currency2_month'][$x] /
                            $viewData['unit2_month'][$x])), 4);
        ?>
                    <tr>
                        <th scope="row"><?php echo $viewData['date'][$x]; ?></th>
                        <td><?php echo $viewData['from_deviza_month'][$x] . " / " . $viewData['to_deviza_month'][$x]; ?></td>
                        <td><?php echo number_format((($viewData['value_of_currency1_month'][$x] /
                                $viewData['unit1_month'][$x]) /
                                ($viewData['value_of_currency2_month'][$x] /
                                    $viewData['unit2_month'][$x])), 4); ?></td>



                    </tr>
        <?php }
            }
        } ?>
    </tbody>
</table>
<br>
<br>
<canvas id="myChart" width="200" height="75" style="background-color: #333; border-radius: 5px; margin-bottom: 50px;
opacity: 0.9;"></canvas>
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            datasets: [{
                label: <?php echo json_encode($viewData['from_deviza_month'][0] . " / " . $viewData['to_deviza_month'][0]); ?>,
                data: <?php echo json_encode($currency_pair_value); ?>,
                borderColor: 'green',
                borderWidth: 3
            }],

            labels: <?php echo json_encode($viewData['date']); ?>
        },
        options: {
            scales: {
                y: {
                    beginAtZero: false
                }
            }
        }
    });
</script>

<br>

