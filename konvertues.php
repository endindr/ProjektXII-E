<?php endif; ?> 
    
<?php 
// ... Këtu fillon kodi i ri shtesë (Funksioni euroToDollar)
// ... Dhe këtu mbyllet skedari.

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

?>

</body>
</html>
