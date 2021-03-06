<?php


class News
{
    const SHOW_BY_DEFAULT = 5;
/*
 * Вибір однієї новини категорії
 */
    public static function getNewsListById($category, $id) {

        $id = intval($id);

        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM news WHERE id = '$id' AND cat_name = '$category'");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $newsItem = $result->fetch();
        return $newsItem;


    }
/*
 * Вибір всіх новин категорії Політика
 */
    public static function getNewsPolitika($count = self::SHOW_BY_DEFAULT) {

        $db = Db::getConnection();

        $newsList = [];

        $result = $db->query("SELECT * FROM news WHERE cat_name = 'politika' ORDER BY id LIMIT ". $count);

        $i = 0;

        while($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['category_id'] = $row['category_id'];
            $newsList[$i]['content'] = $row['content'];
            $newsList[$i]['pubdate'] = $row['pubdate'];
            $newsList[$i]['author_id'] = $row['author_id'];
            $newsList[$i]['cat_name'] = $row['cat_name'];
            $i++;
        }
        return $newsList;
    }
    /*
 * Вибір всіх новин категорії Економіка
 */
    public static function getNewsEkonomika($count = self::SHOW_BY_DEFAULT) {

        $db = Db::getConnection();

        $newsList = [];

        $result = $db->query("SELECT * FROM news WHERE cat_name = 'ekonomika' ORDER BY id LIMIT ". $count);

        $i = 0;

        while($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['category_id'] = $row['category_id'];
            $newsList[$i]['content'] = $row['content'];
            $newsList[$i]['pubdate'] = $row['pubdate'];
            $newsList[$i]['author_id'] = $row['author_id'];
            $newsList[$i]['cat_name'] = $row['cat_name'];
            $i++;
        }
        return $newsList;
    }
    /*
 * Вибір всіх новин категорії Спорт
 */
    public static function getNewsSport($count = self::SHOW_BY_DEFAULT) {

        $db = Db::getConnection();

        $newsList = [];

        $result = $db->query("SELECT * FROM news WHERE cat_name = 'sport' ORDER BY id LIMIT ". $count);

        $i = 0;

        while($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['category_id'] = $row['category_id'];
            $newsList[$i]['content'] = $row['content'];
            $newsList[$i]['pubdate'] = $row['pubdate'];
            $newsList[$i]['author_id'] = $row['author_id'];
            $newsList[$i]['cat_name'] = $row['cat_name'];
            $i++;
        }
        return $newsList;
    }

    /**
     * Удаляет новину с вказанним id
     * @param integer $id <p>id товару</p>
     * @return boolean <p>Результат виконаня методу</p>
     */
    public static function deleteNewsById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM news WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    /*
 * Вибір всіх новин категорії Технології
 */
    public static function getNewsTehnology($count = self::SHOW_BY_DEFAULT) {

        $db = Db::getConnection();

        $newsList = [];

        $result = $db->query("SELECT * FROM news WHERE cat_name = 'tehnology' ORDER BY id LIMIT ". $count);

        $i = 0;

        while($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['category_id'] = $row['category_id'];
            $newsList[$i]['content'] = $row['content'];
            $newsList[$i]['pubdate'] = $row['pubdate'];
            $newsList[$i]['author_id'] = $row['author_id'];
            $newsList[$i]['cat_name'] = $row['cat_name'];
            $i++;
        }
        return $newsList;
    }
    /*
     * Список новин у вибраній категорії
     */
    public static function getNewsCategory($category, $page = 1) {

        $limit = News::SHOW_BY_DEFAULT;
            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            $db = Db::getConnection();


            $sql = 'SELECT * FROM news '
            . 'WHERE cat_name = :category '
            . 'ORDER BY id ASC LIMIT :limit OFFSET :offset';

        $result = $db->prepare($sql);
        $result->bindParam(':category', $category, PDO::PARAM_INT);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);

        // Выполнение коменды
        $result->execute();



            $i = 0;
        $newsCategory = [];
            while($row = $result->fetch()) {

                $newsCategory[$i]['id'] = $row['id'];
                $newsCategory[$i]['title'] = $row['title'];
                $newsCategory[$i]['category_id'] = $row['category_id'];
                $newsCategory[$i]['content'] = $row['content'];
                $newsCategory[$i]['pubdate'] = $row['pubdate'];
                $newsCategory[$i]['author_id'] = $row['author_id'];
                $newsCategory[$i]['cat_name'] = $row['cat_name'];
                $i++;

            }
            return $newsCategory;
        }



    /*
     * Отримання id категорії
     */
   /* public static function getIdCategory($category) {
        $db = Db::getConnection();

        $result = $db->query("SELECT id FROM news WHERE title = " . $category);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $catId = $result->fetch();
        return $catId;

    }*/

public static function getNewsByCategory($categoryId = false) {

    if($categoryId) {
        $db = Db::getConnection();

        $news = [];
        $result = $db->query("SELECT id, category_id, title, content, pubdate FROM news WHERE category_id = ".$categoryId);

        $i = 0;

        while($row = $result->fetch()) {
            $news[$i]['id'] = $row['id'];
            $news[$i]['category_id'] = $row['category_id'];
            $news[$i]['title'] = $row['title'];
            $news[$i]['content'] = $row['content'];
            $news[$i]['pubdate'] = $row['pubdate'];
            $i++;
        }
        return $news;
        }
}
    /*
     * Виведення тегів новини
     */
    public static function getTags($id) {
        $db = Db::getConnection();
        $tagsList = [];
         $result = $db->query("SELECT tags.tag, tags.id, COUNT(news_tags.tagid) AS news_count".
                    " FROM news_tags LEFT JOIN tags ON news_tags.tagid=tags.id".
             " WHERE news_tags.newsid=".$id.
                    " GROUP BY tags.id");
        $i = 0;
        while($row = $result->fetch()) {
            $tagsList[$i]['tag'] = $row['tag'];
            $tagsList[$i]['id'] = $row['id'];
            $i++;
        }
        return $tagsList;
    }

    public static function getNewsByTag($idTag) {

        $db = Db::getConnection();

        $newsTag = [];
        $result = $db->query("SELECT news.id AS news_id, news.title AS news_title, tags.id  AS tag, news_tags.tagid FROM news JOIN news_tags JOIN tags ON tags.id ='$idTag'");

        $i = 0;

        while($row = $result->fetch()) {

            $newsTag[$i]['id'] = $row['news_id'];
            $newsTag[$i]['title'] = $row['news_title'];
            $newsTag[$i]['tag'] = $row['tag'];
            $i++;
        }

        return $newsTag;
      }

    /**
     * Возвращает список последних новостей
     * @return array <p>Массив с новостями</p>
     */
    public static function getLastNews($count = self::SHOW_BY_DEFAULT)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Получение и возврат результатов
        $result = $db->query('SELECT id, title, tag_id FROM news '
            . 'ORDER BY id DESC LIMIT '.$count);
        $i = 0;
        $newsList = [];
        while ($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['tag_id'] = $row['tag_id'];
            $i++;
        }
        return $newsList;
    }

    /**
     * Возвращает путь к изображению
     * @param integer $id
     * @return string <p>Путь к изображению</p>
     */
    public static function getImage($id)
    {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';

        // Путь к папке с изображениями
        $path = '/webroot/upload/images/';

        // Путь к изображению товара
        $pathToNewsImage = $path . $id . '.jpg';

            return $pathToNewsImage;
        }
public static function getTotalNewsInCategory($category)
{

    $db = Db::getConnection();

    // Текст запроса к БД
    $sql = "SELECT count(id) AS count FROM news WHERE cat_name = :category";

    // Используется подготовленный запрос
    $result = $db->prepare($sql);
    $result->bindParam(':category', $category, PDO::PARAM_INT);

    // Выполнение коменды
    $result->execute();

    // Возвращаем значение count - количество
    $row = $result->fetch();
    return $row['count'];
}

    /**
     * Возвращает список новостей
     * @return array <p>Массив с новостями</p>
     */
    public static function getNewsList()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Получение и возврат результатов
        $result = $db->query('SELECT id, cat_name, author_id, title, content, image FROM news ORDER BY id ASC');
        $newsList = [];
        $i = 0;
        while ($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['cat_name'] = $row['cat_name'];
            $newsList[$i]['author_id'] = $row['author_id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['image'] = $row['image'];
            $i++;
        }
        return $newsList;
    }
    /**
     * Добавляет новую новость
     * @param array $options <p>Массив с информацией о новости</p>
     * @return integer <p>id добавленной в таблицу записи</p>
     */
    public static function createNews($options)
    {

        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO news (title, content, category_id) '
        . 'VALUES (:title, :content, :category_id)';

        // Получение и возврат результатов.
        $result = $db->prepare($sql);

        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);

        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
}
    /**
     * Редактирует новость с заданным id
     * @param integer $id <p>id товара</p>
     * @param array $options <p>Массив с информацей о новости</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updateNewsById($id, $options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE news SET title = :title, content = :content, category_id = :category_id WHERE id = :id";

        // Получение и возврат результатов.
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        return $result->execute();
    }
    /**
     * Возвращает новость с указанным id
     * @param integer $id <p>id новости</p>
     * @return array <p>Массив с информацией о новости</p>
     */
    public static function getNewsById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM news WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        return $result->fetch();
    }
}