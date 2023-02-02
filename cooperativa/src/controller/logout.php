<?php
require_once '../../classes/UserSession.php';
$UserSession = new UserSession();
$UserSession->closeSession();
header('location:/');