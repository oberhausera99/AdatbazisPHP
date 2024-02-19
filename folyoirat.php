<?php
                 
$host = "localhost";
$user = "root";
$password ="";
$database = "kozlemenyek";
$nev = "";
$id = "";
$kiado = "";
$kiadas ="";

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
    $posts[0] = $_POST['nev'];
    $posts[1] = $_POST['id'];
    $posts[2] = $_POST['kiado'];
    $posts[3] = $_POST['kiadas'];
    return $posts;
}



// Insert
if(isset($_POST['insert']))
{
    $data = getPosts();
    $insert_Query = "INSERT INTO `folyoirat`(`nev`, `id`, `kiado`, `kiadas`) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]')";
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
    $delete_Query = "DELETE FROM `folyoirat` WHERE `id` = '$data[1]'";
    try{
        $delete_Result = mysqli_query($connect, $delete_Query);
        
        if($delete_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Törölve';
            }else{
                echo 'Hiba a törlés során';
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
    $update_Query = "UPDATE `folyoirat` SET `nev`='$data[0]',`kiado`='$data[2]',`kiadas`='$data[3]' WHERE `id` = '$data[1]'";
    try{
        $update_Result = mysqli_query($connect, $update_Query);
        
        if($update_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Adatok frissítve';
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
            <input type="text" name="nev" placeholder="Cím" value="<?php echo $nev;?>"><br><br>
            <input type="number" name="id" placeholder="Példány azonosító - kulcs" value="<?php echo $id;?>"><br><br>
            <input type="text" name="kiado" placeholder="Kiadó" value="<?php echo $kiado;?>"><br><br>
            <input type="date" name="kiadas" placeholder="Kiadás" value="<?php echo $kiadas;?>"><br><br>
            <div>
                <!-- Input For Add Values To Database-->
                <input type="submit" name="insert" value="INSERT">
                
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
$sql = "SELECT nev, id, kiado, kiadas FROM folyoirat"; 
        $res = mysqli_query($connect, $sql) or die ('Hibás utasítás!'); 
          
        echo '<table border=1>';
        echo '<tr>';            
        echo '<th>Cím</th>';        
        echo '<th>Példány azonosítója</th>';
        echo '<th>Kiadó</th>';
        echo '<th>Kiadás</th>';
        echo '</tr>';
        
        // a táblázat sorai
        while ( ($current_row = mysqli_fetch_assoc($res))!= null) {   
            echo '<tr>';
            echo '<td>' . $current_row["nev"] . '</td>';
            echo '<td>' . $current_row["id"] . '</td>';
            echo '<td>' . $current_row["kiado"] . '</td>';
            echo '<td>' . $current_row["kiadas"] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
           
         mysqli_free_result($res);  
 
    mysqli_close($connect); 
 
    ?>

