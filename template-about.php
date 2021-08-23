<?php
// Template Name: A propos

$employee_query = new WP_Query([
	'post_type' => 'employee',
	'posts_per_page' => -1
]);

$testimony_query = new WP_Query([
	'post_type' => 'testimony',
	'posts_per_page' => -1
]);

get_header();
?>

	<section class="container">
		<?php while (have_posts()) : the_post(); ?>
			<h1> <?php the_title(); ?></h1>
			<?php the_content(); ?>
		<?php endwhile; ?>

		<div>
			<?php while ($employee_query->have_posts()) : $employee_query->the_post(); ?>
				<article>
					<h3>
						<?= carbon_get_the_post_meta('firstname'); ?>
						<?= carbon_get_the_post_meta('lastname'); ?>
					</h3>
					<div>
						<?php the_post_thumbnail('thumbnail'); ?>
					</div>
					<?php $jobs = get_the_terms(get_the_ID(), 'job'); ?>
					<?php if ($jobs): ?>
						<div>
							<ul>
								<?php foreach ($jobs as $job) : ?>
									<li><?= $job->name; ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endif; ?>

					<?php $social_networks = carbon_get_the_post_meta('social_networks'); ?>
					<?php foreach ($social_networks as $social_network) : ?>
						<a href="<?= $social_network['url']; ?>" target="_blank">
							<i class="<?= $social_network['icon']['class']; ?>"></i>
						</a>
					<?php endforeach; ?>

				</article>
			<?php endwhile; ?>
		</div>

		<div class="testimonies">
			<?php while ($testimony_query->have_posts()) : $testimony_query->the_post(); ?>
				<article class='testimony-card'>


					<header>

						<?php the_post_thumbnail('thumbnail'); ?>
						<div>
							<h4><?php the_title(); ?></h4>
							<em><?php the_date(); ?></em>
						</div>
						<i class="fas fa-quote-left fa-3x"></i>

					</header>


					<?php the_content(); ?>

					<footer>

						<?= carbon_get_the_post_meta('company'); ?>
						-
						<?= carbon_get_the_post_meta('job'); ?>

					</footer>


				</article>

			<?php endwhile; ?>
		</div>

	</section>


<?php
get_footer();
