<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>

<?
/**
 * Минимальный шаблон компонента bitrix:catalog.section.
 *
 * Выводит список товаров сеткой карточек. Это заготовка — дополните её
 * ценой, кнопкой «в корзину», свойствами и т.д. под конкретный проект.
 *
 * @package    main
 */
?>

<?if (empty($arResult["ITEMS"])):?>

	<p class="text-muted">Ничего не найдено.</p>

<?else:?>

	<div class="grid grid-3">
		<?foreach ($arResult["ITEMS"] as $arItem):?>

			<?
			// Картинка может прийти и массивом, и ID файла
			$picture = "";
			if (!empty($arItem["PREVIEW_PICTURE"])) {
				if (is_array($arItem["PREVIEW_PICTURE"])) {
					$picture = $arItem["PREVIEW_PICTURE"]["SRC"];
				} elseif (is_numeric($arItem["PREVIEW_PICTURE"])) {
					$picture = CFile::GetPath($arItem["PREVIEW_PICTURE"]);
				}
			}
			?>

			<div class="card card--interactive">
				<a class="card__link" href="<?=htmlspecialcharsbx($arItem["DETAIL_PAGE_URL"])?>">
					<?if ($picture):?>
						<div class="card__image">
							<img src="<?=htmlspecialcharsbx($picture)?>" alt="<?=htmlspecialcharsbx($arItem["NAME"])?>">
						</div>
					<?endif?>
					<h3 class="card__title"><?=htmlspecialcharsbx($arItem["NAME"])?></h3>
				</a>
			</div>

		<?endforeach?>
	</div>

	<?if (!empty($arResult["NAV_STRING"])):?>
		<nav class="pagination" aria-label="Постраничная навигация"><?=$arResult["NAV_STRING"]?></nav>
	<?endif?>

<?endif?>
