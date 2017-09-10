<?php

include_once './ScheduleBusiness.php';
session_start();
$scheduleBusiness = new ScheduleBusiness();
$result = $scheduleBusiness->getScheduleByStudent($_SESSION["id"]);

echo json_encode($result);