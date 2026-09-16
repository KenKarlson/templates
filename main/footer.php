<?
/**
 * footer.php — Подвал сайта
 *
 * Подключается автоматически Битрикс в конце каждой страницы.
 * Закрывает теги, открытые в header.php, содержит подвал с контактами,
 * копирайтом и дополнительным меню.
 *
 * @package    main
 * @see        header.php — шапка сайта
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die("Direct access not allowed");
}

?>
		</div><!-- /.container -->
	</main>

	<!-- ========================================
	     FOOTER — Подвал сайта
	     ======================================== -->
	<footer class="footer" role="contentinfo">
		<div class="container">
			<div class="footer__inner">

				<!-- Колонка 1: Информация -->
				<div class="footer__col">
					<div class="footer__title"><?$APPLICATION->IncludeFile(
						SITE_TEMPLATE_PATH . "/include/site_name.php",
						array(),
						array("MODE" => "text")
					);?></div>
					<p class="footer__desc"><?$APPLICATION->IncludeFile(
						SITE_TEMPLATE_PATH . "/include/footer_description.php",
						array(),
						array("MODE" => "text")
					);?></p>
				</div>

				<!-- Колонка 2: Навигация -->
				<div class="footer__col">
					<h3 class="footer__title">Навигация</h3>
					<?$APPLICATION->IncludeComponent(
						"bitrix:menu",
						"footer",
						array(
							"ROOT_MENU_TYPE" => "bottom",
							"MENU_CACHE_TYPE" => "A",
							"MENU_CACHE_TIME" => "3600",
							"MENU_CACHE_USE_GROUPS" => "Y",
							"MENU_CACHE_GET_VARS" => array(),
							"MAX_LEVEL" => "1",
							"CHILD_MENU_TYPE" => "left",
							"USE_EXT" => "Y",
							"DELAY" => "N",
							"ALLOW_MULTI_SELECT" => "N",
						),
						false
					);?>
				</div>

				<!-- Колонка 3: Контакты -->
				<div class="footer__col">
					<h3 class="footer__title">Контакты</h3>
					<?$APPLICATION->IncludeFile(
						SITE_TEMPLATE_PATH . "/include/footer_contacts.php",
						array(),
						array("MODE" => "html")
					);?>
				</div>

			</div>

			<!-- Копирайт -->
			<div class="footer__copyright">
				<?$APPLICATION->IncludeFile(
					SITE_TEMPLATE_PATH . "/include/copyright.php",
					array(),
					array("MODE" => "text")
				);?>
			</div>

		</div>
	</footer>

</div><!-- /.page-wrapper -->
</body>
</html>
