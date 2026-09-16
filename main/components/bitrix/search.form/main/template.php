<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>

<form class="search-form" action="<?=htmlspecialcharsbx($arResult["FORM_ACTION"])?>" method="get">
	<div class="search-form__row">
		<label class="sr-only" for="search-input">Поиск по сайту</label>
		<input class="form-input search-form__input" type="text" id="search-input" name="q"
			placeholder="Поиск по сайту" value="<?=htmlspecialcharsbx($_REQUEST["q"] ?? "")?>">
		<button type="submit" name="s" class="btn btn--primary">Найти</button>
	</div>
</form>
