<?php
    include_once('database/connection.php');
    include_once('database/add_pet.php');

    $individual_group = $_POST['individual_group'];
    $userID = $_POST['userID'];

    print_r($individual_group);
    echo '<br>';
    print_r($userID);
    echo '<br>';


    $fields = [];
    if($individual_group == 'individual')
    {
        $file = $_FILES['image']['tmp_name'];
        $nameElement = $_POST['name'];
        $speciesElement = $_POST['species'];
        $breedElement = $_POST['breed'];
        $sizeElement = $_POST['size'];
        $colourElement = $_POST['colour'];
        $fields = [$file, $nameElement, $speciesElement, $breedElement, $sizeElement, $colourElement];
    }
    else if($individual_group == 'group')
    {
        $file = $_FILES['image']['tmp_name'];
        $nameElement = $_POST['name'];
        $ammountElement = $_POST['ammount'];
        $breedGroupElement = $_POST['breedGroup'];
        $quantityGroupElement = $_POST['quantityGroup'];
        $fields = [$file, $nameElement, $ammountElement, $breedGroupElement, $quantityGroupElement];
    }
    else echo "ERROR";

    print_r($fields);
    echo '<br>';
    
    if(addPet($userID, $individual_group, $fields) != -1)
        echo "AYYYYYYY";
    else
        echo ":(";

?>