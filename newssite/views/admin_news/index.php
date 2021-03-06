<?php include ROOT . '/views/layouts/header_admin.php'; ?>
<br/>

    <div class="col-md-8">
        <a href="/admin"><button type="button" class="btn btn-primary"">Адмін панель</button></a>
        <a href="/admin/category"><button type="button" class="btn btn-primary">Управління категоріями</button></a>
        <br/>
        <br/>
        <a href="/admin/news/create" "><i class="fa fa-plus"></i><button type="button" class="btn btn-success"> + Додати новину</button></a>



<h4>Список новин</h4>

<br/>

<table class="table-bordered table-striped table">
    <tr>
        <th>ID новини</th>
        <th>Заголовок новини</th>
        <th>Автор</th>
        <th></th>
        <th></th>
    </tr>
    <?php foreach ($newsList as $news): ?>
        <tr>
            <td><?php echo $news['id']; ?></td>
            <td><?php echo $news['title']; ?></td>
            <?php
            $user = false;
            foreach($author as $name) {
                if($name['id'] == $news['author_id']) {
                    $user = $name;
                    break;
                }
            }
            ?>
            <td><?php echo $user['name'];?></td>
            <td><a href="/admin/news/update/<?php echo $news['id']; ?>" title="Редагувати"><i class="fa fa-pencil-square-o"></i><img src="/webroot/upload/icons/check.svg"width="15"></a></td>
            <td><a href="/admin/news/delete/<?php echo $news['id']; ?>" title="Видалити"><i class="fa fa-times"></i><img src="/webroot/upload/icons/delete.svg"width="15"></a></td>
        </tr>
    <?php endforeach; ?>
</table>
    </div>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>