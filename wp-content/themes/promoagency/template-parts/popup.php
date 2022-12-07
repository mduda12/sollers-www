<?php $popup = get_field("popup_content"); if ($popup) : ?>
    <div id="homepagePopup" class="homepage-popup" style="background-color:<?php the_field('popup_background'); ?>">
        <div class="homepage-popup__wrapper">
            <span class="popup-close">X</span>
            <?php echo $popup; ?>
        </div>
    </div>
<?php endif ?>