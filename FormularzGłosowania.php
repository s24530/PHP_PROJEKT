<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Głosowanie</title>
</head>
<body>
<article>
    <h3>Głosowanie na najlepszy przedmiot <br/></h3>
<form method="post" name="glos" action="processing.php">


    <label>
        <input type="radio" name="glos" value="0">WPRG - Warsztaty programistyczne<br/>
    </label>
    <label>
        <input type="radio" name="glos" value="1">POJ - Programowanie obiektowe w Javie<br/>
    </label>
    <label>
        <input type="radio" name="glos" value="2">ANG - Angielski<br/>
    </label>
    <label>
        <input type="radio" name="glos" value="3">AM - Analiza Matematyczna<br/>
    </label>
    <label>
        <input type="radio" name="glos" value="4">RBD - Relacyjne bazy danych<br/><br/>
    </label>
    <input type="submit" value="Prześlij">


</form>
</article>

</body>
</html>