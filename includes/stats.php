<?php

function getBrowserType()
{
    $agent = $_SERVER['HTTP_USER_AGENT'];
    $browser = "";
    if (preg_match('/MSIE (\d+\.\d+);/', $agent)) {
        $browser =  "Internet Explorer";
    } else if (preg_match('/Chrome[\/\s](\d+\.\d+)/', $agent)) {
        $browser =  "Chrome";
    } else if (preg_match('/Edge\/\d+/', $agent)) {
        $browser = "Edge";
    } else if (preg_match('/Firefox[\/\s](\d+\.\d+)/', $agent)) {
        $browser =  "Firefox";
    } else if (preg_match('/OPR[\/\s](\d+\.\d+)/', $agent)) {
        $browser =  "Opera";
    } else if (preg_match('/Safari[\/\s](\d+\.\d+)/', $agent)) {
        $browser =  "Safari";
    }
    return $browser;
}

function getIp()
{
    if (isset($_SERVER['REMOTE_ADDR'])) {
        return $_SERVER['REMOTE_ADDR'];
    } else {
        return "";
    }
}


//echo $_SERVER['REMOTE_ADDR'];
function isMobile()
{
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}


function createStats()
{
    global $db;

    if (isset($_SESSION['pageLeave'])) {
        $landing  = 0;       
    } else {
        $landing  = 1;      
    }

    if (isset($_SESSION['id'])) {
        $stats = $_SESSION['id'];
       
    } else {
        $stats = -1;        
    }


    $uniqid = uniqid();
    if (!isset($_COOKIE[COOKIE_STATS])) {
        //create a new visitor and set cookie
        $stmt = $db->prepare('INSERT INTO visitors 
			(user, tracker, agent, 	ip, browser, mobile) 
				VALUES
			 (:user, :tracker, :agent, :ip, :browser, :mobile )');
        $stmt->execute(array(
            ':user' => $stats,
            ':tracker' => $uniqid,
            ':agent' => $_SERVER['HTTP_USER_AGENT'],
            ':ip' => $_SERVER['REMOTE_ADDR'],
            ':browser' => getBrowserType(),
            ':mobile' => isMobile(),

        ));
        setcookie(
            COOKIE_STATS,
            $uniqid,
            time() + (60 * 60 * 24 * 365)
        );
    } else {        
        $uniqid = $_COOKIE[COOKIE_STATS];
        setcookie(
            COOKIE_STATS,
            $uniqid,
            time() + (60 * 60 * 24 * 365)
        );
    }

    //update the last record created leave time
    // $_SESSION['pageLeave'] is created when a visit is created below
    if (isset($_SESSION['pageLeave'])) {
        $pageLeave = $_SESSION['pageLeave'];
        $sql = "UPDATE visits 
        SET 
        pageLeave=?
        WHERE id=?";
        $stmt = $db->prepare($sql);
        $date = date('Y/m/d H:i:s');
        $stmt->execute(array($date, $_SESSION['pageLeave']));
    }

    //create new page visited record
    $stmt = $db->prepare('INSERT INTO visits 
    (v_user, v_tracker, page, added,landing) 
        VALUES
     (:user, :tracker, :page, :added, :landing)');
    $date = date('Y/m/d H:i:s');
    $stmt->execute(array(
        ':user' => $stats,
        ':tracker' => $uniqid,
        'page' => $_SERVER['REQUEST_URI'],
        'added' => $date,
        'landing' => $landing,

    ));

    $_SESSION['pageLeave'] = $db->lastInsertId();
}



createStats();
