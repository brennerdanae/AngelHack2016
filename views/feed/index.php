<h2><?php echo $title; ?></h2>

<?php foreach ($feed as $feed_item): ?>

        <h3><?php echo $feed_item['title']; ?></h3>
        <div class="main">
                <?php echo $feed_item['text']; ?>
        </div>
        <p><a href="<?php echo site_url('feed/'.$feed_item['slug']); ?>">View article</a></p>

<?php endforeach; ?>
