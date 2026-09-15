<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>

<?if (!empty($arResult)):?>
<ul class="footer__nav-list">
<?foreach ($arResult as $arItem):?>
	<?if ($arItem["PERMISSION"] > "D"):?>
	<li><a href="<?=htmlspecialcharsbx($arItem["LINK"])?>" class="footer__link<?if ($arItem["SELECTED"]):?> is-active<?endif?>"><?=htmlspecialcharsbx($arItem["TEXT"])?></a></li>
	<?else:?>
	<li><span class="footer__link is-disabled" title="Доступ запрещен"><?=htmlspecialcharsbx($arItem["TEXT"])?></span></li>
	<?endif?>
<?endforeach?>
</ul>
<?endif?>
