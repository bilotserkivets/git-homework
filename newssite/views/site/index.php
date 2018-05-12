<?php include ROOT.'/views/layouts/header.php'; ?>

    <!-- Page Content -->
    <div class="container">

    <div class="row">
           <!-- Blog Entries Column -->
    <div class="col-md-8">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="/webroot/upload/images/1.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Новина 1</h5>
                    <p>Текст новини 1</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/webroot/upload/images/2.jpg" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Новина 2</h5>
                    <p>Текст новини 2</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/webroot/upload/images/2.jpg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Новина 3</h5>
                    <p>Текст новини 3</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

                <h1 class="my-4">Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- Blog Post -->
                <div class="card mb-4">
                    <div class="card-body">
                        <a href="/news/<?php echo $categories[0]['cat_name'];?>"><h2 class="card-title">Політика</h2></a>
                        <?php foreach($newsPolitika as $newsItem):?>

                                <p><a href="/news/<?php echo $newsItem['cat_name']?>/<?php echo $newsItem['id']?>"><?php echo $newsItem['title']?></a></p>

                        <?php endforeach;?>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on January 1, 2017 by

                    </div>
                </div>

                <!-- Blog Post -->
                <div class="card mb-4">

                    <div class="card-body">
                        <a href="/news/<?php echo $categories[1]['cat_name'];?>"><h2 class="card-title">Економіка</h2></a>
                        <?php foreach($newsEkonomika as $newsItem):?>
                                <p><a href="/news/<?php echo $newsItem['cat_name']?>/<?php echo $newsItem['id']?>"><?php echo $newsItem['title']?></a></p>
                        <?php endforeach;?>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on January 1, 2017 by

                    </div>
                </div>

                <!-- Blog Post -->
                <div class="card mb-4">

                    <div class="card-body">
                        <a href="/news/<?php echo $categories[2]['cat_name'];?>"><h2 class="card-title">Спорт</h2></a>
                        <?php foreach($newsSport as $newsItem):?>
                                <p><a href="/news/<?php echo $newsItem['cat_name']?>/<?php echo $newsItem['id']?>"><?php echo $newsItem['title']?></a></p>
                        <?php endforeach;?>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on January 1, 2017 by

                    </div>
                </div>

                <!-- Blog Post -->
                <div class="card mb-4">

                    <div class="card-body">
                        <a href="/news/<?php echo $categories[3]['cat_name'];?>"><h2 class="card-title">Технології</h2></a>
                        <?php foreach($newsTehnology as $newsItem):?>
                                <p><a href="/news/<?php echo $newsItem['cat_name']?>/<?php echo $newsItem['id']?>"><?php echo $newsItem['title']?></a></p>
                        <?php endforeach;?>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on January 1, 2017 by

                    </div>
                </div>
    </div>

<?php include ROOT . '/views/layouts/sidebar.php'; ?>
<?php include ROOT.'/views/layouts/footer.php'; ?>