<?php include APPROOT . '/views/inc/header.php';?>
      <!-- #Showcase -->
      <section id="showcase">
        <div class="container">
          <div class="showcase-container">
            <div class="showcase-content">
              <div class="category category-festivites">Festivite</div>
              <h1>Journee Scientifique &amp; Culturelle</h1>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa aperiam a sit ut dolore neque minima eius temporibus ullam! Impedit nobis rerum, recusandae tempora quaerat nemo reprehenderit soluta magnam excepturi</p>
              <div class="btn btn-primary"><a href="#"> En Savoir Plus</a></div>
            </div>
          </div>
        </div>
      </section>
      <!-- #Home Articles -->

<section class="dashboard">
    <div class="container py-2">
        <h2>DERNIERES PUBLICATIONS</h2>
        <div class="article-container py-1">
            <div class="articles">
                <?php foreach($data['posts'] as $post) : ?>

                    <article class="card bg-light">
                        <div class="card-bkgd-image" style='background-image: url("<?php echo URLROOT; ?>/storage/posts/<?php echo $post->img_name; ?>")'></div>
                         <div>
                            <div class="category <?php colors_category($post->category);?>"><?php echo $post->category; ?></div>
                            <h3 class="article-heading"><a href="<?php echo URLROOT; ?>/posts/article/<?php echo $post->id; ?>"><?php echo $post->title; ?></a></h3>
                            <p class="mb-1">
                                <?php echo word_count($post->body); ?>
                            </p>
                        </div>
                    </article>

                <?php endforeach; ?>

            </div>

            <div class="sidebar">
                <article class="card bg-dark">
                    <div class="category category-communiques">Communique</div>
                    <h3 class="article-heading"><a href="article.html">Mot du SG de l'ACEM FES</a></h3>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                        Consectetur ut fugiat officiis laborum architecto, labore natus
                        eveniet eos ullam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci amet aspernatur consequatur dolore eaque, harum impedit incidunt inventore ipsum labore maiores natus necessitatibus neque nostrum nulla numquam optio reiciendis rem reprehenderit, saepe similique sit vel veritatis vero voluptatem? Nemo, quo?

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
                <article class="card bg-dark">
                    <div class="category category-alaune">Publicite</div>
                    <h3 class="article-heading"><a href="article.html">Votre publicite ici</a></h3>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                        Consectetur ut fugiat officiis laborum architecto, labore.
                    </p>
                </article>
            </div>
</section>
<div class="text-center py-1">
    <a href="#" class="btn btn-primary"><i class="fas fa-arrow-circle-left "></i></a>
    <a href="#" class="btn btn-primary"><i class="fas fa-arrow-circle-right"></i></a>
</div>
<div class="clearfix"></div>

<?php include APPROOT . '/views/inc/footer.php';?>
