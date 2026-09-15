<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>

<?if (!empty($arResult)):?>
<ul class="header__nav-list">
<?
$previousLevel = 0;
foreach ($arResult as $arItem):

	// Закрываем вложенные списки при возврате на верхний уровень
	if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel) {
		echo str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));
	}

	if ($arItem["IS_PARENT"]):
		if ($arItem["DEPTH_LEVEL"] == 1):
?>
	<li class="header__nav-item<?if ($arItem["SELECTED"]):?> is-active<?endif?>">
		<a href="<?=htmlspecialcharsbx($arItem["LINK"])?>" class="header__nav-link"><?=htmlspecialcharsbx($arItem["TEXT"])?></a>
		<ul class="header__submenu">
<?		else: ?>
	<li><a href="<?=htmlspecialcharsbx($arItem["LINK"])?>" class="header__submenu-link"><?=htmlspecialcharsbx($arItem["TEXT"])?></a>
		<ul class="header__submenu">
<?		endif;
	else:
		if ($arItem["PERMISSION"] > "D"):
			if ($arItem["DEPTH_LEVEL"] == 1):
?>
	<li class="header__nav-item<?if ($arItem["SELECTED"]):?> is-active<?endif?>"><a href="<?=htmlspecialcharsbx($arItem["LINK"])?>" class="header__nav-link"><?=htmlspecialcharsbx($arItem["TEXT"])?></a></li>
<?			else: ?>
	<li><a href="<?=htmlspecialcharsbx($arItem["LINK"])?>" class="header__submenu-link"><?=htmlspecialcharsbx($arItem["TEXT"])?></a></li>
<?			endif;
		else:
			if ($arItem["DEPTH_LEVEL"] == 1):
?>
	<li class="header__nav-item"><span class="header__nav-link is-disabled" title="Доступ запрещен"><?=htmlspecialcharsbx($arItem["TEXT"])?></span></li>
<?			else: ?>
	<li><span class="header__submenu-link is-disabled" title="Доступ запрещен"><?=htmlspecialcharsbx($arItem["TEXT"])?></span></li>
<?			endif;
		endif;
	endif;

	$previousLevel = $arItem["DEPTH_LEVEL"];
endforeach;

if ($previousLevel > 1) {
	echo str_repeat("</ul></li>", ($previousLevel - 1));
}
?>
</ul>
<?endif?>
