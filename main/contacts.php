<?
/**
 * contacts.php — Страница контактов
 * 
 * Содержит: контактную информацию, карту, форму обратной связи.
 * 
 * @package    main
 * @see        page.php — внутренняя страница
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die("Direct access not allowed");
}

$APPLICATION->SetTitle("Контакты");

?><h1><?$APPLICATION->ShowTitle(false)?></h1>

<!-- ========================================
     CONTACTS AREA — Область контактов
     ======================================== -->
<div class="container">
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
	
	<!-- Карта (раскомментируйте при необходимости) -->
	<!-- <div class="contacts__map">
		<?$APPLICATION->IncludeFile(
			SITE_DIR . "include/contacts_map.php",
			array(),
			array("MODE" => "html")
		);?>
	</div> -->
	
</div>
