<?php
class ArticleManager extends Model
{
    public function getArticles()
    {
      //  $this->getBdd(); pas besoin de cette ligne
        return $this->getAll('articles' ,'Article');
    }
}