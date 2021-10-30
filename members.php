<?php
//include config
require_once('config.php');
if (!$user->is_logged_in()) {
    header('Location: login.php');
    exit();
}
// print_r($_SESSION);
// print_r($_COOKIE);

$title = 'PHP Registration and Login Demo :-Home';

//include header template

$row = $user->get_user_details_from_id($_SESSION['id']);

require_once('header.php');

?>

<main>
    <div id="main">
        <div class="container-fluid w-100 m-0 p-0  bg-white">

            <div class="row">
                <div class="col-sm-12 col-md-2 ">
                    <div class="left-nav-container">

                    <ul class="nav list-group list-group-horizontal-sm list-group-vertical-md">
                        <li class="nav-item admin-nav-left">
                            <a class="nav-link nav-rotary" aria-current="page" href="changePassword">Change Password</a>
                        </li>

                        <li class="nav-item admin-nav-left">
                            <a class="nav-link nav-rotary" href="template.php" tabindex="-1" >Example </a>
                        </li>
                     
                    </ul>
                    <?php
                        include_once(dirname(__FILE__)."/memberNav.php");
                    ?>

                    </div>

                    <!-- </div> -->
                </div>
                <div class="col-md-10 col-sm-12 p-3  ">
                    <!-- <div class="admin-right p-3 "> -->
                    <div class="row">
                        <div class="col-12 text-center ">

                        <div class="p-3 mb-2 " data-initials="<?php echo $row['name'][0].$row['surname'][0] ?>"></div>

                            <div class="h2 text-start">Welcome <?php echo "$row[name] $row[surname]" ?></div>

                        </div>
                        <div class="col-12 ">
                            <!-- <div class="email"><?php echo "$row[email]" ?></div> -->
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Harum vel ex ut sed omnis expedita quasi officia quos voluptatem optio dolorem quae accusantium molestias fugit necessitatibus pariatur iure voluptatibus, debitis illo hic quisquam obcaecati. Impedit, iure illo maiores provident consequuntur ipsam libero explicabo assumenda dolores dicta dignissimos doloribus.</p>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Harum vel ex ut sed omnis expedita quasi officia quos voluptatem optio dolorem quae accusantium molestias fugit necessitatibus pariatur iure voluptatibus, debitis illo hic quisquam obcaecati. Impedit, iure illo maiores provident consequuntur ipsam libero explicabo assumenda dolores dicta dignissimos doloribus.</p>
                        </div>
                    </div>


                    <!-- </div> -->
                </div>
            </div>
        </div>

</main>


<?php
//include header template
require('footer.php');
