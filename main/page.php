<?
/**
 * page.php — Внутренняя страница (референс)
 *
 * ВНИМАНИЕ: физические страницы в 1С-Битрикс лежат в корне сайта,
 * а не в папке шаблона. Этот файл — образец для копирования в корень
 * раздела (например /about/index.php). В папке шаблона Битриксом не используется.
 *
 * @package    main
 * @see        index.php — главная страница
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die("Direct access not allowed");
}

?>
<div class="container">
	<h1><?$APPLICATION->ShowTitle(false)?></h1>

	<!-- ========================================
	     WORK AREA — Рабочая область контента
	     ======================================== -->
	<div class="page-content">
		<?$APPLICATION->IncludeFile(
			SITE_DIR . "include/page_content.php",
			array(),
			array("MODE" => "html")
		);?>
	</div>
</div>
