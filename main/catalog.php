<?
/**
 * catalog.php — Страница каталога/списка (референс)
 *
 * ВНИМАНИЕ: физические страницы в 1С-Битрикс лежат в корне сайта,
 * а не в папке шаблона. Этот файл — образец для копирования в корень
 * раздела (например /catalog/index.php). В папке шаблона Битриксом не используется.
 *
 * Контейнер указан и здесь, и в шаблоне. Двойных отступов не будет —
 * в CSS есть защита .container .container.
 *
 * @package    main
 * @see        page.php — внутренняя страница
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die("Direct access not allowed");
}

?>
<div class="container">
	<h1><?$APPLICATION->ShowTitle(false)?></h1>

	<!-- ========================================
	     CATALOG AREA — Область каталога
	     ======================================== -->
	<div class="catalog">

		<!-- Фильтр (чтобы включить — уберите /* и */) -->
		<?/*
		$APPLICATION->IncludeComponent(
			"bitrix:catalog.filter",
			"main",
			array(
				"IBLOCK_TYPE" => "catalog",
				"IBLOCK_ID" => "#IBLOCK_ID#",
				"FILTER_NAME" => "arrFilter",
				"FIELD_CODE" => array(),
				"PROPERTY_CODE" => array(),
				"PRICE_CODE" => array(),
				"CACHE_TYPE" => "A",
				"CACHE_TIME" => "3600",
			),
			false
		);
		*/?>

		<!-- Список элементов -->
		<?$APPLICATION->IncludeComponent(
			"bitrix:catalog.section",
			"main",
			array(
				"IBLOCK_TYPE" => "catalog",
				"IBLOCK_ID" => "#IBLOCK_ID#",
				"SECTION_ID" => $_REQUEST["SECTION_ID"] ?? "",
				"SECTION_CODE" => $_REQUEST["SECTION_CODE"] ?? "",
				"ELEMENT_SORT_FIELD" => "sort",
				"ELEMENT_SORT_ORDER" => "asc",
				"PAGE_ELEMENT_COUNT" => "12",
				"LINE_ELEMENT_COUNT" => "3",
				"PROPERTY_CODE" => array(),
				"INCLUDE_SUBSECTIONS" => "Y",
				"SHOW_ALL_WO_SECTION" => "Y",
				"PRICE_CODE" => array(),
				"USE_PRICE_COUNT" => "N",
				"CONVERT_CURRENCY" => "N",
				"BASKET_URL" => "",
				"ACTION_VARIABLE" => "action",
				"CACHE_TYPE" => "A",
				"CACHE_TIME" => "3600",
				"CACHE_FILTER" => "N",
				"CACHE_GROUPS" => "Y",
			),
			false
		);?>

	</div>
</div>
