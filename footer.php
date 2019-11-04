<?php $callback_title = carbon_get_theme_option('crb_callbackform_title' . get_lang()); ?>
<?php $callback_subtitle = carbon_get_theme_option('crb_callbackform_subtitle' . get_lang()); ?>
<div class="section section-callback">
    <div class="container">
        <div class="row">
            <div class="col md-4">
                <h2 class="section-callback-header">
                    <strong><?php echo $callback_title; ?></strong>
                    <span><?php echo $callback_subtitle; ?></span>
                </h2>
            </div>
            <div class="col md-8">
                <div class="callback-form">
					<?php if (get_lang() == '_ro') {
						echo do_shortcode('[contact-form-7 id="333" title="Контактная форма rom"]');
					} ?>
					<?php if (get_lang() == '_ru') {
						echo do_shortcode('[contact-form-7 id="332" title="Контактная форма rus"]');
					} ?>
					<?php if (get_lang() == '_en') {
						echo do_shortcode('[contact-form-7 id="334" title="Контактная форма en"]');
					}
					?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section section-clients">
    <div class="container">
        <h2 class="section-clients-title">Наши Клиенты</h2>
        <div class="owl-carousel clients">
			<?php
			$clients = carbon_get_theme_option('crb_clients');
			?>
			<?php foreach ($clients as $client): ?>
                <div class="client"><?php echo $client['crb_clients_text']; ?></div>
			<?php endforeach; ?>
        </div>
    </div>
</div>

<div class="footer">
    <div class="container">
        <div class="row">
			<?php if (!dynamic_sidebar('sidebar-footer')): ?>
                <h1 style="color: red;">Место для сайдбара</h1>
			<?php endif; ?>

			<?php if (!dynamic_sidebar('sidebar-map')): ?>
                <h1 style="color: red;">Место для сайдбара</h1>
			<?php endif; ?>
        </div>
    </div>
</div>
<div class="footer-copyright"><?php echo carbon_get_theme_option('crb_copyright' . get_lang()); ?></div>
</div>
<div class="form-header" id="js-form-header">
    <div class="form-header__close">
        <img src="<?php echo get_template_directory_uri() . '/assets/img/close.svg'; ?>" alt="">
    </div>
    <h2 class="form-header__title"><?php echo carbon_get_theme_option('crb_form_header_title' . get_lang()); ?></h2>
    <p class="form-header__text"><?php echo carbon_get_theme_option('crb_form_header_text' . get_lang()); ?></p>
    <div class="form-header__body">
		<?php if (get_lang() == '_ru'): ?>
			<?php echo do_shortcode('[contact-form-7 id="344" title="Form header rus"]'); ?>
		<?php elseif(get_lang() == '_ro'): ?>
			<?php echo do_shortcode('[contact-form-7 id="345" title="Form header rom"]'); ?>
        <?php else: ?>
            <?php echo do_shortcode('[contact-form-7 id="346" title="Form header eng"]'); ?>
		<?php endif; ?>
    </div>
</div>
<div class="overlay" id="js-overlay"></div>
<?php wp_footer(); ?>
</body>
</html>

