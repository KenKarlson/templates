<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>

<?if (!empty($arResult)):?>
<ul class="breadcrumbs__list" itemscope itemtype="https://schema.org/BreadcrumbList">
<?
$position = 0;
foreach ($arResult as $arItem):
	$position++;
?>
	<li class="breadcrumbs__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
		<?if ($arItem["LINK"] <> ""):?>
			<a class="breadcrumbs__link" href="<?=htmlspecialcharsbx($arItem["LINK"])?>" itemprop="item">
				<span itemprop="name"><?=htmlspecialcharsbx($arItem["TITLE"])?></span>
			</a>
		<?else:?>
			<span class="breadcrumbs__link" itemprop="name"><?=htmlspecialcharsbx($arItem["TITLE"])?></span>
		<?endif?>
		<meta itemprop="position" content="<?=$position?>">
	</li>
<?endforeach?>
</ul>
<?endif?>
