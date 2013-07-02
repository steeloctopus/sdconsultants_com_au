<?php

    /**
     * @file
     * Default simple view template to display a list of rows.
     *
     * @ingroup views_templates
     */
?>
<article class="basic-page">
    <h1><?php print $title = $view->get_title(); ?></h1>

<?php foreach ($rows as $id => $row): ?>
    <?php print $row; ?>
<?php endforeach; ?>

    <hr class="bottom"/>
</article>