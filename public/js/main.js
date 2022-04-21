/*price range*/

$('#sl2').slider();

var RGBChange = function () {
	$('#RGB').css('background', 'rgb(' + r.getValue() + ',' + g.getValue() + ',' + b.getValue() + ')')
};

/*scroll to top*/

$(document).ready(function () {
	$(function () {
		$.scrollUp({
			scrollName: 'scrollUp', // Element ID
			scrollDistance: 300, // Distance from top/bottom before showing element (px)
			scrollFrom: 'top', // 'top' or 'bottom'
			scrollSpeed: 300, // Speed back to top (ms)
			easingType: 'linear', // Scroll to top easing (see http://easings.net/)
			animation: 'fade', // Fade, slide, none
			animationSpeed: 200, // Animation in speed (ms)
			scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
			//scrollTarget: false, // Set a custom target element for scrolling to the top
			scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
			scrollTitle: false, // Set a custom <a> title if required.
			scrollImg: false, // Set true to use image
			activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
			zIndex: 2147483647 // Z-Index for the overlay
		});
	});
});

// admin


// add record
$(function () {

	$('.submenu').on('click', function () {
		$(this).addClass('opacity')
	})
})
$(function () {
	$('.dashboard-left-side a').on('click', function (e) {
		// console.log($(this))
		e.preventDefault();
		$('.dashboard-left-side a').removeClass('active')
		$(this).addClass('active')
		$('.all_clas').addClass('d-none')
		$($(this).attr('name')).removeClass('d-none');
		if ($(this).attr("href")) {
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: $(this).attr('href'),
				type: 'GET',
				success: function (response) {


					$.each(response.data, function (key, value) {
						$('.post').append(
							'<h1>' + value.name + '</h1>'
						)
					})
				}
			});
		}
	})
});

$(function () {
	$('.menu').hover(function () {

		$(this).addClass('active');
		$('.submenu').removeClass('opacity')
	},
		function () {
			$(this).removeClass('active');
		});
});

$(function () {
	$('#main-menu').on('click', function () {
		$('.post').html('')
	})
})

// add products
$(function () {
	$('#p_form').on('submit', function (e) {
		e.preventDefault()

		console.log($(this).attr('action'));
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			// url: $(this).attr('action'),
			// type: 'POST',
			url: $(this).attr('action'),
			type: $(this).attr('method'),
			data: $('#p_form').serialize(),
			// processData:false, 
			dataType: 'json',
			// contentType:false,
			beforeSend: function () {

			},
			success: function (response) {
				console.log(response)
			}
		});
	});
});

$(function () {
	$('.users').one('click', function (e) {
		e.preventDefault()
		$('alluser').removeClass('d-none')
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url: $(this).attr('href'),
			type: 'GET',
			success: function (response) {
				var data=response.message;
				data.forEach(item => {
					console.log(item)
				});
			}
		});
	})
})

let sub_category=document.querySelectorAll('.sub__cate');
sub_category.forEach(e => {
e.classList.add('mx-height')
	e.parentNode.addEventListener('click', function(event){
		this.children[1].classList.toggle('mx-height')
	})
})

// $(function(){
// 	$('.sub__cate').addClass('mx-height');
// 	$('.sub_category').on('click', function(e){
// 		e.preventDefault()
// 		console.log($(this).first('a'))
// 	})
// })