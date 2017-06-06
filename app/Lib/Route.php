<?php

function redirect_to(string $url)
{
    if ($url === "/")
        echo "<META http-equiv=\"refresh\" content=\"0; URL=http://localhost:8888/ETNA_my_phpmyadmin\">";
    else
        echo "<META http-equiv=\"refresh\" content=\"0; URL=http://localhost:8888/ETNA_my_phpmyadmin$url\">";
}
