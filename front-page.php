<?php

$product_categories = get_terms([
	'taxonomy' => 'product_cat',
	'hide_empty' => false
]);

get_header();

?>

<div class="container">

	<?php while (have_posts()) : the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; ?>

</div>

	<section class="container">
		<hr>
		<h2 class="section-title">Nos catégories de vélos</h2>
		<div class="row">
			<?php foreach ($product_categories as $product_category) : ?>
				<a href="<?= get_term_link($product_category); ?>" class="category-card">
					<figure>
						<div class="card-img-container">
							<?php $thumbnail_id = get_term_meta($product_category->term_id, 'thumbnail_id',true); ?>
							<?php $url = wp_get_attachment_url($thumbnail_id); ?>
							<img src="<?= $url; ?>" alt="<?= $product_category->name; ?>">
						</div>
						<figcaption><?=$product_category->name; ?></figcaption>
					</figure>
				</a>
			<?php endforeach; ?>

		</div>
	</section>



<?php

get_footer();
