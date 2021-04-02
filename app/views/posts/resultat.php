<?php require APPROOT . '/views/inc/header.php';?>

<!-- #About Page-->
<section id="resultat">
    <div class="container">
        <div class="page-container">
                <div class="articles">

                        <?php if(empty($data)) {  ?>
                        <div class="error-category">
                            <?php flash('keyword_not_found'); ?>
                        </div>
                        <?php } else { ?>
                        <?php foreach($data as $post) : ?>

                        <article class="card bg-light">
                            <div class="card-bkgd-image" style='background-image: url("<?php echo URLROOT; ?>/storage/posts/<?php echo $post->img_name; ?>")'></div>
                            <div>
                                <div class="category <?php colors_category($post->category);?>"><?php echo $post->category; ?></div>
                                <h3 class="article-heading"><a href="<?php echo URLROOT; ?>/posts/article/<?php echo $post->post_id; ?>"><?php echo $post->title; ?></a></h3>
                                <p>
                                    <?php $str = strip_tags($post->body);
                                    echo word_count($str);
                                    ?>
                                </p>
                                <small><a href="<?php echo URLROOT; ?>/posts/article/<?php echo $post->post_id; ?>">Lire plus...</a></small>

                            </div>

                        </article>

                        <?php endforeach;?>
                    <?php } ?>
                </div>


            <div class="sidebar">
                <article class="card bg-green">
                    <div class="category category-aides">Aides</div>
                    <h3 class="article-heading"><a href="article.html">Nous faire un don</a></h3>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                        Consectetur ut fugiat officiis laborum architecto, labore natus
                        eveniet eos ullam assumenda! Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </p>
                    <a href="#" class="btn btn-block btn-secondary">Contribuez</a>
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
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur ut fugiat officiis laborum architecto, labore natus eveniet eos ullam assumenda! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum possimus iure iste dignissimos, magni vel numquam id tempora perferendis quod! Ex, dolore similique? Veniam rem doloremque, soluta ex impedit illo?
                    </p>
                </article>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php';?>

