<?php
// SOAP kliens létrehozása
$client = new SoapClient("http://www.mnb.hu/arfolyamok.asmx?wsdl");

function performActualQuery($startDate, $endDate, $currencyNames) {
    try {
        // SOAP kiszolgáló címe
        $soapEndpoint = "http://www.mnb.hu/arfolyamok.asmx?wsdl";

        // SOAP kliens létrehozása
        $client = new SoapClient($soapEndpoint, array('cache_wsdl' => WSDL_CACHE_NONE));

        // SOAP hívás paramétereinek beállítása
        $params = array(
            'startDate' => $startDate,
            'endDate' => $endDate,
            'currencyNames' => $currencyNames
        );

        // SOAP hívás végrehajtása
        $result = $client->GetExchangeRates($params);

        // Az eredmény visszaadása
        return $result->GetExchangeRatesResult;
    } catch (SoapFault $e) {
        // SOAP hívás hiba esetén kezelés
        return "SOAP hívás hiba: " . $e->getMessage();
    }
}

// Árfolyamok lekérdezése
function getExchangeRates($startDate, $endDate, $currencyNames) {
    // Validáció: Ellenőrizze, hogy a kezdődátum kisebb-e, mint a záródátum
    if (strtotime($startDate) > strtotime($endDate)) {
        return "";
    }

    // Validáció: Ellenőrizze, hogy a dátumok érvényesek-e
    if (!strtotime($startDate) || !strtotime($endDate)) {
        return "String was not recognised as a valid DateTime";
    }

    // A pénznév listát vesszővel bontsa és tisztítsa meg a whitespace-től
    $currencyArray = array_map('trim', explode(',', $currencyNames));

    // Validáció: Ellenőrizze, hogy a pénznév érvényes-e
    foreach ($currencyArray as $currency) {
        if (strlen($currency) != 3 || !ctype_upper($currency)) {
            return "The currency names are invalid.";
        }
    }

    // Most meg van a kezdődátum, a záródátum és a pénznév érvényessége

    // Itt írd meg a SOAP hívást vagy más módszert a szükséges adatok lekérdezésére

    $result = performActualQuery($startDate, $endDate, $currencyNames);
    if (is_string($result)) {
        // Árfolyamokat feldolgozzuk és HTML kód formázásával visszaadjuk
        $xml = simplexml_load_string($result);

        $html = "<h3>Árfolyamok</h3><ul id='currencyList'>";

        foreach ($xml->Day as $day) {
            $date = (string) $day['date'];

            foreach ($day->Rate as $rate) {
                // Csak a Rate tag tartalmát kinyerjük
                $rateContent = (string) $rate;

                // Példa: Árfolyam formázása HTML-ben
                $formattedRate = sprintf('<li>%s: %s</li>', $date, $rateContent);

                $html .= $formattedRate;
            }
        }

        $html .= "</ul>";

        return $html;
    }
}

$currencyNames = array(
    'CHF' => 'CHF (svájci frank)',
    'EUR' => 'EUR (euro)',
    'USD' => 'USD (USA dollár)',
    'ATS' => 'ATS (osztrák schilling)',
    'AUD' => 'AUD (ausztrál dollár)',
    'AUP' => 'AUP (ausztrál font)',
    'BEF' => 'BEF (belga frank)',
    'BGL' => 'BGL (bolgár leva)',
    'BGN' => 'BGN (bolgár leva)',
    'BRL' => 'BRL (brazil reál)',
    'CAD' => 'CAD (kanadai dollár)',
    'CNY' => 'CNY (kínai jüan)',
    'CZK' => 'CZK (cseh korona)',
    'CSD' => 'CSD (szerb dinár)',
    'CSK' => 'CSK (csehszlovák korona)',
    'DDM' => 'DDM (NDK márka)',
    'DEM' => 'DEM (német márka)',
    'DKK' => 'DKK (dán korona)',
    'EEK' => 'EEK (észt korona)',
    'EGP' => 'EGP (egyiptomi font)',
    'ESP' => 'ESP (spanyol peseta)',
    'FIM' => 'FIM (finn márka)',
    'FRF' => 'FRF (francia frank)',
    'GBP' => 'GBP (angol font)',
    'GHP' => 'GHP (ghanai font)',
    'GRD' => 'GRD (görög drachma)',
    'HKD' => 'HKD (hongkongi dollár)',
    'HRK' => 'HRK (horvát kuna)',
    'HUF' => 'HUF (magyar forint)',
    'IDR' => 'IDR (indonéz rúpia)',
    'IEP' => 'IEP (ír font)',
    'ILS' => 'ILS (izraeli sékel)',
    'INR' => 'INR (indiai rúpia)',
    'ISK' => 'ISK (izlandi korona)',
    'ITL' => 'ITL (olasz líra)',
    'JPY' => 'JPY (japán jen)',
    'KPW' => 'KPW (észak-koreai won)',
    'KRW' => 'KRW (dél-koreai won)',
    'KWD' => 'KWD (kuwaiti dinár)',
    'LBP' => 'LBP (libanoni font)',
    'LTL' => 'LTL (litván litas)',
    'LUF' => 'LUF (luxemburgi frank)',
    'LVL' => 'LVL (lett lat)',
    'MNT' => 'MNT (mongol tugrik)',
    'MXN' => 'MXN (mexikói peso)',
    'MYR' => 'MYR (maláj ringgit)',
    'NLG' => 'NLG (holland forint)',
    'NOK' => 'NOK (norvég korona)',
    'NZD' => 'NZD (új-zélandi dollár)',
    'OAL' => 'OAL (albán lek)',
    'OBL' => 'OBL (bolgár leva)',
    'OFR' => 'OFR (francia frank)',
    'ORB' => 'ORB (szovjet rubel)',
    'PHP' => 'PHP (fülöp-szigeteki peso)',
    'PKR' => 'PKR (pakisztáni rúpia)',
    'PLN' => 'PLN (lengyel zloty)',
    'PTE' => 'PTE (portugál escudo)',
    'ROL' => 'ROL (román lej)',
    'RON' => 'RON (román lej)',
    'RSD' => 'RSD (szerb dinár)',
    'RUB' => 'RUB (orosz rubel)',
    'SDP' => 'SDP (szudáni font)',
    'SEK' => 'SEK (svéd korona)',
    'SGD' => 'SGD (szingapúri dollár)',
    'SIT' => 'SIT (szlovén tolar)',
    'SKK' => 'SKK (szlovák korona)',
    'SUR' => 'SUR (szovjet rubel)',
    'THB' => 'THB (thaiföldi baht)',
    'TRL' => 'TRL (török líra)',
    'TRY' => 'TRY (török líra)',
    'TWD' => 'TWD (tajvani dollár)',
    'UAH' => 'UAH (ukrán hrivnya)',
    'USD' => 'USD (amerikai dollár)',
    'VND' => 'VND (vietnámi dong)',
    'XEU' => 'XEU (Európai pénzegység)',
    'ZAR' => 'ZAR (dél-afrikai rand)',
);
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel="stylesheet" type="text/css" href="../public/style.css" />
    <style>
        body{
            background-image: url('../public/images/background.jpg');
            background-size: cover;
        }
    </style>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
     rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <?php require_once('../navbar.php') ?>
    <br>
    <h1 id="currencyText">Deviza Árfolyam Lekérdezés</h1>
    
    <div class="queryBox">
        <form method='post'>
            <div class="firstCurrency">
                <label id="currencyLabel1" for='currency'>Első Deviza:</label> <br>
                <select name='currency_name1' id='currencyInput1'>"      
                    <?php
                        foreach ($currencyNames as $value => $label) {
                        echo "<option value='$value'>$label</option>";
                        }
                        ?>
                </select>
            </div>
            <div class="secondCurrency">
                <label id="currencyLabel2" for='currency'>Második Deviza:</label>  <br>
                <select name='currency_name2' id='currencyInput2'>"      
                    <?php
                        foreach ($currencyNames as $value => $label) {
                        echo "<option value='$value'>$label</option>";
                        }
                        ?>
                </select>
            </div>        
            <div id="startDate">
                <label id="dateLabel1" for="start_date">Kezdődátum:</label> <br>
                <input id="dateInput1" type="date" name="start_date" required>
            </div>
            <div id="endDate">
                <label id="dateLabel2" for="end_date">Záródátum:</label> <br>
                <input id="dateInput2" type="date" name="end_date" required>
            </div>

            <div id="queryButton">
                <button type="submit">Lekérdezés</button>
            </div>
        </form>
    </div>

    <h2 id="queryResult">Eredmény:</h2>

<?php
// Lekérdezés ellenőrzése
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];
    $currencyName1 = $_POST['currency_name1'];
    $currencyName2 = $_POST['currency_name2'];
    $currencyNamesArray = array($currencyName1, $currencyName2);
    $currencyNamesString = implode(',', $currencyNamesArray);

    $result = getExchangeRates($startDate, $endDate, $currencyNamesString);
    
    echo "<div id='resultBox'>";
    echo "<p>Kezdő dátum: $startDate</p>";
    echo "<p>Záródátum: $endDate</p>";
    echo "<p>Deviza pár: $currencyNamesString</p>";
    if ($result) {       
        echo "<p>$result</p>";
    } else {
        echo "<p>Nincsenek elérhető árfolyamok.</p>";
    }
    echo "</div>";

}



echo "
<footer>
<div class='footer-content'>
  <p>&copy; 2023 Szélerőművek</p>
  <ul class='footer-links'>
    <li><a href='homeView.html'>Kezdőlap</a></li>
    <li><a href='newsView.html'>Hírek</a></li>
  </ul>
</div>
</footer>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js' 
integrity='sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL' crossorigin='anonymous'></script>
</body>
</html>";
?>
