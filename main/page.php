<?
/**
 * page.php — Внутренняя страница шаблона
 * 
 * Универсальная страница для разделов: О компании, Услуги,
 * Информация и другие контентные страницы.
 * 
 * @package    main
 * @see        index.php — главная страница
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die("Direct access not allowed");
}

?><h1><?$APPLICATION->ShowTitle(false)?></h1>

<!-- ========================================
     WORK AREA — Рабочая область контента
     ======================================== -->
<div class="container">
	<div class="page-content">
		<?$APPLICATION->IncludeFile(
			SITE_DIR . "include/page_content.php",
			array(),
			array("MODE" => "html")
		);?>
	</div>
</div>
