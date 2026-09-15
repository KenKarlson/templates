<?
/**
 * header.php — Шапка сайта
 *
 * Подключается автоматически Битрикс в начале каждой страницы.
 * Содержит: мета-теги, подключение стилей/скриптов, шапку с логотипом и меню.
 *
 * ПЕРЕМЕННЫЕ:
 * $TEMPLATE_PATH — путь к папке шаблона
 * $ASSETS_PATH   — путь к папке assets
 * $CSS_PATH      — путь к папке стилей
 * $JS_PATH       — путь к папке скриптов
 * $IMG_PATH      — путь к папке картинок
 * $SITE_NAME     — название сайта
 *
 * @package    main
 * @see        footer.php — подвал сайта
 * @see        assets/css/styles.css — стили шаблона
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die("Direct access not allowed");
}

use Bitrix\Main\Page\Asset;

// ========================================
// ПУТИ К РЕСУРСАМ ШАБЛОНА
// ========================================

$TEMPLATE_PATH = SITE_TEMPLATE_PATH;          // /local/templates/main
$ASSETS_PATH   = $TEMPLATE_PATH . '/assets';  // /local/templates/main/assets
$CSS_PATH      = $ASSETS_PATH . '/css';       // /local/templates/main/assets/css
$JS_PATH       = $ASSETS_PATH . '/js';        // /local/templates/main/assets/js
$IMG_PATH      = $ASSETS_PATH . '/img';       // /local/templates/main/assets/img

// ========================================
// НАЗВАНИЕ САЙТА
// ========================================

$SITE_NAME = defined("SITE_NAME") ? SITE_NAME : "Мой сайт";

// ========================================
// ПОДКЛЮЧЕНИЕ CSS И JS
// ========================================

// Базовые стили шаблона
Asset::getInstance()->addCss($CSS_PATH . '/styles.css');

// Дополнительные стили (раскомментируйте при необходимости)
// Asset::getInstance()->addCss($CSS_PATH . '/custom.css');

// Базовый JavaScript
Asset::getInstance()->addJs($JS_PATH . '/main.js');

// Дополнительные скрипты (раскомментируйте при необходимости)
// Asset::getInstance()->addJs($JS_PATH . '/utils.js');

// ========================================
// OPEN GRAPH (для соцсетей и мессенджеров)
// ========================================

$OG_TITLE       = $APPLICATION->GetProperty("og_title") ?: $APPLICATION->GetTitle();
$OG_DESCRIPTION = $APPLICATION->GetProperty("og_description") ?: $APPLICATION->GetProperty("description");
$OG_IMAGE       = $APPLICATION->GetProperty("og_image");

// ========================================
// META-ТЕГИ
// ========================================

?><!DOCTYPE html>
<html lang="<?= LANGUAGE_ID ?>">
<head>
	<script>
		/* Применяем сохраненную тему и размер шрифта до отрисовки (без мигания) */
		(function(){try{var d=document.documentElement,t=localStorage.getItem('main-theme'),f=localStorage.getItem('main-font-size');if(t==='dark'||t==='light'){d.classList.add(t);}else{d.classList.add(window.matchMedia('(prefers-color-scheme: dark)').matches?'dark':'light');}d.classList.add('font-size-'+(f==='small'||f==='large'?f:'normal'));}catch(e){}})();
	</script>
	<meta charset="<?= LANG_CHARSET ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="theme-color" content="#2563eb">

	<!-- Иконка сайта -->
	<link rel="icon" type="image/svg+xml" href="<?= $IMG_PATH ?>/favicon.svg">

	<!-- Open Graph -->
	<meta property="og:type" content="website">
	<meta property="og:title" content="<?= htmlspecialcharsbx($OG_TITLE) ?>">
	<? if ($OG_DESCRIPTION): ?>
	<meta property="og:description" content="<?= htmlspecialcharsbx($OG_DESCRIPTION) ?>">
	<? endif; ?>
	<? if ($OG_IMAGE): ?>
	<meta property="og:image" content="<?= htmlspecialcharsbx($OG_IMAGE) ?>">
	<? endif; ?>

	<title><?$APPLICATION->ShowTitle()?></title>
	<?$APPLICATION->ShowHead()?>
</head>
<body>
<?$APPLICATION->ShowPanel()?>

<!-- Ссылка для быстрого перехода к контенту (доступность) -->
<a href="#content" class="skip-link">Перейти к содержанию</a>

<div class="page-wrapper">

	<!-- ========================================
	     HEADER — Шапка сайта
	     ======================================== -->
	<header class="header" role="banner">
		<div class="container">
			<div class="header__inner">

				<!-- Логотип -->
				<a href="<?= SITE_DIR ?>" class="header__logo" aria-label="На главную">
					<img src="<?= $IMG_PATH ?>/logo.svg" alt="<?= htmlspecialcharsbx($SITE_NAME) ?>" width="150" height="40">
				</a>

				<div class="header__right">

					<!-- Главное меню -->
					<nav class="header__nav" aria-label="Главное меню">
						<?$APPLICATION->IncludeComponent(
							"bitrix:menu",
							"main",
							array(
								"ROOT_MENU_TYPE" => "top",
								"MENU_CACHE_TYPE" => "A",
								"MENU_CACHE_TIME" => "3600",
								"MENU_CACHE_USE_GROUPS" => "Y",
								"MENU_CACHE_GET_VARS" => array(),
								"MAX_LEVEL" => "2",
								"CHILD_MENU_TYPE" => "left",
								"USE_EXT" => "Y",
								"DELAY" => "N",
								"ALLOW_MULTI_SELECT" => "N",
							),
							false
						);?>
					</nav>

					<!-- Инструменты: размер шрифта и переключение темы -->
					<div class="header__tools">

						<!-- Размер шрифта: А А А -->
						<div class="font-size" role="group" aria-label="Размер шрифта">
							<button type="button" class="font-size__btn" data-font-size="small" aria-label="Маленький шрифт" aria-pressed="false">А</button>
							<button type="button" class="font-size__btn is-active" data-font-size="normal" aria-label="Обычный шрифт" aria-pressed="true">А</button>
							<button type="button" class="font-size__btn" data-font-size="large" aria-label="Большой шрифт" aria-pressed="false">А</button>
						</div>

						<!-- Переключение светлой/темной темы -->
						<button type="button" class="theme-toggle" data-theme-toggle aria-label="Переключить тему" aria-pressed="false">
							<svg class="theme-toggle__icon theme-toggle__moon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
								<path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
							</svg>
							<svg class="theme-toggle__icon theme-toggle__sun" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
								<circle cx="12" cy="12" r="4"/>
								<path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"/>
							</svg>
						</button>

					</div>

					<!-- Кнопка мобильного меню -->
					<button class="header__mobile-toggle" aria-label="Открыть меню" aria-expanded="false" aria-controls="mobile-menu">
						<span class="header__mobile-toggle-icon"></span>
					</button>

				</div>

			</div>
		</div>
	</header>

	<!-- ========================================
	     BREADCRUMBS — Навигационная цепочка
	     ======================================== -->
	<nav class="breadcrumbs" aria-label="Навигация">
		<div class="container">
			<?$APPLICATION->IncludeComponent(
				"bitrix:breadcrumb",
				"main",
				array(
					"START_FROM" => "0",
					"PATH" => "",
					"SITE_ID" => "-",
					"SHOW_WHEN_NO_MENU" => "N",
				),
				false
			);?>
		</div>
	</nav>

	<!-- ========================================
	     MOBILE MENU — Мобильное меню
	     ======================================== -->
	<div class="mobile-menu" id="mobile-menu" aria-hidden="true">
		<nav class="mobile-menu__nav" aria-label="Мобильное меню">
			<?$APPLICATION->IncludeComponent(
				"bitrix:menu",
				"mobile",
				array(
					"ROOT_MENU_TYPE" => "top",
					"MENU_CACHE_TYPE" => "A",
					"MENU_CACHE_TIME" => "3600",
					"MENU_CACHE_USE_GROUPS" => "Y",
					"MENU_CACHE_GET_VARS" => array(),
					"MAX_LEVEL" => "2",
					"CHILD_MENU_TYPE" => "left",
					"USE_EXT" => "Y",
					"DELAY" => "N",
					"ALLOW_MULTI_SELECT" => "N",
				),
				false
			);?>
		</nav>

		<!-- Контакты в мобильном меню -->
		<div class="mobile-menu__contacts">
			<?$APPLICATION->IncludeFile(
				SITE_TEMPLATE_PATH . "/include/mobile_contacts.php",
				array(),
				array("MODE" => "html")
			);?>
		</div>
	</div>

	<!-- ========================================
	     WORK_AREA — Рабочая область (контент страницы)
	     ======================================== -->
	<main class="main-content" id="content" role="main">
