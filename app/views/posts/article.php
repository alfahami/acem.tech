<?php require APPROOT . '/views/inc/header.php';?>

<!-- #Article Page-->
<section id="article">
    <div class="container">
        <div class="page-container">
            <article class="card bg-light">
                <div class="bkgd-cover-image" style='background-image: url("<?php echo URLROOT; ?>/storage/posts/<?php echo $data['post']->img_name; ?>")'></div>
                <h1 class="l-heading"><?php echo $data['post']->title; ?></h1>
                <div class="meta">
                    <small>
                        <i class="fas fa-user"></i>Ecrit par <span class="text-bold"><?php echo $data['user']->firstname . ' ' . $data['user']->lastname;?></span>, <span class="date"><?php formatDateMin($data['post']->published_at); ?></span>
                    </small>
                    <div class="category <?php colors_category($data['post']->category);?>"><?php echo $data['post']->category; ?></div>
                </div>
                <div class="p-news mb-1">
                    <?php echo $data['post']->body; ?>
                </div>


                <div class="writer">
                    <?php if(!empty($data['user']->picture_name)) { ?>
                        <img class="img-scale" src="<?php echo URLROOT; ?>/storage/profiles/<?php echo $data['user']->picture_name; ?>" alt="">
                    <?php } else { ?>
                        <img id="profile-pic" src="<?php echo URLROOT; ?>/public/images/avatar.png" alt="">
                    <?php } ?>
                    <h3><?php echo $data['user']->firstname . ' ' . $data['user']->lastname; ?></h3>
                    <p><?php echo $data['user']->bio; ?></p>
                </div>
            </article>

            <div class="sidebar">
                <article class="card bg-light">
                    <h3 class="article-heading text-capitalize"><a href="article.html">Catégories</a></h3>
                    <ul class="list">
                        <li><a href="<?php echo URLROOT; ?>/posts/categorie/festivites"><i class="fa fa-chevron-right"></i> Festivités</a></li>
                        <li><a href="<?php echo URLROOT; ?>/posts/categorie/be"><i class="fa fa-chevron-right"></i> Bureau Exécutif</a></li>
                        <li><a href="<?php echo URLROOT; ?>/posts/categorie/innovations"><i class="fa fa-chevron-right"></i> Innovations</a></li>
                        <li><a href="<?php echo URLROOT; ?>/posts/categorie/Projet"><i class="fa fa-chevron-right"></i> Projets</a></li>
                        <li><a href="<?php echo URLROOT; ?>/posts/categorie/publicites"><i class="fa fa-chevron-right"></i> Publicités</a></li>
                    </ul>
                </article>

                <article class="card bg-dark">
                    <div class="category category-communiques">Reseaux Sociaux</div>
                    <h3 class="article-heading"><a href="article.html">Nous suivre</a></h3>
                    <p> <a href="#"><i class="fab fa-facebook"></i> facebook.com/acemfesofficiel</a></p>
                    <p><a href="#"><i class="fab fa-youtube"></i> youtube.com/acemfesofficiel</a></p>
                    <p><a href="#"><i class="fab fa-instagram"></i> instagram.com/acemfesofficiel</a></p>

                    <h3 class="article-heading"><a href="article.html">Nous ecrire</a></h3>
                    <p><a href="#"><i class="fas fa-globe-africa"></i> acemfes.com/nouscontacter</a></p>
                </article>

                <article class="card bg-light">
                    <div class="category category-alaune">PUBLICITE</div>
                    <h3 class="article-heading"><a href="article.html">Votre publicite ici</a></h3>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur ut fugiat officiis laborum architecto, labore natus eveniet eos ullam assumenda!
                    </p>
                </article>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php';?>

