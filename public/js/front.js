// Hide Header on on scroll down
var didScroll;
var lastScrollTop = 0;
var delta = 1;
var navbarHeight = $('header').outerHeight();

$(window).scroll(function(event){
	didScroll = true;
});

$(window).load(function() {
	isHome()
	setInterval(function() {
		if (didScroll) {
			hasScrolled();
			didScroll = false;
		}
	}, 250);

	function isHome(){
		if($('body').hasClass('home')){
			if ($(this).scrollTop() > $(window).height() - 56){
				$('header .navbar').css({
					'background-color': '#fff'})
				$('header .navbar li a').css({
					'color': '#444'})
				$('header .navbar-brand').css({
					'color': '#444'})
			}else{
				$('header .navbar').css({
					'background-color': 'transparent'})
				$('header .navbar li a').css({
					'color': '#fff'})
				$('header .navbar-brand').css({
					'color': '#fff'})
			}
		}
	}

	function hasScrolled() {
		var st = $(this).scrollTop();

		if(Math.abs(lastScrollTop - st) <= delta)
			return;
		if (st > lastScrollTop && st > navbarHeight){
        // Scroll Down
        $('header').removeClass('nav-down').addClass('nav-up');
    } else {
        // Scroll Up
        if(st + $(window).height() < $(document).height()) {
        	$('header').removeClass('nav-up').addClass('nav-down');
        }
    }

    lastScrollTop = st;
    isHome()
}	
});

$(document).ready(function() {
	$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
		if (!$(this).next().hasClass('show')) {
			$(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
		}
		var $subMenu = $(this).next(".dropdown-menu");
		$subMenu.toggleClass('show');

		$(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
			$('.dropdown-submenu .show').removeClass("show");
		});
		return false;
	});

	// $('.select2').select2({
	// 	placeholder: "Pilih...",
	// 	allowClear: true
	// });
	// $('.select2-sidebar-dokter').select2({
	// 	placeholder: "Pilih Dokter...",
	// 	allowClear: true
	// });
	// $('.select2-sidebar-infobed').select2({
	// 	placeholder: "Pilih Ruangan...",
	// 	allowClear: true
	// });
	$('.cari-dokter .btn-sidebar').click(function (e) {
		$(this).toggleClass('active');
		if ($(this).hasClass('active')) {
			$('.cari-dokter').css('bottom', '0');
		} else {
			$('.cari-dokter').css('bottom', '-250px');
		}
	});
});