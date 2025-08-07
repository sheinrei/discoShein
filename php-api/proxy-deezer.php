<?php
$artist = $_GET['artist'];
$api_url = "https://api.deezer.com/artist/" . urlencode($artist);
echo file_get_contents($api_url);