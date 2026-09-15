<?
/**
 * index.php — Главная страница шаблона
 * 
 * Точка входа для главной страницы сайта.
 * Контент управляется через визуальный редактор Битрикс или компоненты.
 * 
 * @package    main
 * @see        page.php — внутренняя страница
 * @see        catalog.php — страница каталога
 * @see        contacts.php — страница контактов
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die("Direct access not allowed");
}

// ========================================
// СВОЙСТВА СТРАНИЦЫ (можно менять в админке)
// ========================================

$APPLICATION->SetTitle("Главная страница");
$APPLICATION->SetPageProperty("keywords", "ключевые слова главной страницы");
$APPLICATION->SetPageProperty("description", "Описание главной страницы для поисковых систем");

?><h1><?$APPLICATION->ShowTitle(false)?></h1>

<!-- ========================================
     WORK AREA — Рабочая область контента
     Контент страницы (редактируется в админке)
     ======================================== -->
<?$APPLICATION->IncludeFile(
	SITE_DIR . "include/index_hero.php",
	array(),
	array("MODE" => "html")
);?>

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

<!-- Форма обратной связи -->
<!-- <?$APPLICATION->IncludeFile(
	SITE_DIR . "include/index_contact_form.php",
	array(),
	array("MODE" => "html")
);?> -->
