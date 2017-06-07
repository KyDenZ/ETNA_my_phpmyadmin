<?php

function redirect_to(string $url)
{
    if ($url === "/")
        echo "<META http-equiv=\"refresh\" content=\"0; URL=".BASE_URL."\">";
    else
        echo "<META http-equiv=\"refresh\" content=\"0; URL=".BASE_URL."$url\">";
}
