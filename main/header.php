<?
/**
 * header.php — Шапка сайта
 * 
 * Подключается автоматически Битрикс в начале каждой страницы.
 * Содержит: мета-теги, подключение стилей/скриптов, шапку с логотипом и меню.
 * 
 * ПЕРЕМЕННЫЕ:
 * $SITE_NAME    — Название сайта (из настроек)
 * $SITE_EMAIL  — Email сайта (из настроек)
 * $TEMPLATE_PATH — Путь к папке шаблона
 * 
 * @package    main
 * @see        footer.php — подвал сайта
 * @see        styles.css — базовые стили шаблона
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die("Direct access not allowed");
}

use Bitrix\Main\Page\Asset;

// ========================================
// ПУТИ К РЕСУРСАМ ШАБЛОНА
// ========================================

$TEMPLATE_PATH = SITE_TEMPLATE_PATH;          // /bitrix/templates/main
$ASSETS_PATH   = $TEMPLATE_PATH . '/assets';  // /bitrix/templates/main/assets
$CSS_PATH      = $ASSETS_PATH . '/css';       // /bitrix/templates/main/assets/css
$JS_PATH       = $ASSETS_PATH . '/js';        // /bitrix/templates/main/assets/js
$IMG_PATH      = $ASSETS_PATH . '/img';       // /bitrix/templates/main/assets/img

// ========================================
// НАСТРОЙКИ СТРАНИЦЫ (из .section.php и свойств страницы)
// ========================================

global $APPLICATION;

$PAGE_TITLE    = $APPLICATION->GetTitle();           // Заголовок страницы
$PAGE_KEYWORDS = $APPLICATION->GetProperty("keywords");
$PAGE_DESC     = $APPLICATION->GetProperty("description");

// Название сайта (из настроек сайта или включаяемой области)
$SITE_NAME = COption::GetOptionString("main", "site_name", "Мой сайт");

// ========================================
// ПОДКЛЮЧЕНИЕ CSS И JS ЧЕРЕЗ БИТРИКС ASSET
// ========================================

// Базовые стили шаблона
$APPLICATION->SetAdditionalCSS($CSS_PATH . '/styles.css');

// Дополнительные стили (раскомментируйте при необходимости)
// $APPLICATION->SetAdditionalCSS($CSS_PATH . '/components.css');
// $APPLICATION->SetAdditionalCSS($CSS_PATH . '/custom.css');

// Базовый JavaScript
$APPLICATION->AddHeadScript($JS_PATH . '/main.js');

// Дополнительные скрипты (раскомментируйте при необходимости)
// $APPLICATION->AddHeadScript($JS_PATH . '/utils.js');

// ========================================
// META-ТЕГИ
// ========================================

?><!DOCTYPE html>
<html lang="<?= LANGUAGE_ID ?>">
<head>
	<meta charset="<?= SITE_CHARSET ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<?$APPLICATION->ShowHead();?>
	
	<title><?$APPLICATION->ShowTitle()?></title>
</head>
<body>
<?$APPLICATION->ShowPanel()?>

<div class="page-wrapper">
	
	<!-- ========================================
	     HEADER — Шапка сайта
	     ======================================== -->
	<header class="header" role="banner">
		<div class="container">
			<div class="header__inner">
				
				<!-- Логотип -->
				<a href="<?= SITE_DIR ?>" class="header__logo" aria-label="На главную">
					<img src="<?= $IMG_PATH ?>/logo.svg" alt="<?= $SITE_NAME ?>" width="150" height="40">
				</a>
				
				<!-- Главное меню -->
				<nav class="header__nav" role="navigation" aria-label="Главное меню">
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
				
				<!-- Кнопка мобильного меню -->
				<button class="header__mobile-toggle" aria-label="Открыть меню" aria-expanded="false">
					<span class="header__mobile-toggle-icon"></span>
				</button>
				
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
	<div class="mobile-menu" role="dialog" aria-label="Мобильное меню" aria-hidden="true">
		<nav class="mobile-menu__nav">
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
				SITE_DIR . "include/mobile_contacts.php",
				array(),
				array("MODE" => "html")
			);?>
		</div>
	</div>

	<!-- ========================================
	     WORK_AREA — Рабочая область (контент страницы)
	     ======================================== -->
	<main class="main-content" role="main">
