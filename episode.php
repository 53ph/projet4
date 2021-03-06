<?php
if (!isset($_GET['id']) OR !is_numeric($_GET['id']))
    header('Location: index.php');
else
{
        extract($_GET);
    $id = strip_tags($id);
    
    require_once('config/functions.php');
    
    if(!empty($_POST))
    {
        extract($_POST);
        $errors = array();
        
        $author = strip_tags($author);
        $comment = strip_tags($comment);
        
        if(empty($author))
            array_push($errors, 'Entrez un pseudo');
        if (empty($comment))
            array_push($errors, 'Entrez un commentaire');
        
        if(count($errors) ==0)
        {
            $comment =  addComment($id, $author, $commment);
            
            $success = 'Votre commentaire a été publié';
            
            unset($author);
            unset($comment);
        }
        
        
    }
    
    
    $episode = getEpisode($id);
    $comments = getComments($id);
}
?>

//
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $episode->title ?></title>
    </head> 
    
    <body>
        <a href="index.php">Retour aux articles</a>
        <h1><?= $episode->title ?></h1>
        <time><?= $episode->date ?><time>
        <p><?= $episode->content ?></p>
        <hr />
            
            <?php
            if (isset($success))
                echo $success;
            
            if(!empty($errors)):?>
            
             <?php foreach($errors as $error): ?>
            <p><?= $error ?></p>
            <?php endforeach; ?>
            
            <?php end if; ?>
            
            
          <form action="episode.php?id=<?= $episode->id ?>"  methode="post">
              <p><label for="author">Pseudo :</label><br />
              <input type="text" name="author" id="author" value=""<?php if(isset($author)) echo $author ?>/></p>
                
              <p><label for="comment">Commentaire :</label><br />
                  <textarea name="comment" id="comment" cols="38" rows="8"><?php if(isset($comment)) echo $comment ?></textarea></p>
                
              <button type="submit">Envoyer</button>
            </form>
            
            <h2>Commentaires :</h2>
            
            <?php foreach($comments as $com): ?>
                <h3><?= $com->author ?></h3>
            <time><?= $com->date ?></time>
            <p><?= $com->comment ?></p>
            <?php endforeach; ?>
    </body>
</html>