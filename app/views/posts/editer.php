<?php require APPROOT . '/views/inc/header.php';?>


<!-- #Article Page-->
<section id="article">
    <div class="container">
        <div class="page-container">
            <article class="card bg-light">
                <div class="block">
                    <?php
                    flash('file_size_error');
                    flash('file_format_error');
                    flash('file_exist_error');
                    flash('file_upload_error');
                    flash('file_input_error');
                    flash('input_img_error');
                    ?>
                </div>
                <div class="bkgd-cover-image" style='background-image: url("<?php echo URLROOT; ?>/storage/posts/<?php echo (!empty($data['post']->img_name)) ? $data['post']->img_name : $data['old_img']; ?>")'></div>
                <form action="<?php echo URLROOT; ?>/posts/editer/<?php echo $data['id']; ?>" method="post" id="editpost-form" enctype="multipart/form-data">
                    <input type="hidden" name="old_img" value="<?php echo !empty($data['post']->img_name) ? $data['post']->img_name : $data['old_img']; ?>">
                    <div class="form-group mt-1">
                        <input type="file" name="img_article" id="">
                        <span class="invalid-feedback"><?php echo $data['filename_err']; ?></span>
                    </div>
                    <div class="form-group mb-1">
                        <label for="img-desc"><smal>Description de l'image(Facultatif)</smal></label>
                        <input type="text" name="desc_img" value="<?php echo (!empty($data['post']->desc_img)) ? $data['post']->desc_img : $data['desc_img'];?>" placeholder="Description de l'image(Facultatif)">
                    </div>
                    <span class="invalid-feedback"><?php echo $data['title_error'] ? $data['title_error'] : ''; ?></span>
                    <div class="form-group">
                        <labe for="title">Titre</labe>
                        <input type="text" name="title" id="title" value="<?php echo (!empty($data['post']->title)) ? $data['post']->title : $data['title']; ?>">
                    </div>
                    <div class="py-1 form-group">
                        <label for="category">Catégories</label>
                        <select name="categories" id="category">
                            <option value="<?php echo (!empty($data['post']->category)) ? $data['post']->category : $data['category'];?>" selected><?php echo (!empty($data['post']->category)) ? $data['post']->category : $data['category']; ?></option>
                            <option value="Festivites">Festivites</option>
                            <option value="Projets">Projets</option>
                            <option value="Nouveautes">Nouveautes</option>
                            <option value="Communiques">Communiques</option>
                            <option value="archives">Archives</option>
                        </select>
                        <span class="invalid-feedback"><?php echo $data['category_error']; ?></span>
                    </div>
                <span class="invalid-feedback"><?php echo $data['body_error'] ? $data['body_error'] : ''; ?></span>
                <div class="form-group">
                    <textarea name="body" id="editor1" cols="80" rows="20" placeholder="article message">
                        <?php if(!empty($data['post']->body)) echo $data['post']->body; ?>
                    </textarea>

                </div>


                <div class="form-group">
                    <input type="submit" value="Valider" class="btn-sm btn-primary">
                </div>

                <div class="form-group">
                    <a href="<?php echo URLROOT; ?>/posts/dashboard">Annuler</a>
                </div>
                </form>

                <div class="clearfix"></div>

            </article>

            <div class="sidebar">
                <article class="card bg-light">
                    <h3 class="article-heading text-capitalize"><a href="article.html">Catégories</a></h3>
                    <ul class="list">
                        <li><a href="#"><i class="fa fa-chevron-right"></i> Festivités</a></li>
                        <li><a href="#"><i class="fa fa-chevron-right"></i> Bureau Exécutif</a></li>
                        <li><a href="#"><i class="fa fa-chevron-right"></i> Innovations</a></li>
                        <li><a href="#"><i class="fa fa-chevron-right"></i> Projets</a></li>
                        <li><a href="#"><i class="fa fa-chevron-right"></i> Articles</a></li>
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

