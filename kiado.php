<?php
                 
$host = "localhost";
$user = "root";
$password ="";
$database = "kozlemenyek";
$nev = "";
$kozpont = "";
$tipus = "";
$alapitas ="";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


try{
    $connect = mysqli_connect($host, $user, $password, $database);
} catch (mysqli_sql_exception $ex) {
    echo 'Error';
}


function getPosts()
{
    $posts = array();
    $posts[0] = $_POST['nev'];
    $posts[1] = $_POST['kozpont'];
    $posts[2] = $_POST['alapitas'];
    return $posts;
}




if(isset($_POST['insert']))
{
    $data = getPosts();
    $insert_Query = "INSERT INTO `kiado`(`nev`, `kozpont`, `alapitas`) VALUES ('$data[0]','$data[1]','$data[2]')";
    try{
        $insert_Result = mysqli_query($connect, $insert_Query);
        
        if($insert_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Hozzáadva';
            }else{
                echo 'Az adatok nem kerültek hozzáadásra';
            }
        }
    } catch (Exception $ex) {
        echo 'Hiba a hozzáadás során'.$ex->getMessage();
    }
}


if(isset($_POST['delete']))
{
    $data = getPosts();
    $delete_Query = "DELETE FROM `kiado` WHERE `nev` = '$data[0]'";
    try{
        $delete_Result = mysqli_query($connect, $delete_Query);
        
        if($delete_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Törölve';
            }else{
                echo 'Az adatok nem kerültek törlésre';
            }
        }
    } catch (Exception $ex) {
        echo 'Hiba a törlés során '.$ex->getMessage();
    }
}


if(isset($_POST['update']))
{
    $data = getPosts();
    $update_Query = "UPDATE `kiado` SET `kozpont`='$data[1]',`alapitas`='$data[2]' WHERE `nev` = '$data[0]'";
    try{
        $update_Result = mysqli_query($connect, $update_Query);
        
        if($update_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Frissítve';
            }else{
                echo 'Az adatok nem kerültek frissítésre';
            }
        }
    } catch (Exception $ex) {
        echo 'Hiba a frissítés során '.$ex->getMessage();
    }
}

    ?>


<!DOCTYPE Html>
<html>
    <head>
        <title>PHP INSERT UPDATE DELETE</title>
    </head>
    <body>
        <form action="tablak.php" method="post">
            <input type="submit" name="button1" class="button" value="Áttérés egy másik táblára" /> </form>
        <form action="" method="post">
            <h5>A tábla adatainak módosítása:</h5>
            <input type="text" name="nev" placeholder="Név - kulcs" value="<?php echo $nev;?>"><br><br>
            <input type="text" name="kozpont" placeholder="Központ" value="<?php echo $kozpont;?>"><br><br>
            <input type="date" name="alapitas" placeholder="Alapítás dátuma" value="<?php echo $alapitas;?>"><br><br>
            <div>
                
                <input type="submit" name="insert" value="INSERT">
                
                
                <input type="submit" name="update" value="UPDATE">
                
                
                <input type="submit" name="delete" value="DELETE">
                
            </div>
        </form>
    </body>
</html>
<?php
echo "Az tábla listázása:";
$sql = "SELECT nev, kozpont, alapitas FROM kiado"; 
        $res = mysqli_query($connect, $sql) or die ('Hibás utasítás!'); 
          
        // html táblázatként íratjuk ki;
        echo '<table border=1>';
        echo '<tr>';            // táblázat fejléce
        echo '<th>Név</th>';        
        echo '<th>Központ</th>';
        echo '<th>Alapítás dátuma</th>';
        echo '</tr>';
        
        
        while ( ($current_row = mysqli_fetch_assoc($res))!= null) {    
            echo '<tr>';
            echo '<td>' . $current_row["nev"] . '</td>';
            echo '<td>' . $current_row["kozpont"] . '</td>';
            echo '<td>' . $current_row["alapitas"] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
           
   mysqli_free_result($res);    
    mysqli_close($connect); 
      
    
   
    ?>
