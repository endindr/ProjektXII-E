<?php
// Exchange rate
$kursi = 97; // 1 € = 97 Lek

// Initialize variables to hold the result or error message
$rezultat_shfaqur = "";

// =============================================================
// SHTESA E RE: Funksioni për Euro në Dollar (Detyra 2)
// =============================================================

// Funksioni i ri
function euroToDollar($euros) {
    // Kurse konvertimi shembull (1 Euro = 1.07 Dollar)
    $rate_euro_usd = 1.07;
    $dollars = $euros * $rate_euro_usd;
    return round($dollars, 2);
}

// Check if the form has been submitted (i.e., data has been sent via POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Check if both 'shifra' and 'zgjedhja' are set
    if (isset($_POST['shifra']) && isset($_POST['zgjedhja'])) {
        
        // Get data from the form
        $shifra = $_POST['shifra']; 
        $zgjedhja = $_POST['zgjedhja'];
        $vlera = floatval($shifra);

        // Run the conversion logic
        if ($zgjedhja == "1") {
            // Lek -> Euro
            $rezultat_euro = $vlera / $kursi;
            $euro_r = round($rezultat_euro, 2);
            $rezultat_shfaqur = "$vlera Lek = " . $euro_r . " Euro";
            
            // Shtesa: Konverto Eurot e llogaritura në Dollar
            $dollar_value = euroToDollar($rezultat_euro);
            $rezultat_shfaqur .= " | (Dhe është rreth " . $dollar_value . " Dollar Amerikan)";
            
        } elseif ($zgjedhja == "2") {
            // Euro -> Lek
            $rezultat_lek = $vlera * $kursi;
            $rezultat_shfaqur = "$vlera Euro = $rezultat_lek Lek";
            
            // Shtesa: Konverto Eurot e futur në Dollar
            $dollar_value = euroToDollar($vlera);
            $rezultat_shfaqur .= " | (Që është rreth " . $dollar_value . " Dollar Amerikan)";
            
        } else {
            $rezultat_shfaqur = "Zgjedhje e pavlefshme!";
        }
    }
}

// Testi i shpejtë për terminalin (ky nuk shfaqet në browser, por në terminal kur ekzekutohet nga aty)
if (php_sapi_name() == 'cli') {
    $shumaEuro = 50; 
    $shumaDollar = euroToDollar($shumaEuro);
    echo "\n--- Shtuar funksioni i konvertimit Euro ne Dollar (Detyra 2) ---\n";
    echo "$shumaEuro Euro jane: $shumaDollar Dollar Amerikan (USD).\n";
    echo "------------------------------------------------------\n";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lek-Euro Converter (Web)</title>
</head>
<body>

    <h1>Currency Converter</h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        
        <label for="shifra">Enter amount to convert:</label>
        <input type="number" id="shifra" name="shifra" required><br><br>

        <input type="radio" id="lek_to_euro" name="zgjedhja" value="1" required>
        <label for="lek_to_euro">Lek -> Euro</label><br>

        <input type="radio" id="euro_to_lek" name="zgjedhja" value="2">
        <label for="euro_to_lek">Euro -> Lek</label><br><br>

        <input type="submit" value="Convert">
    </form>
    
    <hr>
    
    <?php if (!empty($rezultat_shfaqur)): ?>
        <h2>Rezultati:</h2>
        <p><strong><?php echo $rezultat_shfaqur; ?></strong></p>
    <?php endif; ?>

</body>
</html>
