/**
 * main.js — JavaScript шаблона main
 * 
 * Содержит:
 * 1. Инициализация при загрузке DOM
 * 2. Мобильное меню (бургер с анимацией и блокировкой скролла)
 * 3. Плавная прокрутка к якорям
 * 4. Эффект шапки при скролле
 * 5. Выпадающее подменю на тач-устройствах
 * 6. Ленивая загрузка изображений
 * 7. Утилиты
 * 
 * @package    main
 * @see        assets/js/ — папка для дополнительных скриптов
 * @see        README.md — полная карта шаблона
 */

(function() {
	'use strict';

	// ========================================
	// 1. ИНИЦИАЛИЗАЦИЯ ПРИ ЗАГРУЗКЕ DOM
	// ========================================

	document.addEventListener('DOMContentLoaded', function() {
		initMobileMenu();
		initSmoothScroll();
		initHeaderScroll();
		initTouchSubmenu();
		initLazyImages();
	});

	// ========================================
	// 2. МОБИЛЬНОЕ МЕНЮ
	// ========================================

	function initMobileMenu() {
		const toggle = document.querySelector('.header__mobile-toggle');
		const menu = document.querySelector('.mobile-menu');

		if (!toggle || !menu) return;

		function openMenu() {
			toggle.setAttribute('aria-expanded', 'true');
			toggle.classList.add('is-active');
			menu.classList.add('is-open');
			document.body.style.overflow = 'hidden';
			document.body.style.touchAction = 'none';
		}

		function closeMenu() {
			toggle.setAttribute('aria-expanded', 'false');
			toggle.classList.remove('is-active');
			menu.classList.remove('is-open');
			document.body.style.overflow = '';
			document.body.style.touchAction = '';
		}

		toggle.addEventListener('click', function() {
			const isOpen = menu.classList.contains('is-open');
			isOpen ? closeMenu() : openMenu();
		});

		// Закрытие при клике на ссылку
		menu.querySelectorAll('a').forEach(function(link) {
			link.addEventListener('click', closeMenu);
		});

		// Закрытие при клике вне меню
		document.addEventListener('click', function(e) {
			if (menu.classList.contains('is-open') && !menu.contains(e.target) && !toggle.contains(e.target)) {
				closeMenu();
			}
		});

		// Закрытие по Escape
		document.addEventListener('keydown', function(e) {
			if (e.key === 'Escape' && menu.classList.contains('is-open')) {
				closeMenu();
				toggle.focus();
			}
		});

		// Свайп для закрытия
		let touchStartX = 0;
		let touchStartY = 0;

		menu.addEventListener('touchstart', function(e) {
			touchStartX = e.touches[0].clientX;
			touchStartY = e.touches[0].clientY;
		}, { passive: true });

		menu.addEventListener('touchend', function(e) {
			const touchEndX = e.changedTouches[0].clientX;
			const touchEndY = e.changedTouches[0].clientY;
			const diffX = touchStartX - touchEndX;
			const diffY = Math.abs(touchStartY - touchEndY);

			// Свайп вправо для закрытия (только если горизонтальный свайп больше вертикального)
			if (diffX < -80 && diffY < 100) {
				closeMenu();
			}
		}, { passive: true });
	}

	// ========================================
	// 3. ПЛАВНАЯ ПРОКРУТКА К ЯКОРЯМ
	// ========================================

	function initSmoothScroll() {
		document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
			anchor.addEventListener('click', function(e) {
				const targetId = this.getAttribute('href');
				if (targetId === '#' || targetId.length < 2) return;

				const target = document.querySelector(targetId);
				if (!target) return;

				e.preventDefault();

				const header = document.querySelector('.header');
				const headerHeight = header ? header.offsetHeight : 0;
				const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight;

				window.scrollTo({
					top: targetPosition,
					behavior: 'smooth'
				});

				// Обновление URL без скролла
				if (history.pushState) {
					history.pushState(null, null, targetId);
				}
			});
		});
	}

	// ========================================
	// 4. ЭФФЕКТ ШАПКИ ПРИ СКРОЛЛЕ
	// ========================================

	function initHeaderScroll() {
		const header = document.querySelector('.header');
		if (!header) return;

		let lastScroll = 0;
		const threshold = 100;

		window.addEventListener('scroll', function() {
			const currentScroll = window.pageYOffset;

			// Тень при скролле
			if (currentScroll > 10) {
				header.classList.add('is-scrolled');
			} else {
				header.classList.remove('is-scrolled');
			}

			// Скрытие/показ при скролле
			if (currentScroll > lastScroll && currentScroll > threshold) {
				header.classList.add('is-hidden');
			} else {
				header.classList.remove('is-hidden');
			}

			lastScroll = currentScroll;
		}, { passive: true });
	}

	// ========================================
	// 5. ВЫПАДАЮЩЕЕ ПОДМЕНЮ НА ТАЧ-УСТРОЙСТВАХ
	// ========================================

	function initTouchSubmenu() {
		const navItems = document.querySelectorAll('.header__nav-item');

		navItems.forEach(function(item) {
			const link = item.querySelector('a');
			const submenu = item.querySelector('.header__submenu');

			if (!submenu) return;

			link.addEventListener('click', function(e) {
				// Только для тач-устройств
				if ('ontouchstart' in window || navigator.maxTouchPoints > 0) {
					const isOpen = item.classList.contains('is-open');

					// Закрыть все другие подменю
					navItems.forEach(function(otherItem) {
						if (otherItem !== item) {
							otherItem.classList.remove('is-open');
						}
					});

					if (isOpen) {
						item.classList.remove('is-open');
					} else {
						item.classList.add('is-open');
						e.preventDefault();
					}
				}
			});
		});

		// Закрытие подменю при клике вне
		document.addEventListener('click', function(e) {
			if (!e.target.closest('.header__nav-item')) {
				navItems.forEach(function(item) {
					item.classList.remove('is-open');
				});
			}
		});
	}

	// ========================================
	// 6. ЛЕНИВАЯ ЗАГРУЗКА ИЗОБРАЖЕНИЙ
	// ========================================

	function initLazyImages() {
		if ('IntersectionObserver' in window) {
			const lazyImages = document.querySelectorAll('img[data-src]');

			const imageObserver = new IntersectionObserver(function(entries) {
				entries.forEach(function(entry) {
					if (entry.isIntersecting) {
						const img = entry.target;
						img.src = img.dataset.src;
						img.removeAttribute('data-src');
						imageObserver.unobserve(img);
					}
				});
			}, {
				rootMargin: '50px 0px'
			});

			lazyImages.forEach(function(img) {
				imageObserver.observe(img);
			});
		}
	}

	// ========================================
	// 7. УТИЛИТЫ (экспорт для использования в других скриптах)
	// ========================================

	window.MainTemplate = {
		/**
		 * Получить CSRF-токен Битрикс
		 * @returns {string|null}
		 */
		getBitrixToken: function() {
			const input = document.querySelector('input[name="bitrix_sessid"]');
			return input ? input.value : null;
		},

		/**
		 * Показать/скрыть элемент
		 * @param {HTMLElement} el
		 * @param {boolean} show
		 */
		toggleElement: function(el, show) {
			if (show === undefined) {
				el.classList.toggle('hidden');
			} else if (show) {
				el.classList.remove('hidden');
			} else {
				el.classList.add('hidden');
			}
		},

		/**
		 * Debounce для обработчиков событий
		 * @param {Function} func
		 * @param {number} wait
		 * @returns {Function}
		 */
		debounce: function(func, wait) {
			let timeout;
			return function executedFunction() {
				const context = this;
				const args = arguments;
				clearTimeout(timeout);
				timeout = setTimeout(function() {
					func.apply(context, args);
				}, wait);
			};
		},

		/**
		 * Throttle для обработчиков событий
		 * @param {Function} func
		 * @param {number} limit
		 * @returns {Function}
		 */
		throttle: function(func, limit) {
			let inThrottle;
			return function executedFunction() {
				const context = this;
				const args = arguments;
				if (!inThrottle) {
					func.apply(context, args);
					inThrottle = true;
					setTimeout(function() {
						inThrottle = false;
					}, limit);
				}
			};
		}
	};

})();
