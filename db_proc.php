<?php

require ('conf.php');
go_home();

// Ühenduse tegemine protseduuriga

$conn = mysqli_connect($server,$user,$pass);

if (!$conn) {
	die("<p>Ühendusega on halvasti ".mysqli_connect_error."</p>");
}
echo "<p>Ühendus protseduuriga on olemas!";



function write_record($conn){
    
    $sql_write = "INSERT INTO ms17.nimekiri (Eesnimi, Perekonnanimi, id_code) VALUES ('Endel','Eesvärav','3712050231')";
    
if (mysqli_query($conn,$sql_write)){
    echo "<p>Kirje lisamine õnnestus</p>";
} else {
    echo "<p>Viga:" .mysqli_error($conn) ."</p>";
        

}

mysqli_close($conn);
}

function show_all($conn){
    $sql_select_all ="SELECT * FROM ms17.nimekiri";
    $result = mysqli_query($conn, $sql_select_all);
    
    if (mysqli_num_rows($result) > 0 ){
    while($row = mysqli_fetch_assoc($result)){
        echo "<p> id: ".$row["Nr"]." Eesnimi: ".$row["Eesnimi"]." Perekonnanimi: ".$row["Perekonnanimi"]." Isikukood: ".$row["id_code"]." Sisetuseaeg: ".$row["time"]."</p>";
    } 
        
    mysqli_close($conn);
    } else { echo "Tabel tühi"; }
}

function write_button($conn){
    echo"<input type='submit' name='insert_record' value='Sisesta kirje'>";
        if(isset($_POST['insert_record'])) {
            write_record($conn);
        }
}

function show_button($conn){
    echo"<input type='submit' name='show_all' value='Näita kõike kirjeid'>";
        if(isset($_POST['show_all'])) {
            show_all($conn);
        }
}
  
?>

<meta charset="utf-8">


<form action="" method="post">
    <p> <?php write_button($conn); ?> </p>
</form>

<form action="" method="post">
    <p> <?php show_button($conn); ?> </p>
</form>