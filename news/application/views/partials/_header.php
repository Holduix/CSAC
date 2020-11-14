<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="<?php echo $this->selected_lang->short_form ?>">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo xss_clean($title); ?> - <?php echo xss_clean($settings->site_title); ?></title>
		<meta name="description" content="<?php echo xss_clean($description); ?>"/>
		<meta name="keywords" content="<?php echo xss_clean($keywords); ?>"/>
		<meta name="author" content="Holduix"/>
		<meta name="robots" content="all" />
		<meta name="revisit-after" content="1 Days" />
		<link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/img/apple-touch-icon.png" />
		<meta name="msapplication-TileImage" content="<?php echo base_url(); ?>assets/img/favicon.png" />
		<meta name="msapplication-TileColor" content="#429cd6" />
		<meta name="theme-color" content="#429cd6" />
		<meta name="primary-color" content="#429cd6" />
		<meta name="secondary-color" content="#f4cc21" />
		<meta http-equiv="imagetoolbar" content="no" />		
		<meta property="og:locale" content="<?php echo $this->selected_lang->language_code ?>"/>
		<meta property="og:site_name" content="<?php echo $settings->application_name; ?>"/>
	<?php if (isset($page_type)): ?>
		<meta property="og:type" content="<?php echo $og_type; ?>"/>
		<meta property="og:title" content="<?php echo xss_clean($post->title); ?>"/>
		<meta property="og:description" content="<?php echo xss_clean($post->summary); ?>"/>
		<meta property="og:url" content="<?php echo $og_url; ?>"/>
		<meta property="og:image" content="<?php echo $og_image; ?>"/>
		<meta property="og:image:width" content="750"/>
		<meta property="og:image:height" content="415"/>
		<meta name="twitter:card" content="summary_large_image"/>
		<meta name="twitter:site" content="<?php echo $settings->application_name; ?>"/>
		<meta name="twitter:title" content="<?php echo xss_clean($post->title); ?>"/>
		<meta name="twitter:description" content="<?php echo xss_clean($post->summary); ?>"/>
		<meta name="twitter:image" content="<?php echo $og_image; ?>"/>
	<?php foreach ($og_tags as $tag): ?>
		<meta property="article:tag" content="<?php echo $tag->tag; ?>"/>
	<?php endforeach; ?>
	<?php else: ?>
		<meta property="og:image" content="<?php echo get_logo($general_settings); ?>"/>
		<meta property="og:image:width" content="180"/>
		<meta property="og:image:height" content="50"/>
		<meta property="og:type" content=website/>
		<meta property="og:title" content="<?php echo xss_clean($title); ?> - <?php echo xss_clean($settings->site_title); ?>"/>
		<meta property="og:description" content="<?php echo xss_clean($description); ?>"/>
		<meta property="og:url" content="<?php echo base_url(); ?>"/>
		<meta name="twitter:card" content="summary_large_image"/>
		<meta name="twitter:site" content="<?php echo $settings->application_name; ?>"/>
		<meta name="twitter:title" content="<?php echo xss_clean($title); ?> - <?php echo xss_clean($settings->site_title); ?>"/>
		<meta name="twitter:description" content="<?php echo xss_clean($description); ?>"/>
		<meta name="twitter:image" content="<?php echo get_logo($general_settings); ?>"/>
	<?php endif; ?>
		<link rel="canonical" href="<?php echo current_url(); ?>"/>
	<?php if ($general_settings->multilingual_system == 1):
	foreach ($languages as $language):
	if ($language->id == $site_lang->id):?>
		<link rel="alternate" hreflang="<?php echo $language->language_code ?>" href="<?php echo base_url(); ?>"/>
	<?php else: ?>
		<link rel="alternate" hreflang="<?php echo $language->language_code ?>" href="<?php echo base_url() . $language->short_form . "/"; ?>"/>
	<?php endif; endforeach; endif; ?>
	<?php if (empty($general_settings->favicon_path)): ?>
		<link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png"/>
	<?php else: ?>
		<link rel="shortcut icon" type="image/png" href="<?php echo base_url() . html_escape($general_settings->favicon_path); ?>"/>
	<?php endif; ?>
		<?php echo $primary_font_url; ?>
		<?php echo $secondary_font_url; ?>

		<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.min.js"></script>
		<script src="<?php echo base_url(); ?>themes/scripts/script.js"></script>
		<link rel="stylesheet" href="<?php echo base_url(); ?>themes/style.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>themes/css/content-box.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>themes/css/image-box.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>themes/css/animations.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>themes/css/components.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>themes/scripts/flexslider/flexslider.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>themes/scripts/php/contact-form.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>themes/css/skin.css">	
		
		<!-- Icons -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/font-icons/css/icons.min.css"/>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
		
		<!-- Slider CSS -->
		<link href="<?php echo base_url(); ?>assets/vendor/slick/slick.min.css" rel="stylesheet"/>
		<!-- Magnific Popup CSS -->
		<link href="<?php echo base_url(); ?>assets/css/magnific-popup.min.css" rel="stylesheet"/>
		<!-- Style CSS -->
		<link href="<?php echo base_url(); ?>assets/css/style-3.9.css" rel="stylesheet"/>
	<?php if ($this->general_settings->dark_mode == 1): ?>
		<link href="<?php echo base_url(); ?>assets/css/dark.min.css" rel="stylesheet"/>
	<?php endif; ?>
		<!-- Color CSS -->
	<?php if ($general_settings->site_color == '') : ?>
		<link href="<?php echo base_url(); ?>assets/css/colors/default.min.css" rel="stylesheet"/>
	<?php else : ?>
		<link href="<?php echo base_url(); ?>assets/css/colors/<?php echo html_escape($general_settings->site_color); ?>.min.css" rel="stylesheet"/>
	<?php endif; ?>
	<?php if ($selected_lang->text_direction == "rtl"): ?>
		<!-- RTL -->
		<link href="<?php echo base_url(); ?>assets/css/rtl.min.css" rel="stylesheet"/>
	<?php endif; ?>
		<?php $this->load->view('partials/_font_style'); ?>
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<!-- Jquery -->
		<?php echo $general_settings->head_code; ?>
	<?php if ($selected_lang->text_direction == "rtl"): ?>
		<script>var rtl = true;</script>
	<?php else: ?>
		<script>var rtl = false;</script>
	<?php endif; ?>
		<script>var csfr_token_name = '<?php echo $this->security->get_csrf_token_name(); ?>';var csfr_cookie_name = '<?php echo $this->config->item('csrf_cookie_name'); ?>';var base_url = '<?php echo base_url(); ?>';var is_recaptcha_enabled = false;var lang_folder = '<?php echo $this->selected_lang->folder_name; ?>';<?php if ($recaptcha_status == true): ?>is_recaptcha_enabled = true;<?php endif; ?></script>
	</head>
	<body>
		<div id="preloader"></div>
		<!-- header -->
		<header id="header" class="fixed-top scroll-change" data-menu-anima="fade-in">
			<nav class="navbar navbar-inverse mega-menu-fullwidth navbar-fixed-top" role="banner">
				<div class="navbar-mini scroll-hide">
						<div class="container">
							<div class="nav navbar-nav navbar-left">
								<span><i class="fa fa-phone"></i>1-800-405-377</span>
								<hr />
								<span><i class="fa fa-envelope"></i>info@company.com</span>
								<hr />
								<span>  <i class="fa fa-map-marker"></i>Collins Street 8007, USA</span>
								<!--<hr />
								<span><i class="fa fa-calendar"></i>Mon - Sat: 8.00 - 19:00</span>-->
							</div>
							<div class="nav navbar-nav navbar-right">
								<div class="minisocial-group">
									<a target="_blank" href="#"><i class="fa fa-facebook first"></i></a>
									<a target="_blank" href="#"><i class="fa fa-instagram"></i></a>
									<a target="_blank" href="#"><i class="fa fa-youtube"></i></a>
									<a target="_blank" href="#"><i class="fa fa-linkedin"></i></a>
								</div>
							</div>
						</div>
				</div>	
				<div class="navbar navbar-main" style="border:0">	
					<div class="container nav-container">

						<div class="navbar-header">
							<a class="navbar-brand" href="<?php echo lang_base_url(); ?>">
								<img class="logo-default" src="<?php echo get_logo($general_settings); ?>" alt="logo">
								<img class="logo-retina" src="<?php echo get_logo($general_settings); ?>" alt="logo">
							</a>
						</div>
						<?php
						$active_page = uri_string();
						if ($general_settings->site_lang != $selected_lang->id) {
							$active_page = $this->uri->segment(2);
						}

						$this->load->view("partials/_nav.php", ['active_page' => $active_page]); ?>
					</div>

				</div>
				<div class="mobile-nav-container">
						<?php $this->load->view("partials/_nav_mobile.php", ['active_page' => $active_page]); ?>
					</div>				
				<div class="modal-search">
				<?php echo form_open(lang_base_url() . 'search', ['method' => 'get']); ?>
				<div class="container">
					<input type="text" name="q" class="form-control" maxlength="300" pattern=".*\S+.*"
						placeholder="<?php echo html_escape(trans("search_exp")); ?>" required <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>>
					<i class="icon-close s-close"></i>
				</div>
				<?php echo form_close(); ?>
			</div><!-- /.modal-search -->
			</nav><!--/nav-->
			<!--search modal-->
			
		</header>
		<!-- /.header-->
		<h1 class="title-index"><?php echo html_escape($title); ?></h1>
		<div id="overlay_bg" class="overlay-bg"></div>