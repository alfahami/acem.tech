<?php require APPROOT . '/views/inc/header.php';?>

<section class="dashboard">
    <div class="container py-2">
        <h1>Vos Publications</h1>
        <div class=" article-container py-1">
            <?php
                flash('no_post_error');
                flash('delete_success');
                flash('delete_error');
            ?>

        </div>
        <?php flash('no_post_error'); ?>
        <a href="<?php echo URLROOT; ?>/posts/ajouterarticle" class="btn btn-primary">Ajouter un article</a>
<!--        <p class="py-2">You don't have any post yet.</p>-->
        <br>

        <div class="article-container py-1">
            <div class="articles">
                <?php flash('post_success'); ?>

                <?php foreach($data as $post) : ?>

                <article class="card bg-light">
                    <img src="<?php echo URLROOT; ?>/public/images/default.png
" alt="">
                    <div>
                        <div class="category <?php colors_category($post->category);?>"><?php echo $post->category; ?></div>
                        <h3 class="article-heading"><a href="<?php echo URLROOT; ?>/posts/article/<?php echo $post->id; ?>"><?php echo $post->title; ?></a></h3>
                        <p class="mb-1">
                            <?php echo word_count($post->body); ?>
                        </p>
<!--                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis incidunt ipsum minima nam nobis praesentium veritatis.</p>-->
                            <small class="left-text"><?php formatDateMin($post->published_at); ?></small>
                            <button class="btn-default"><a href="<?php echo URLROOT; ?>/posts/editer/<?php echo $post->id;?>"></a>Editer</button>
                        <form class="inline" method="post" action="<?php echo URLROOT; ?>/posts/supprimer/<?php echo $post->id; ?>">
                        <input type="submit" class="btn-default text-red" value="Supprimer" title="Suppression irreversible">
                        </form>
                    </div>
                </article>

                <?php endforeach; ?>

        </div>

        <div class="sidebar mb-1">
                <img id="profile-pic" src="<?php echo URLROOT; ?>/public/images/avatar.png" alt="">
                <div class="clearfix"></div>

                    <div class="l-heading right-text"> <?php echo $_SESSION['user_fname']; ?>  <?php echo $_SESSION['user_lname']; ?>
            </div>

                <small><div class="right-text">Membre depuis <?php formatDate($_SESSION['joined_at']); ?></div></small>
            <div class="clearfix"></div>
            <p>
            <small><div class="pt-2 right-text">Introduction</div></small>
                    <div class="bio">
                        <p><?php echo $_SESSION['bio']; ?></p>
                    </div>

                    <form method="post" action="<?php echo URLROOT; ?>/posts/supprimercompte" class="left-text">
                        <input class="btn-default mt-1 align-right text-red" type="submit" value="Supprimer votre compte">
                    </form>
                    <form method="post" action="<?php echo URLROOT; ?>/utilisateurs/modifier/<?php echo $_SESSION['user_id']; ?>" class="left-text">
                        <input class="btn-default mt-1 align-right mx-1" type="submit" value="Modifier">
                    </form>
                    <div class="clearfix"></div>
                </p>

        </div>
</section>
            <div class="clearfix"></div>




<?php require APPROOT . '/views/inc/footer.php';?>

