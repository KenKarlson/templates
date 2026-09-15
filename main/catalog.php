<?
/**
 * catalog.php — Страница каталога/списка
 * 
 * Используется для вывода каталога товаров, списка услуг,
 * портфолио и других списочных разделов.
 * 
 * @package    main
 * @see        page.php — внутренняя страница
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die("Direct access not allowed");
}

?><h1><?$APPLICATION->ShowTitle(false)?></h1>

<!-- ========================================
     CATALOG AREA — Область каталога
     Здесь подключается компонент bitrix:catalog
     ======================================== -->
<div class="container">
	<div class="catalog">
		
		<!-- Фильтр (раскомментируйте при необходимости) -->
		<!-- <?$APPLICATION->IncludeComponent(
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
		);?> -->
		
		<!-- Список элементов -->
		<div class="catalog__list">
			<?$APPLICATION->IncludeComponent(
				"bitrix:catalog.section",
				"main",
				array(
					"IBLOCK_TYPE" => "catalog",
					"IBLOCK_ID" => "#IBLOCK_ID#",
					"SECTION_ID" => $_REQUEST["SECTION_ID"],
					"SECTION_CODE" => $_REQUEST["SECTION_CODE"],
					"ELEMENT_SORT_FIELD" => "sort",
					"ELEMENT_SORT_ORDER" => "asc",
					"PAGE_ELEMENT_COUNT" => "12",
					"LINE_ELEMENT_COUNT" => "3",
					"PROPERTY_CODE" => array(),
					"INCLUDE_SUBSECTIONS" => "Y",
					"SHOW_ALL_WO_SECTION" => "Y",
					"HIDE_NOT_AVAILABLE" => "N",
					"PRICE_CODE" => array(),
					"USE_PRICE_COUNT" => "N",
					"SHOW_PRICE_COUNT" => "1",
					"PRICE_VAT_INCLUDE" => "Y",
					"CONVERT_CURRENCY" => "N",
					"BASKET_URL" => "",
					"ACTION_VARIABLE" => "action",
					"PRODUCT_PROPS_VARIABLE" => "product_props",
					"PRODUCT_QUANTITY_VARIABLE" => "quantity",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "3600",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "Y",
				),
				false
			);?>
		</div>
		
	</div>
</div>
