<?php 
// error_reporting(0);
include 'import-pdf.php';

if($_FILES['userfile']['name'] !== '' AND $_FILES['userfile']['type'] === 'application/pdf') {
    $targetfolder = "testupload/";

    $targetfolder = $targetfolder . basename( $_FILES['userfile']['name']) ;

    move_uploaded_file($_FILES['userfile']['tmp_name'], $targetfolder);


    $test = "testupload/". $_FILES['userfile']['name'];
    $parser = new \Smalot\PdfParser\Parser();


    $pdf    = $parser -> parseFile($test); 
    $text = $pdf->getText();
    $counter = 0;


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $bonus = $_POST["bonus"];
        $ziel = $_POST["ziel"];
        $string = NULL;
        $string = $text;
        $array2 = explode(" ", $string);


        foreach ($array2 as $key) {
            if (empty($key)) {
                unset($array2[$counter]);
            }
            $counter++;
        }
        $array = array();
        foreach ($array2 as $key) {
            array_push($array, $key);
        }

        $totalpaid = array();
        $subtotal = array();
        $lastname = $array[1];
        $firstname = $array[2];

        $array[0];
        $count = 0;
        for ($i=0; $i < count($array) ; $i++) { 
            if ($array[$i] == "Total" && $array[$i+1] == "Paid") {;
                array_push($totalpaid, $array[$i+2] );

            }

            if ($array[$i] == "BOOS,"){
                        for ($i; $i < count($array) ; $i++) {
                            if ($array[$i] == "Personal") {          
                                array_push($subtotal, $array[$i+1] );
                                break;
                            }

                            if ($array[$i] == "SubTotal") {
                                array_push($subtotal, $array[$i+2] );             
                                break;
                            } 

                            if (strpos($array[$i], '----------------------------') !== false) {
                                break;
                            }
                            
                        }
                    }

            
            if ($array[$i] == "SUI" && $array[$i+1] == "Downline") {
                for ($i; $i < count($array) ; $i++) {
                    if ($array[$i] == "Total" && $array[$i+1] == "Paid") {
                        
                        if ($count==1){
                            break;
                        }

                        $sui_total = 0.9 * intval(str_replace(",", "", $array[$i+2]));
                        array_push($totalpaid, $sui_total );
                        break;
                    }

                    if ($array[$i] == "BOOS,"){
                        for ($i; $i < count($array) ; $i++) {

                            if ($array[$i] == "Personal") {
                                $sui_sub_total = 0.9 * intval(str_replace(",", "", $array[$i+1]));
                                array_push($subtotal, $sui_sub_total );
                                break;
                            }

                            if ($array[$i] == "SubTotal") {
                                $sui_sub_total = 0.9 * intval(str_replace(",", "", $array[$i+2]));
                                array_push($subtotal, $sui_sub_total );             
                                break;
                            }

                            if (strpos($array[$i], '----------------------------') !== false) {
                                break;
                            }
                            
                        }
                    }
                }

            }

            if ($array[$i] == "USA" && $array[$i+1] == "Downline") {
                for ($i; $i < count($array) ; $i++) {
                    if ($array[$i] == "*" && $array[$i+1] == "Total") {
                        if ($count==1){
                            break;
                        }
                        array_push($totalpaid, $array[$i + 2] );                   
                        break;
                    }
                    if ($array[$i] == "BOOS,"){
                        // var_export($array);
                        for ($i; $i < count($array) ; $i++) { 
                            // var_dump($array[$i]);
                            if ($array[$i] == "Personal") {

                                $sui_sub_total = $array[$i+1];
                                array_push($subtotal, $sui_sub_total );
                                break;
                            
                                
                            }

                            if ($array[$i] == "*" && $array[$i+1] == "Subtotal") {

                                array_push($subtotal, $array[$i+2] );   
                                break;
                            }

                            if (strpos($array[$i], '----------------------------') !== false) {
                                break;
                            }
                            
                        }
                    }
                }

            }

        }

    
        $total = 0;
        $sub = 0;
        foreach ($subtotal as $key) {
            $key2 = intval(str_replace(",", "", $key));
            $sub += intval($key2);
        }

        foreach ($totalpaid as $key) {
            $key2= str_replace(",", "", $key);
            $total += intval($key2);

        }
    
        $ergebnis = $total - $sub + 12000;


    }

} else {
    echo "Keine PDF-Datei ausgewählt";
}
?>


<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet"> 
<title>Janine</title>
</head>

<body>
    <div class="main">
        <div class="ausgabe">
            <div class="subtotal">Subtotal Paid: <?php echo $sub ?></div>
            <div class="total">Total Paid :  <?php echo $total ?></div>
            <div class="bonus">Punkte von Denise die du mitnehmen kannst: <?php echo $bonus ?></div>
            <div class="ergebnis">Du hast <?php echo $ergebnis ?> Punkte </div>
        </div>
        <div class="rest">Noch <?php echo ($ziel - $ergebnis)?> Punkte bis <?php echo $ziel ?></div>
    </div>



      <script src="gsap/greensock-js/src/minified/TweenLite.min.js"></script>
    <script src="gsap/greensock-js/src/minified/plugins/CSSPlugin.min.js"></script>
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>
    <script src="/pdf.js-master/src/pdf.js"></script>
    <!-- <script src="package/build/pdf.min.js"></script> -->
    <script src="myjs.js"></script>
</body>



</html>

<?php 
 unlink("testupload/". $_FILES['userfile']['name']);
 ?>
