<?
/**
 * contacts.php — Страница контактов (референс)
 *
 * ВНИМАНИЕ: физические страницы в 1С-Битрикс лежат в корне сайта,
 * а не в папке шаблона. Этот файл — образец для копирования в корень
 * (например /contacts/index.php). В папке шаблона Битриксом не используется.
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

$APPLICATION->SetTitle("Контакты");
$APPLICATION->SetPageProperty("description", "Страница контактов, обратная связь.");

?>
<div class="container">
	<h1><?$APPLICATION->ShowTitle(false)?></h1>

	<div class="contacts">

		<!-- Контактная информация -->
		<div class="contacts__info">
			<?$APPLICATION->IncludeFile(
				SITE_DIR . "include/contacts_info.php",
				array(),
				array("MODE" => "html")
			);?>
		</div>

		<!-- Форма обратной связи -->
		<div class="contacts__form">
			<?$APPLICATION->IncludeComponent(
				"bitrix:main.feedback",
				"main",
				array(
					"OK_TEXT" => "Ваше сообщение отправлено!",
					"EMAIL_TO" => COption::GetOptionString("main", "email_from"),
					"EVENT_MESSAGE_ID" => array("7"),
					"REQUIRED_FIELDS" => array("NAME", "EMAIL", "MESSAGE"),
					"USE_CAPTCHA" => "Y",
				),
				false
			);?>
		</div>

	</div>
</div>
