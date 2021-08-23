</main>

<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-one-third">
                <?php dynamic_sidebar('footer-left'); ?>
            </div>
            <div class="col-one-third">
			<div class="site-logo-container">
				<?php the_custom_logo() ?>
				<div class="logo-title">
					<?php bloginfo('name'); ?>
				</div>
				<div class="logo-subtitle">
					<?php bloginfo('description'); ?>
				</div>
			</div>
            </div>
            <div class="col-one-third">
                <h5>Nous contacter</h5>

                <address>

                    Téléphone :
					<a href="tel:<?= carbon_get_theme_option('phone'); ?>">
						<?= carbon_get_theme_option('phone'); ?>"></a><br>

                    Email :
					<a href="mailto:<?=carbon_get_theme_option('email'); ?>">
					<?= carbon_get_theme_option('email'); ?></a>

                </address>
            </div>

        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
