<?php require('config.php');

if (!$user->is_logged_in()) {
    header('Location: index.php');
    exit();
}
if (isset($_POST['submit'])) {
    require_once("includes/inc-changePassword.php");
}

//define page title
$title = 'Template';

//include header template
require_once('header.php');


?>
<div class="container-fluid">
    <div class="row bg-white">
        <div class="col-12 p-3">
            <div class="">


                <h1>Visits</h1>
                <h4>last 20 pages visited by users</h4>
                <?php
                $stmt = $db->prepare('
                SELECT 
                *
                FROM visits  
                ORDER BY added
                DESC
                LIMIT 25
                ');
                $stmt->execute();

                while ($row = $stmt->fetch()) {

                   echo "<p>$row[v_tracker] : $row[page] $row[added]</p>";
                }
                ?>

                
            </div>
        </div>
    </div>
</div>



<?php
//include header template
require('footer.php');
?>