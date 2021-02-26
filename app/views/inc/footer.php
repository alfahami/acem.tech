<footer id="main-footer">
        <div class="container footer-container">
          <div class="acem-fes-news-about">
            <img src="<?php echo URLROOT; ?>/public/images/light-logo.png" alt="" class="logo">
            <p>Lorem ipsum dolor sit amet consectetur adipisic elit. Dolore ducimus quasi id, commodi corporis dolores, libero aliquid, explicabo ex numquam et asperiores velit molestias harum incidunt nemo labore! Repudiandae ullam vero dolorum ipsam recusandae amet, eveniet dolore iure vitae fuga delectus, fugiat voluptatem nesciunt aspernatur quisquam dolorem sequi asperiores neque.</p>
          </div>

          <div class="acemfes-site-map">
            <h4>ACEM FES SITEMAP</h4>
            <ul class="list">
              <li><a href="#">ACCUEIL</a></li>
              <li><a href="#">BUREAU</a></li>
              <li><a href="#">FESTIVITES</a></li>
              <li><a href="#">ARCHIVES</a></li>
              <li><a href="#">A PROPOS</a></li>
            </ul>
          </div>
          <div>
            <h4>NOUS CONTACTEZ</h4>
            <form action="" id="contact-form">
                <input type="text" name="nom-prenom" placeholder="Nom & Prénom">
                <input type="email" name="email" placeholder="Email">
                <textarea name="messge" cols="30" rows="5" placeholder="Votre message"></textarea>
              <input type="submit" class="btn btn-block btn-primary" value="ENVOYEZ">
            </form>
          </div>

          <div class="author-copyright">
            <p><small>Copyright &copy; 2020, Tous droits reservés | <a href="#">ACEM FES</small></a></p>
            <p><small>Designed and Coded with <i class="fas fa-heart"></i> by <a href="#">AL-FAHAMI TOIHIR</a></small></p>
          </div>
        </div>
      </footer>
        <?php if($view == 'posts/ajouterarticle') : ?>
      <script src="<?php echo URLROOT; ?>/public/js/ckeditor/ckeditor.js"></script>
      <script>
          CKEDITOR.replace( 'editor1' );
      </script>
        <?php endif; ?>
  </body>
  </html>
