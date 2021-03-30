<?php require APPROOT . '/views/inc/header.php';?>

<section id="addpost">
    <div class="container py-2">
        <a href="<?php echo URLROOT; ?>/posts" class="btn btn-primary">Retour</a>
        <h1 class="py-2">Remplissez ce formulaire pour publier un post</h1>

        <form action="<?php echo URLROOT; ?>/posts/ajouterarticle" method="post" id="addpost-form" enctype="multipart/form-data">
            <?php flash('format_error'); ?>
            <?php flash('size_error'); ?>
            <?php flash('upload_error'); ?>
            <?php flash('post_error'); ?>
            <?php flash('file_exist_error'); ?>
            <div class="form-group">
                <input type="text" name="title" placeholder="Title" value="<?php echo $data['title'] ? $data['title'] : '';?>">
                <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="category">Choisir une catégorie</label>
                <select name="categories" id="category">
                    <option value="Festivites">Festivites</option>
                    <option value="Projets">Projet</option>
                    <option value="Nouveautes">Nouveaute</option>
                    <option value="Communiques">Communique</option>
                    <option value="archives">Archives</option>
                </select>
                <span class="invalid-feedback"><?php echo $data['category_err']; ?></span>
            </div>
            <div class="form-group">
                <textarea name="editor1" id="editor1" cols="80" rows="10" placeholder="article message"><?php echo $data['body'] ? $data['body'] : '' ;?></textarea>
                <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
            </div>
            <div class="form-group">
                <input type="file" name="img_article" id="">
                <span class="invalid-feedback"><?php echo $data['filename_err']; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Publier">
            </div>
        </form>
    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php';?>

