<?
/**
 * contacts.php — Страница контактов (референс)
 *
 * ВНИМАНИЕ: физические страницы в 1С-Битрикс лежат в корне сайта,
 * а не в папке шаблона. Этот файл — образец для копирования в корень
 * (например /contacts/index.php). В папке шаблона Битриксом не используется.
 *
 * @package    main
 * @see        page.php — внутренняя страница
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die("Direct access not allowed");
}

$APPLICATION->SetTitle("Контакты");

?>
<div class="container">
	<h1><?$APPLICATION->ShowTitle(false)?></h1>

	<!-- ========================================
	     CONTACTS AREA — Область контактов
	     ======================================== -->
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
					"OK_TEXT" => "Спасибо, ваше сообщение отправлено!",
					"EMAIL_TO" => "info@example.com",
					"REQUIRED_FIELDS" => array("NAME", "EMAIL", "MESSAGE"),
					"EVENT_MESSAGE_ID" => array(),
				),
				false
			);?>
		</div>

	</div>
</div>
