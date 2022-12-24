<?php

if(isset($_REQUEST['username']) && isset($_REQUEST['password'])){

    if($_REQUEST['username'] == "guigui0812" && $_REQUEST['password'] == "starwars"){
        echo "OK";
    }
}

?>