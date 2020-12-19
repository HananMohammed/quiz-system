<?php
foreach ($data["users"] as $user )
{
    echo "Information : ". $user->user_name;
    echo "<br>";
    echo "Email : ". $user->user_email;
    echo "<br>";

}