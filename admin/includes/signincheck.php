<?php

if(!$session->is_signed_in()){
    redirect("login.php");
}

if(!$session->is_admin($user)){
    redirect("index.php");
}
