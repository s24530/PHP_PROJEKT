

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wyniki</title>
</head>
<body>
<article>

<?php



function addIP($ip){
        $ips = fopen("ipadresses.txt", "a");
        fwrite($ips, "\n");
        fwrite($ips, $ip);
        fclose($ips);
}
function displayVotes(){
    echo '<h1>'."Dotychczasowe wyniki".'</h1>'.'<br/>';
    $votes= fopen("głosy.txt","r");

    $sum=0;
    while(!feof($votes)) {
        $sum += intval(fgets($votes));
    }
    rewind($votes);
    echo "Liczba głowsów:".'<br/>'.'<br/>';
    $przedmioty=['WPRG','POJ','ANG','AM','RBD'];
    $i=0;
    while(!feof($votes)) {
        $num=fgets($votes);
        echo $przedmioty[$i].' -> '.$num."-------------------->".round((intval($num)/$sum)*100,2)."%".'<br/>';
        $i++;
    }
    echo '<br/>';
    echo '<a href="FormularzGłosowania.php">Powrót</a>';
    fclose($votes);
}

function addVotes(){
    $votes= fopen("głosy.txt","r+");
    $i=0;
    $liczba_glosow=[];
    while(!feof($votes)) {
        $liczba_glosow[$i]=fgets($votes);
        $i++;
    }
    fclose($votes);

    $liczba_glosow[$_POST['glos']]+=1;
    $liczba_glosow[$_POST['glos']]=$liczba_glosow[$_POST['glos']]."\n";


    $votes= fopen("głosy.txt","w+");

    for($j=0;$j<5;$j++){
        fwrite($votes,$liczba_glosow[$j]);
    }

    fclose($votes);
}

$ip = $_SERVER['REMOTE_ADDR'];
if(!isset($_POST['glos'])){
    echo"Nie oddano głosu ".'<br/>';
    echo '<a href="FormularzGłosowania.php">Powrót</a>';

}else{


        $ips=fopen("ipadresses.txt","r");
        $alreadyVoted=false;
        while(!feof($ips)){
            if($ip==fgets($ips)){
                echo '<h1>Głosowano już z tego adresu IP !!!<h1/>';
                displayVotes();
                fclose($ips);
                $alreadyVoted=true;
                break;
            }
        }
        if(!$alreadyVoted){
            addIP($ip);
            addVotes();
            displayVotes();
        }


}

?>



</article>

</body>
</html>