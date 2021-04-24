<?php include APPROOT . '/views/inc/header.php';?>
<!-- #Showcase -->
<section id="showcase">
    <div class="container">
        <div class="showcase-container">
            <div class="showcase-content">
                <div class="category category-festivites">Festivites</div>
                <h1>Journee Scientifique &amp; Culturelle</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa aperiam a sit ut dolore neque minima eius temporibus ullam! Impedit nobis rerum, recusandae tempora quaerat nemo reprehenderit soluta magnam excepturi</p>
                <div class="btn btn-primary"><a href="#"> En Savoir Plus</a></div>
            </div>
        </div>
    </div>
</section>
<!-- #Home Articles -->

<section class="dashboard">
    <div class="container pt-2">
        <h2>DERNIERES PUBLICATIONS</h2>
        <div class="article-container py-1">
            <div class="articles">
                <?php if (!empty($data)) {
                    foreach($data['posts'] as $post) :
                        if($post->counter %2 != 0)  { ?>

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
                                    <small>By <a href="<?php echo URLROOT; ?>/utilisateurs/profile/<?php echo $post->user_id; ?>"><strong class="italic"><?php echo $post->firstname .' '. $post->lastname; ?></strong></a>, <?php formatDate($post->published_at); ?></small>
                                </div>
                            </article>
                        <?php } else { ?>
                            <article class="card bg-light">
                                <div>
                                    <div class="category <?php colors_category($post->category);?>"><?php echo $post->category; ?></div>
                                    <h3 class="article-heading"><a href="<?php echo URLROOT; ?>/posts/article/<?php echo $post->post_id; ?>"><?php echo $post->title; ?></a></h3>
                                    <p>
                                        <?php $str = strip_tags($post->body);
                                        echo word_count($str);
                                        ?>
                                    </p>
                                    <small>By <a href="<?php echo URLROOT; ?>/utilisateurs/profile/<?php echo $post->user_id; ?>"><strong class="italic"><?php echo $post->firstname .' '. $post->lastname; ?></strong></a>, <?php formatDate($post->published_at); ?></small>
                                </div>
                                <div class="card-bkgd-image" style='background-image: url("<?php echo URLROOT; ?>/storage/posts/<?php echo $post->img_name; ?>")'></div>

                            </article>

                        <?php } endforeach;
                } ?>
                <div id="pagination-button" class="text-center py-1">
                        <?php if($data['current_page'] > 2) { ?>
                             <a href="<?php echo URLROOT; ?>/accueil/page/<?php echo $data['current_page'] - 1;?>" title="précédent"><i class="fas fa-arrow-circle-left"></i></a>
                        <?php } else if($data['current_page'] == 2){ ?>
                            <a href="<?php echo URLROOT; ?>/accueil/" title="accueil"><i class="fas fa-arrow-circle-left"></i></a>

                        <?php } if($data['current_page'] < $data['total_pages']){ ?>
                        <a href="<?php echo URLROOT; ?>/accueil/page/<?php echo $data['current_page'] + 1 ;?>" title="suivant"><i class="fas fa-arrow-circle-right"></i></a>
                       <?php   } else if($data['current_page'] == $data['total_pages']){ ?>
                    <a href="javascript:void(0)" title="page finale"><i class="fas fa-arrow-circle-right"></i></a>
                    <?php } ?>
                </div>
            </div>


            <div class="sidebar">
                <article class="card bg-dark">
                    <div class="category category-communiques">Communique</div>
                    <h3 class="article-heading"><a href="article.html">Mot du SG de l'ACEM FES</a></h3>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                        Consectetur ut fugiat officiis laborum architecto, labore natus
                        eveniet eos ullam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci amet aspernatur consequatur dolore eaque.
                    </p>
                </article>
                <article class="card bg-light">
                    <div class="category category-alaune">A La Une</div>
                    <img src="<?php echo URLROOT; ?>/public/images/publicites/elosig.png" alt="">
                    <h3 class="article-heading"><a href="article.html">Elosig: Inscription ouvertes</a></h3>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                        Consectetur ut fugiat officiis laborum architecto.
                    </p>
                </article>
                <article class="card bg-dark">
                    <div class="category category-communiques">Bureau Executif</div>
                    <h3 class="article-heading"><a href="article.html">Mot du President de l'ACEM</a></h3>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                        Consectetur ut fugiat officiis laborum architecto, labore natus
                        eveniet eos ullam assumenda! Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                    </p>
                </article>
                <article class="card bg-light">
                    <div class="category category-alaune">A La Une</div>
                    <img src="<?php echo URLROOT; ?>/public/images/publicites/webhelp.png" alt="">
                    <h3 class="article-heading"><a href="article.html">WebHelp Recrute</a></h3>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                        Consectetur ut fugiat officiis.
                    </p>
                </article>
            </div>

</section>

<div class="clearfix"></div>

<?php include APPROOT . '/views/inc/footer.php';?>
