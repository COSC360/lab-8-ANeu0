<!DOCTYPE html>
<html>
<body>
<?php

    if($_SERVER["REQUEST_METHOD"]=="GET"){
        if(isset($_GET['Lab8FormName']) && isset($_GET['Lab8FormKey'])){
            $Lab8FormName = $_GET['Lab8FormName'];
            $Lab8FormKey = $_GET['Lab8FormKey'];
        }
    }
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST['Lab8FormName']) && isset($_POST['Lab8FormKey'])){
            $Lab8FormName = $_POST['Lab8FormName'];
            $Lab8FormKey = $_POST['Lab8FormKey'];
        }
    }
    $file = "data.txt";
    $LineArray = array();
    if($dataFile = fopen($file,"r")){
        while(feof($dataFile) == false){
            $dataLine = fgets($dataFile);
            $LineArray[] = explode(",",$dataLine);
        }
    }
    fclose($dataFile);
    foreach($LineArray as $line){
        if ($line == null){
            continue;
        }
        $loginSuccess = ((strcasecmp($line[1],$Lab8FormName)==0) && ($Lab8FormKey == $line[0]));
        if($loginSuccess){
            $varName = $line[1];
            $varPath = $line[3];
            $varCaption = $line[2];
            break;
        }
    }
    if($loginSuccess){ 
?>
    <h1><?php echo $varName ?>'s Coffee Choice<h1>
    <figure>
    <img src=<?php echo $varPath?>>
    <figcaption><small><?php echo $varCaption ?><small></figcaption> 
    </figure>
<?php } 
    else{
    echo "<h1>LOGIN FAILED<h1>";}
?>
</body>
</html>