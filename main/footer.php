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

if (!defined("B_AREA") && !isset($stop)) {
	// ========================================
	// ЗАКРЫТИЕ РАБОЧЕЙ ОБЛАСТИ
	// ========================================
?>
	</main>
	
	<!-- ========================================
	     INCLUDE — Включаемая область перед подвалом
	     ======================================== -->
	<?$APPLICATION->IncludeFile(
		SITE_DIR . "include/footer_area.php",
		array(),
		array("MODE" => "html")
	);?>
	
	<!-- ========================================
	     FOOTER — Подвал сайта
	     ======================================== -->
	<footer class="footer" role="contentinfo">
		<div class="container">
			<div class="footer__inner">
				
				<!-- Колонка 1: Информация -->
				<div class="footer__col footer__col--info">
					<h3 class="footer__title"><?$APPLICATION->IncludeFile(
						SITE_DIR . "include/site_name.php",
						array(),
						array("MODE" => "html")
					);?></h3>
					<p class="footer__desc">Описание компании или сайта</p>
				</div>
				
				<!-- Колонка 2: Навигация -->
				<div class="footer__col footer__col--nav">
					<h3 class="footer__title">Навигация</h3>
					<ul class="footer__nav-list">
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
					</ul>
				</div>
				
				<!-- Колонка 3: Контакты -->
				<div class="footer__col footer__col--contacts">
					<h3 class="footer__title">Контакты</h3>
					<ul class="footer__contacts-list">
						<?$APPLICATION->IncludeFile(
							SITE_DIR . "include/footer_contacts.php",
							array(),
							array("MODE" => "html")
						);?>
					</ul>
				</div>
				
			</div>
			
			<!-- Копирайт -->
			<div class="footer__copyright">
				<?$APPLICATION->IncludeFile(
					SITE_DIR . "include/copyright.php",
					array(),
					array("MODE" => "html")
				);?>
			</div>
			
		</div>
	</footer>
	
</div><!-- /.page-wrapper -->

<?
	// ========================================
	// СЧЕТЧИКИ И АНАЛИТИКА
	// ========================================
?>

<!-- Яндекс.Метрика (раскомментируйте и вставьте ID) -->
<!-- <?$APPLICATION->IncludeFile(
	SITE_DIR . "include/analytics.php",
	array(),
	array("MODE" => "html")
);?> -->

</body>
</html>

<?
}
?>
