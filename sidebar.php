<!--Code for the sidebar-->

<div class="span3 col">
    <div class="block">
        <ul class="nav nav-list">
            <li class="nav-header">BROWSE BY CATEGORIES</li>

            <?php foreach ($categories as $category) {
                ?>
                <li>
                    <a href="<?php echo 'products.php?categoryId=' . $category['CategoryId'] ?>"><?php echo $category['Title']; ?></a>
                </li>
                <?php
            } ?>
        </ul>
    </div>
</div>