<?php

require "bootstrap.php";

$conn = new Auth\Infraestructure\DbContext(CONN, MAPPER, DEVMOD);
$context = $conn->getContext();
return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($context);
