<?php include APPROOT . '/views/inc/header.php';?>
      <!-- #Showcase -->
      <section id="showcase">
        <div class="container">
          <div class="showcase-container">
            <div class="showcase-content">
              <div class="category category-festivites">Festivites</div>
              <h1>Journee Scientifique &amp; Culturelle</h1>
              <p>L'association des comoriens étudiant au Maroc (ACEM) est une association qui entre dans le cadre estudiantin, sociale, scientifique, culturel et aussi religieux. Depuis 2002, l' ACEM organise chaque année des activités scientifiques et culturelles dans le but de ...
              <div class="btn btn-primary"><a href="<?php echo URLROOT; ?>/jsc-fes-2021/"> En Savoir Plus</a></div>
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
                    $i = 1;
                    $j = 0;
                    foreach($data['posts'] as $post) { 
                    if($j < 5) {
                        if($i % 2 != 0)  { ?>

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
                                     <small>Par <a href="<?php echo URLROOT; ?>/utilisateurs/profile/<?php echo $post->user_id; ?>"><strong class="italic"><?php echo $post->firstname .' '. $post->lastname; ?></strong></a>, <?php formatDate($post->published_at); ?></small>
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
                                    <small>Par <a href="<?php echo URLROOT; ?>/utilisateurs/profile/<?php echo $post->user_id; ?>"><strong class="italic"><?php echo $post->firstname .' '. $post->lastname; ?></strong></a>, <?php formatDate($post->published_at); ?></small>
                                </div>
                                <div class="card-bkgd-image" style='background-image: url("<?php echo URLROOT; ?>/storage/posts/<?php echo $post->img_name; ?>")'></div>

                            </article>

                    <?php }
                        }
                    $i++;
                    $j++;
                    }
                           
                    } ?>
                <?php if( count($data['posts']) > 5 ) : ?>
                <div id="pagination-button" class="text-center py-1">
                   <a href="javascript:void(0)" style="cursor: default;" title="précédent"><i class="fas fa-arrow-circle-left"></i></a>
                    <a href="<?php echo URLROOT; ?>/accueil/page/2" method="post" id="pagination-form" title="suivant"><i class="fas fa-arrow-circle-right"></i></a>
                </div>
                <?php endif; ?>
            </div>


            <div class="sidebar">
                <article class="card bg-dark">
                    <div class="category category-communiques">Communiques</div>
                    <h3 class="article-heading"><a href="article.html">Mot du President de l'ACEM</a></h3>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                        Consectetur ut fugiat officiis laborum architecto, labore natus
                        eveniet eos ullam assumenda! Lorem ipsum dolor sit amet consectetur, adipisicing elit.
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
