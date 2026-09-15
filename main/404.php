<?
/**
 * 404.php — Страница ошибки 404
 * 
 * Отображается при попытке доступа к несуществующей странице.
 * Содержит: заголовок, описание, ссылку на главную, поиск.
 * 
 * @package    main
 * @see        page.php — внутренняя страница
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die("Direct access not allowed");
}

$APPLICATION->SetTitle("Страница не найдена");
$APPLICATION->SetStatus(404);

?><h1>Страница не найдена</h1>

<div class="container">
	<div class="error-page">

		<div class="error-page__code">404</div>

		<p class="error-page__text">
			Запрашиваемая страница не существует или была удалена.
		</p>

		<div class="error-page__actions">
			<a href="<?= SITE_DIR ?>" class="btn btn--primary">
				Вернуться на главную
			</a>

			<!-- Поиск -->
			<?$APPLICATION->IncludeComponent(
				"bitrix:search.form",
				"main",
				array(
					"PAGE" => "#SITE_DIR#search/",
				),
				false
			);?>
		</div>

		<!-- Популярные разделы -->
		<div class="error-page__links mt-xl">
			<h3>Возможно, вы искали:</h3>
			<div class="grid grid-3">
				<div class="card">
					<a href="<?= SITE_DIR ?>about/" class="card__link">
						<h4 class="card__title">О компании</h4>
					</a>
				</div>
				<div class="card">
					<a href="<?= SITE_DIR ?>services/" class="card__link">
						<h4 class="card__title">Услуги</h4>
					</a>
				</div>
				<div class="card">
					<a href="<?= SITE_DIR ?>contacts/" class="card__link">
						<h4 class="card__title">Контакты</h4>
					</a>
				</div>
			</div>
		</div>

	</div>
</div>
