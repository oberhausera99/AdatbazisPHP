<?php
                 
$host = "localhost";
$user = "root";
$password ="";
$database = "kozlemenyek";
$nev = "";
$szemelyi = "";
$varos = "";
$szuletes = "";

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
    $posts[1] = $_POST['szemelyi'];
    $posts[2] = $_POST['varos'];
    $posts[3] = $_POST['szuletes'];
    return $posts;
}



// Insert
if(isset($_POST['insert']))
{
    $data = getPosts();
    $insert_Query = "INSERT INTO `szerzo`(`nev`, `szemelyi`, `varos`, `szuletes`) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]')";
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
    $delete_Query = "DELETE FROM `szerzo` WHERE `szemelyi` = '$data[1]'";
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
    $update_Query = "UPDATE `szerzo` SET `nev`='$data[0]',`varos`='$data[2]',`szuletes`='$data[3]' WHERE `szemelyi` = '$data[1]'";
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
            <input type="text" name="nev" placeholder="Név" value="<?php echo $nev;?>"><br><br>
            <input type="number" name="szemelyi" placeholder="Személyiszám -kulcs" value="<?php echo $szemelyi;?>"><br><br>
            <input type="text" name="varos" placeholder="Város" value="<?php echo $varos;?>"><br><br>
            <input type="date" name="szuletes" placeholder="Születési dátum" value="<?php echo $szuletes;?>"><br><br>
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
$sql = "SELECT nev, szemelyi, varos, szuletes FROM szerzo"; 
        $res = mysqli_query($connect, $sql) or die ('Hibás utasítás!'); 
          
        
        echo '<table border=1>';
        echo '<tr>';            
        echo '<th>Név</th>';        
        echo '<th>Személyi igazolvány száma</th>';
        echo '<th>Város</th>';
        echo '<th>Születési dátum</th>';
        echo '</tr>';
        
        // a táblázat sorai
        while ( ($current_row = mysqli_fetch_assoc($res))!= null) {    
            echo '<tr>';
            echo '<td>' . $current_row["nev"] . '</td>';
            echo '<td>' . $current_row["szemelyi"] . '</td>';
            echo '<td>' . $current_row["varos"] . '</td>';
            echo '<td>' . $current_row["szuletes"] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
           
         
    mysqli_free_result($res);
 
    mysqli_close($connect);
 
?>
   
    ?>
