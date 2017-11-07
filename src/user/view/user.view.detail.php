<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 07.11.2017
 * Time: 10:24
 */
include ("../../model/User.php")
?>
<head>
    <link rel="stylesheet" href="/bootstrap/bootstrap-4.0.0-beta.2-dist/css/bootstrap.css">
</head>
<body>
<h1>Notentool</h1>
<h4>Benutzer Detail</h4>
<?php
//user Dummydaten ersetzen durch POST übergabe von user.view.php
$user = new User(2,"Reber","Reto","1234","tester@test.ch",false,4.3,5.3,1);
echo "<table class='table'>
<tr>
<td><th>ID</th></td><td>".$user->getId()."</td>
</tr>
<tr>
<td><th>Name</th></td><td>".$user->getName()."</td>
</tr>
<tr>
<td><th>Vorname</th></td><td>".$user->getUsername()."</td>
</tr>
<tr>
<td><th>Passwort</th></td><td>".$user->getPassword()."</td>
</tr>
<tr>
<td><th>E-Mail</th></td><td>".$user->getEmail()."</td>
</tr>
<tr>
<td><th>Ist Coach</th></td><td>".$user->getCoach()."</td>
</tr>
<tr>
<td><th>Schlechte Noten ab</th></td><td>".$user->getLowGradeLimit()."</td>
</tr>
<tr>
<td><th>Gute Noten ab</th></td><td>".$user->getHighGradeLimit()."</td>
</tr>
<tr>
<td><th>ID Coach</th></td><td>".$user->getCoachId()."</td>
</tr>
</table>";
?>
</body>
<script src="/bootstrap/bootstrap-4.0.0-beta.2-dist/js/bootstrap.js"></script>
