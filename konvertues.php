<?php
// Exchange rate
$kursi = 97; // 1 € = 97 Lek

// Initialize variables to hold the result or error message
$rezultat_shfaqur = "";

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
            $rezultat = $vlera / $kursi;
            $rezultat_shfaqur = "$vlera Lek = " . round($rezultat, 2) . " Euro";
        } elseif ($zgjedhja == "2") {
            $rezultat = $vlera * $kursi;
            $rezultat_shfaqur = "$vlera Euro = $rezultat Lek";
        } else {
            $rezultat_shfaqur = "Zgjedhje e pavlefshme!";
        }
    }
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
   <?php endif;<?php
// ... kodi ekzistues Lek/Euro këtu ...

// =============================================================
// SHTESA E RE PER DETYREN (Branch: test): Euro ne Dollar
// Vendose kodin e mëposhtëm brenda këtij blloku PHP
// =============================================================

// Funksioni i ri
function euroToDollar($euros) {
    // Kurse konvertimi shembull (1 Euro = 1.07 Dollar)
    $rate = 1.07; 
    $dollars = $euros * $rate;
    return $dollars;
}

// Test i shpejtë për të treguar që punon
$shumaEuro = 50; 
$shumaDollar = euroToDollar($shumaEuro);

// Mesazh i dukshëm në rast se e teston me terminal
echo "\n--- Shtuar funksioni i konvertimit Euro ne Dollar (Detyra 2) ---\n";
echo "$shumaEuro Euro jane: $shumaDollar Dollar Amerikan (USD).\n";
echo "------------------------------------------------------\n";

// ... kodi tjetër poshtë, nëse ka ...

?>

</body>
</html>
