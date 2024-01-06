<?php 
$length = 7;
$alpha= substr(str_shuffle("QWERTYUIOPLKJHGFDSAZXCVBNMabcdefghigklmnop"),1,$length);

$ln = 8;
    $beta = substr(str_shuffle("1234567890"),1,$length);

   echo $alpha; ?>-<?php echo $beta; 
   echo "<br><br>";
   $payid = bin2hex(random_bytes('8'));
   echo $payid;
   echo "<br><br>";
   $rand1 = gmp_random_bits(3); // random number from 0 to 7
    $rand2 = gmp_random_bits(5); // random number from 0 to 31

echo gmp_strval($rand1) . "\n";
echo gmp_strval($rand2) . "\n";
?>