<?php
            // connection à la base de données

define("MYHOST","localhost");
define("MYUSER","root");
define("DBNAME","laboratoire");
define("MYPASS","root");

$base = mysqli_connect(MYHOST, MYUSER, MYPASS, DBNAME);

if(mysqli_connect_errno())
{
echo '<p>La connexion à la base de donnée a échoué: '.mysqli_connect_error().'</p>';
}

?>
