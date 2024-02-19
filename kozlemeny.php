<?php
                 
$host = "localhost";
$user = "root";
$password ="";
$database = "kozlemenyek";
$cim = "";
$tema = "";
$szerzo = "";
$megirva = "";
$folyoirat = "";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// connect to mysql database
try{
    $connect = mysqli_connect($host, $user, $password, $database);
} catch (mysqli_sql_exception $ex) {
    echo 'Error';
}

// get values from the form
function getPosts()
{
    $posts = array();
    $posts[0] = $_POST['cim'];
    $posts[1] = $_POST['tema'];
    $posts[2] = $_POST['szerzo'];
    $posts[3] = $_POST['megirva'];
    $posts[4] = $_POST['folyoirat'];
    return $posts;
}



// Insert
if(isset($_POST['insert']))
{
    $data = getPosts();
    $insert_Query = "INSERT INTO `kozlemeny`(`cim`, `tema`, `szerzo`, `megirva`, `folyoirat`) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]')";
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
        echo 'Hiba a hozzáadás során '.$ex->getMessage();
    }
}

// Delete
if(isset($_POST['delete']))
{
    $data = getPosts();
    $delete_Query = "DELETE FROM `kozlemeny` WHERE `cim` = '$data[0]'";
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

// Edit
if(isset($_POST['update']))
{
    $data = getPosts();
    $update_Query = "UPDATE `kozlemeny` SET `tema`='$data[1]',`szerzo`='$data[2]',`megirva`='$data[3]',`folyoirat`='$data[4]' WHERE `cim` = '$data[0]'";
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
            <input type="text" name="cim" placeholder="Cím - kulcs" value="<?php echo $cim;?>"><br><br>
            <input type="text" name="tema" placeholder="Téma" value="<?php echo $tema;?>"><br><br>
            <input type="text" name="szerzo" placeholder="Szerző" value="<?php echo $szerzo;?>"><br><br>
            <input type="date" name="megirva" placeholder="Megírva" value="<?php echo $megirva;?>"><br><br>
            <input type="text" name="folyoirat" placeholder="Folyóirat" value="<?php echo $folyoirat;?>"><br><br>
            <div>
                <!-- Input For Add Values To Database-->
                <input type="submit" name="insert" value="ADD">
                
                <!-- Input For Edit Values -->
                <input type="submit" name="update" value="UPDATE">
                
                <!-- Input For Clear Values -->
                <input type="submit" name="delete" value="DELETE">
                
            </div>
        </form>
    </body>
</html>
<?php
echo "Az tábla listázása:";
$sql = "SELECT cim, tema, szerzo, megirva, folyoirat FROM kozlemeny";
        $res = mysqli_query($connect, $sql) or die ('Hibás utasítás!'); 
        // html táblázatként íratjuk ki;
        echo '<table border=1>';
        echo '<tr>';            // táblázat fejléce
        echo '<th>Cím</th>';        
        echo '<th>Téma</th>';
        echo '<th>Szerző</th>';
        echo '<th>Megírva</th>';
        echo '<th>Folyóirat</th>';
        echo '</tr>';
        
        // a táblázat sorai
        while ( ($current_row = mysqli_fetch_assoc($res))!= null) { 
            echo '<tr>';
            echo '<td>' . $current_row["cim"] . '</td>';
            echo '<td>' . $current_row["tema"] . '</td>';
            echo '<td>' . $current_row["szerzo"] . '</td>';
            echo '<td>' . $current_row["megirva"] . '</td>';
            echo '<td>' . $current_row["folyoirat"] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
           
        mysqli_free_result($res);
    mysqli_close($connect); 
 

    
   
    ?>
