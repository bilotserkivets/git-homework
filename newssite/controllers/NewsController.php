<?php

include_once ROOT. '/models/News.php';
include_once ROOT. '/components/Pagination.php';
include_once ROOT. '/models/Category.php';
include_once ROOT. '/models/Comment.php';
class NewsController
{
   public function actionIndex() {
        $newsList = [];
        $newsList = News::getNewsPolitika();
       $categories = Category::getCategoriesList();

      require_once (ROOT.'/views/site/index.php');
      return true;
    }


   /*
    *
    */
   public function actionCategory($category, $page = 1) {

       $categoryNews = [];
       $categoryNews = News::getNewsCategory($category, $page);

       $categories = Category::getCategoriesList();


       $total = News::getTotalNewsInCategory($category);

       $pagination = new Pagination($total, $page, News::SHOW_BY_DEFAULT, 'page-');
       $topAuthors = Comment::getTopAutors();

       require_once (ROOT.'/views/news/category.php');
        return true;

    }

    public function actionView($category, $id) {

       $db = Db::getConnection();

       $tags = [];
       //$tags = News::getTags($id);

       $oneNews = News::getNewsListById($category, $id);

        $categories = Category::getCategoriesList();

            $comments = Comment::getComments($id);
            $tags = News::getTags($id);
            $author = User::getUsers();

        // Обработка формы
        $options = [];
        if(isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы

            $options['content'] = $_POST['content'];
            $options['news_id'] = $id;
            $options['author_id'] = $_SESSION['user'];
        }

            // Флаг ошибок в форме
            $errors = false;


            if (!isset($options['content']) || empty($options['content'])) {
                $errors[] = 'Заповніть поля';
            }

           Comment::createComment($options);
        $topAuthors = Comment::getTopAutors();

        require_once (ROOT.'/views/news/view.php');
       return true;

   }

    public function actionTagnews($idTag) {

       $db = Db::getConnection();
       $tagNews = [];
       $tagNews = News::getNewsByTag($idTag);
        $topAuthors = Comment::getTopAutors();

        require_once (ROOT.'/views/news/tag.php');
       return true;
    }

}