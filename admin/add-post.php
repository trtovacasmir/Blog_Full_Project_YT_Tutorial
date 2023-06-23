<?php
include 'partials/header.php';

// fetch categories from database
$query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $query);
?>





<section class="form__section">
    <div class="container form__section-container">
        <h2>Add Post</h2>
        <div class="alert__message error">
            <p>This is an error message</p>
        </div>

        <form action="<?= ROOT_URL ?>admin/add-post-logic.php" enctype="multipart/form-data" method="POST">
            <input type="text" name="title" placeholder="Title">
            <select name="category">
                <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
                <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                <?php endwhile ?>
               
            </select>
            <textarea rows="10" name="body" placeholder="Body"></textarea>
            <?php if(isset($_SESSION['user_is_admin'])): ?>
            <div class="form__control inline">
                <input type="checkbox" name="is_featured" value="1" id="is_featured" checked>
                <label for="is_featured" checked>Featured</label>
            </div>
            <?php endif ?>
            <div class="form__control">
                <label for="thumbnail">Add Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail">
            </div>
            <button type="submit" name="submit" class="btn">Add Post</button>
        </form>

    </div>
</section>

<?php
include '../partials/footer.php'
?>





