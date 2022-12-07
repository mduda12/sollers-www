<?php
/* Template Name: Panel */
if(!class_exists('JiraConnect\Controller\AdminUserData')) {
    die('Fatal error - jira connector missing');
}
use JiraConnect\Controller\AdminUserData;
$current_user = wp_get_current_user();
$user_email = $current_user->user_email;
$obj = new AdminUserData();
$data = $obj->render($user_email);
?>
<?php get_header(); ?>
<main>
    <section>
        <div class="container">
			<h3>E-mail: <?php echo $user_email; ?></h3>
            <p>Number of submits: <?php echo $obj->count; ?></p>
        </div>
    </section>

	<section>
		<div class="container" >
          <button type="button"><a href="<?php echo wp_logout_url( home_url() ); ?>" title="Logout">Logout</a> </button>
		</div>
</section>
    <section>
        <div class="container">
            <?php echo $data; ?>
            <a data-toggle="modal" data-target="#careerModal" class="btn btn-default"><span><?php _e("Submit data change", "pa"); ?></span></a><br><br>
        </div>
    </section>
</main>


<div class="modal fade" id="careerModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal"></button>
				<?php echo do_shortcode('[contact-form-7 id="8260" title="Formularz zmiany danych RODO"]'); ?>
            </div>
        </div>
    </div>
</div>


<?php

get_footer();
?>
