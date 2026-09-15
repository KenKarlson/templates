<?
/**
 * index.php — Главная страница (референс)
 *
 * ВНИМАНИЕ: физические страницы в 1С-Битрикс лежат в корне сайта,
 * а не в папке шаблона. Этот файл — образец для копирования в корень
 * (например /index.php). В папке шаблона он Битриксом не используется.
 *
 * @package    main
 * @see        page.php — внутренняя страница
 * @see        catalog.php — страница каталога
 * @see        contacts.php — страница контактов
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die("Direct access not allowed");
}

$APPLICATION->SetTitle("Главная страница");
$APPLICATION->SetPageProperty("keywords", "ключевые слова главной страницы");
$APPLICATION->SetPageProperty("description", "Описание главной страницы для поисковых систем");

?>
<div class="container">
	<h1><?$APPLICATION->ShowTitle(false)?></h1>
</div>

<!-- ========================================
     WORK AREA — Рабочая область контента
     ======================================== -->
<div class="page-content">
	<?$APPLICATION->IncludeFile(
		SITE_DIR . "include/index_hero.php",
		array(),
		array("MODE" => "html")
	);?>
</div>

<div class="container">
	<div class="page-content">
		<?$APPLICATION->IncludeFile(
			SITE_DIR . "include/index_content.php",
			array(),
			array("MODE" => "html")
		);?>
	</div>
</div>

<!-- ========================================
     ДОПОЛНИТЕЛЬНЫЕ СЕКЦИИ (раскомментируйте при необходимости)
     ======================================== -->

<!-- Секция преимуществ -->
<!-- <?$APPLICATION->IncludeFile(
	SITE_DIR . "include/index_advantages.php",
	array(),
	array("MODE" => "html")
);?> -->

<!-- Секция этапов работы -->
<!-- <?$APPLICATION->IncludeFile(
	SITE_DIR . "include/index_stages.php",
	array(),
	array("MODE" => "html")
);?> -->

<!-- Секция партнеров -->
<!-- <?$APPLICATION->IncludeFile(
	SITE_DIR . "include/index_partners.php",
	array(),
	array("MODE" => "html")
);?> -->
