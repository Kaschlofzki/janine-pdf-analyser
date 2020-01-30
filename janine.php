
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet"> 
    <title>Janine</title>
</head>

<body>
    <div class="main">
        <div>
            <form enctype="multipart/form-data" action="submit.php" id="text" method="POST">
            	<div><p>Diese Datei hochladen:</p><input class="bonusinput" name="userfile" type="file" accept="application/pdf" size="50" /></div><br>
                <div><p>Bonus den du mitnehmen kannst:</p><input class="bonusinput" type="text" name="bonus" value="12000"></div><br>
                <div><p>Punkte die du erreichen musst:</p><input class="bonusinput" type="text" name="ziel" value="24000"></div><br>
                <div><p>Prozent die du mitnehmen kannst:</p><input class="bonusinput" type="text" name="prozent" value="50">%</div><br>

                <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
                <!-- Der Name des Input Felds bestimmt den Namen im $_FILES Array -->
                <input class="firstinput" type="submit" value="submit"><br>
            </form>
         
        </div>
        <div class="spruch">
            Glück lässt sich nicht erzwingen. Aber es mag hartnäckige Menschen.
        </div>
    </div>
    

    <script src="https://cdnjs.com/libraries/pdf.js"></script>

</body>



</html>