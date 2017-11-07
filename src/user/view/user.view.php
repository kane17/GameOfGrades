<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 31.10.2017
 * Time: 10:48
 */
include ("../../model/User.php")
?>
<head>
    <link rel="stylesheet" href="/bootstrap/bootstrap-4.0.0-beta.2-dist/css/bootstrap.css">
</head>
<body>
<h1>Notentool</h1>
<h4>Benutzer Übersicht</h4>
<?php
//user und user2 Dummydaten
$user = new User(1,"Reber","Remo","1234","test@test.ch",true,null,null,null);
$user2 = new User(2,"Reber","Reto","1234","tester@test.ch",false,4.3,5.3,1);
//Replace Array mit DB Aufruf
$userList = array($user, $user2);
echo "<table class='table'>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Vorname</th>
        <th>Passwort</th>
        <th>E-Mail</th>
        <th>Ist Coach</th>
        <th>Schlechte Noten ab</th>
        <th>Gute Noten Ab</th>
        <th>ID Coach</th>
</tr>";
foreach ($userList as $us ){
echo "<tr>
<td>".$us->getId()."</td>
<td>".$us->getName()."</td>
<td>".$us->getUsername()."</td>
<td>".$us->getPassword()."</td>
<td>".$us->getEmail()."</td>
<td>".$us->getCoach()."</td>
<td>".$us->getLowGradeLimit()."</td>
<td>".$us->getHighGradeLimit()."</td>
<td>".$us->getCoachId()."</td>
</tr>";
}
echo"</table>";
?>
</body>
<script src="/bootstrap/bootstrap-4.0.0-beta.2-dist/js/bootstrap.js"></script>