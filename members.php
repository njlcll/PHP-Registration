<?php
//include config
require_once('includes/config.php');
if (!$user->is_logged_in()) {
    header('Location: login.php');
    exit();
}
// print_r($_SESSION);
// print_r($_COOKIE);

$title = 'PHP Registration and Login Demo :-Home';

//include header template
require_once('header.php');

?>
<main>
    <div id="main ">
        <div class="container mainTest">
            

            <div class="row mt-2">
                <div class="col-md-8 col-sm-12">
                    <div class="content-left">
                        <div class="card p-3" style="width: 100%">
                            <?php
                                $row = $user->get_user_details_from_id($_SESSION['id']);
                         
                                ?>
                                <h4>Member Details</h4>
                                <div class="name"><?php echo "$row[name] $row[surname]" ?></div>
                                <div class="email"><?php echo "$row[email]" ?></div>
                                <div class="password"><a href="changePassword.php">Change Password </a></div>
                                <a class="" href="logout.php">logout</a>
                          
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="content-right">
                        <div class="card mt-2" style="width: 100%">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                                <div class="d-grid gap-2">
                                    <a href="#" class="btn btn-primary btn-block">Go somewhere</a>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-2" style="width: 100%">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <div class="d-grid gap-2">
                                    <a href="#" class="btn btn-primary btn-block">Go somewhere</a>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-2" style="width: 100%">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <p>More Content</p>
                                <p>More Content</p>
                                <p>More Content</p>
                                <div class="d-grid gap-2">
                                    <a href="#" class="btn btn-primary btn-block">Go somewhere</a>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-2" style="width: 100%">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <p>More Content</p>
                                <p>More Content</p>
                                <p>More Content</p>
                                <p>More Content</p>
                                <p>More Content</p>
                                <p>More Content</p>
                                <div class="d-grid gap-2">
                                    <a href="#" class="btn btn-primary btn-block">Go somewhere</a>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-2" style="width: 100%">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <p>More Content</p>
                                <p>More Content</p>
                                <p>More Content</p>
                                <p>More Content</p>
                                <p>More Content</p>
                                <p>More Content</p>
                                <div class="d-grid gap-2">
                                    <a href="#" class="btn btn-primary btn-block">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
?>

<?php
//include header template
require('footer.php');
