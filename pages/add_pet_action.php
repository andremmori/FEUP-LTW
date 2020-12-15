<?php
    include_once('database/connection.php');
    include_once('database/add_pet.php');

    $individual_group = $_POST['individual_group'];
    $file = [];
    if($individual_group == 'individual')
    {
        $file = $_FILES['image']['tmp_name'];
        $nameElement = $_POST['nameElement'];
        $speciesElement = $_POST['speciesElement'];
        $breedElement = $_POST['breedElement'];
        $sizeElement = $_POST['sizeElement'];
        $colourElement = $_POST['colourElement'];
        $fields = [$file, $nameElement, $speciesElement, $breedElement, $sizeElement, $colourElement];
    }
    else if($individual_group == 'group')
    {
        $file = $_FILES['image']['tmp_name'];
        $nameElement = $_POST['nameElement'];
        $ammountElement = $_POST['ammountElement'];
        $breedGroupElement = $_POST['breedGroupElement'];
        $quantityGroupElement = $_POST['quantityGroupElement'];
        $fields = [$file, $nameElement, $ammountElement, $breedGroupElement, $quantityGroupElement];
    }
    else echo "ERROR";
    
    addPet($individual_group, $fields);

?>