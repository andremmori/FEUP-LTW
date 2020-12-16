<?php
include_once('database/user.php');
include_once('database/account.php');
$user_pets = getUserPets();
$shelters = shelterCollaborator();
$id = $_SESSION['user']['id'];
$account = getAccount($id);
echo $account['profilePic'];
?>
<aside id="sideBar">
    <div id="user">
        <img src="images/profileImages/squared/<?php echo $account['profilePic'] ?>.jpg" alt="" width="65" height="65">
        <div id="username">
            <p><?php echo $_SESSION['user']['name'] ?></p>
            <p>
                <?php
                $nShelter = count($shelters);
                if($nShelter > 0) {
                    echo 'Collaborator of ' . $shelters[0]['name'];
                    for($i = 1; $i < $nShelter; $i++)
                        echo ', ' . $shelters[$i]['name'];
                }
                ?>
            </p>
        </div>
    </div>
    <p>Pets:</p>
    <ul>
        <?php
        if (count($user_pets) == 0)
            echo '<li>No pets yet</li>';
        else
            foreach ($user_pets as $user_pet)
                echo '<a href="pet_profile.php?id=' . $user_pet['id'] . '">
                    <li>' . $user_pet['name'] . '</li>
                  </a>'
        ?>
    </ul>
    <a href="add_pet.php"><img src="images/petAdd.png" alt="" width="35" height="35"></a>
</aside>