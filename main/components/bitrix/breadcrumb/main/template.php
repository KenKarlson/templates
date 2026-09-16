<?
/**
 * Шаблон компонента bitrix:breadcrumb — хлебные крошки
 *
 * ВАЖНО: компонент выводится через $APPLICATION->GetNavChain() и AddBufferContent(),
 * поэтому шаблон ОБЯЗАН вернуть строку, а не печатать её. Иначе содержимое
 * уедет в начало страницы, а на его месте появится возврат функции.
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

if (empty($arResult)) {
	return "";
}

$strReturn = '<ul class="breadcrumbs__list" itemscope itemtype="https://schema.org/BreadcrumbList">';
$position = 0;

foreach ($arResult as $arItem) {
	$position++;
	$title = htmlspecialcharsbx($arItem["TITLE"]);

	$strReturn .= '<li class="breadcrumbs__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">';

	if ($arItem["LINK"] <> "") {
		$strReturn .= '<a class="breadcrumbs__link" href="' . htmlspecialcharsbx($arItem["LINK"]) . '" itemprop="item"><span itemprop="name">' . $title . '</span></a>';
	} else {
		$strReturn .= '<span class="breadcrumbs__link" itemprop="name">' . $title . '</span>';
	}

	$strReturn .= '<meta itemprop="position" content="' . $position . '"></li>';
}

$strReturn .= '</ul>';

return $strReturn;
