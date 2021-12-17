<?php

$hola = password_hash("hola",PASSWORD_DEFAULT);

if(password_verify("holia",$hola)){
    echo "esta bn";
}else{
    echo "esta mal";
}
