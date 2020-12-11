<?php 
include_once('database/connection.php');
include_once('database/pet.php');

// Get current pet's id and info from db
$id = $_GET['id'];
$pet = getPet($id);
if ($pet == null) header('Location: index.php');

?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Petgram</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/home.css" rel="stylesheet">
    <link rel="icon" href="images/icon.jpg">
  </head>
  <body>
    <?php include_once('hotbar.php') ?>
    <?php include_once('sidebar.php') ?>
    <section id="proposal">
      <div id="div1">
          <h2>Make a proposal to adopt this pet!<h2>
          <textarea form=makeProposal name="text" rows=10 type="text" placeholder="Write something here" id="textid" required></textarea>
           <form id="makeProposal" action="proposal_action.php" method="post">
                <input type="hidden" name="userId" value="<?php echo $_SESSION['id'] ?>">
                <input type="hidden" name="petId" value="<?php echo $pet['id'] ?>">
                <input type="hidden" name="accountId" value="<?php echo $pet['ownerID'] ?>">  
                <input type="hidden" name="date" value=<?php echo date('d/m/Y');?>>
                <input type="hidden" name="status" value='PENDING'>
                <button type="submit">Submit</button>
            </form>
      </div>
    </section>
    <footer>
      <p>&copy; Petgram 2020</p>
    </footer>
  </body>
</html>
