<?php

if (isset($_SESSION['priv'])) {
?>

    <!--nav section  -->
    <?php
    if ($user->hasAccess(2)) {
    ?>
        <ul class="nav list-group list-group-horizontal-sm list-group-vertical-md">
            <li class="nav-item admin-nav-left">
                <a class="nav-link nav-rotary" aria-current="page" href="#">Level 2</a>
            </li>

           

        </ul>
    <?php
    }
    ?>
    <!--nav section  -->


    <!--nav section  -->
    <?php
    if ($user->hasAccess(4)) {
    ?>
        <ul class="nav list-group list-group-horizontal-sm list-group-vertical-md">
            <li class="nav-item admin-nav-left">
                <a class="nav-link nav-rotary" aria-current="page" href="#">Level 4</a>
            </li>

            

        </ul>
    <?php
    }
    ?>
    <!--nav section  -->


<?php


}
?>