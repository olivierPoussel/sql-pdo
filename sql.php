<?php

$user = 'root';
$pwd = '';
$db = new PDO('mysql:host=localhost;port=3306;dbname=cinema',$user, $pwd);
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

//select
$sql = 'SELECT * FROM acteur';

$stmt = $db->query($sql);

foreach ($stmt as $acteur) {
    print_r($acteur);
}

//insert
$stmt = $db->prepare('INSERT INTO acteur(nom, prenom) VALUE(:nom, :prenom)');
$nom = 'poussel';
$prenom = 'olivier';
$stmt->bindParam(':nom', $nom);
$stmt->bindParam(':prenom', $prenom);
$result = $stmt->execute();
$id = $db->lastInsertId();
echo 'Insert : '.(($result)? 'oui': 'non').'. Id : '.$id.PHP_EOL;

//update
$stmt = $db->prepare('UPDATE acteur SET nom = :nom, prenom = :prenom where id= :id');
$nom = 'Pitt';
$prenom = 'Brad';
$stmt->bindParam(':nom', $nom);
$stmt->bindParam(':prenom', $prenom);
$stmt->bindParam(':id', $id);
$result = $stmt->execute();
echo 'Update : '.(($result)? 'oui': 'non').PHP_EOL;

// //delete
$stmt = $db->prepare('DELETE FROM acteur where id= :id');
$stmt->bindParam(':id', $id);
$result = $stmt->execute();
echo 'Delete : '.(($result)? 'oui': 'non').PHP_EOL;