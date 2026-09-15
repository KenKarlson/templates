<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>

<?if (!empty($arResult)):?>
<ul class="mobile-menu__list">
<?
$previousLevel = 0;
foreach ($arResult as $arItem):

	// Закрываем вложенные списки при возврате на верхний уровень
	if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel) {
		echo str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));
	}

	if ($arItem["IS_PARENT"]):
?>
	<li>
		<a href="<?=htmlspecialcharsbx($arItem["LINK"])?>" class="mobile-menu__link<?if ($arItem["SELECTED"]):?> is-active<?endif?>"><?=htmlspecialcharsbx($arItem["TEXT"])?></a>
		<ul>
<?	else:
		if ($arItem["PERMISSION"] > "D"):
?>
	<li><a href="<?=htmlspecialcharsbx($arItem["LINK"])?>" class="mobile-menu__link<?if ($arItem["SELECTED"]):?> is-active<?endif?>"><?=htmlspecialcharsbx($arItem["TEXT"])?></a></li>
<?		else: ?>
	<li><span class="mobile-menu__link is-disabled" title="Доступ запрещен"><?=htmlspecialcharsbx($arItem["TEXT"])?></span></li>
<?		endif;
	endif;

	$previousLevel = $arItem["DEPTH_LEVEL"];
endforeach;

if ($previousLevel > 1) {
	echo str_repeat("</ul></li>", ($previousLevel - 1));
}
?>
</ul>
<?endif?>
