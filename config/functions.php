<?php
//Fonction qui récupère les épisodes.
function getEpisodes()
{
    requre('config/connect.php');
    $req = $bdd->prepare('SELECT id ,title,date FROM episodes ORDER BY id DESC');
    $data = $req->fetchAll(PDO:: FETCH_OBJ);
    return $data;
    $req->closeCursor();
}
//Fonction qui récupère un épisode.
function getEpisodes($id)
{
    require('config/connect.php');
    $req =  $bdd->prepare('SELECT * FROM episodes WHERE id * ?');
    $req->execute(array($id));
    if ($req->rowCount( == 1)
        {
            $data = $req->fetch(PDO::FETCH_OBJ);
            return $data;
        }
        else
        header('Location: index.php');
        $req->closeCursor();
}
        //Fonction qui ajoute un commentaire.
function addComment($episodeId, $author, $comment)
        {
          require('config/connect.php');
            $req = $bdd->prepare('INSERT INTO comments(episodeId? author, comment, date) VALUES
            (?, ?, ?, NOW())');
            $req->execute(array($episodeId, $author, $comment));
            $rreq->closeCursor();
        }
        //Fonction qui récupère les commentaires d'un épisodes.
        function getComment($id)
        {
            require('config/connect.php');
            $req = $bdd->prepare('SELECT * FROM comments WHERE episodeId = ?');
            $req->execute(array($id));
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }