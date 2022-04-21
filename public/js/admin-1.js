// admin

// add record
// $(function () {

// 	$('.submenu').on('click', function () {
// 		$(this).addClass('opacity')
// 	})
// })
// $(function () {
// 	$('.dashboard-left-side a').on('click', function (e) {

// 	})
// });

$(function () {
	$(".menu").hover(
		function () {
			$(this).addClass("active");
			$(".submenu").removeClass("opacity");
		},
		function () {
			$(this).removeClass("active");
		}
	);
});

$(function () {
	$("#main-menu").on("click", function () {
		$(".post").html("");
	});
});

// add products
// $(function () {
// 	$('#p_form').on('submit', function (e) {
// 		e.preventDefault()

// 		console.log($(this).attr('action'));
// 		$.ajax({
// 			headers: {
// 				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
// 			},
// 			url: $(this).attr('action'),
// 			type: 'POST',
// 			url: $(this).attr('action'),
// 			type: $(this).attr('method'),
// 			data: $('#p_form').serialize(),
// 			processData:false,
// 			dataType: 'json',
// 			contentType:false,
// 			beforeSend: function () {

// 			},
// 			success: function (response) {
// 				console.log(response)
// 			}
// 		});
// 	});
// });

// $(function () {
// 	$('.users').one('click', function (e) {
// 		e.preventDefault()
// 		$('alluser').removeClass('d-none')
// 		$.ajax({
// 			headers: {
// 				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
// 			},
// 			url: $(this).attr('href'),
// 			type: 'GET',
// 			success: function (response) {
// 				var data=response.message;
// 				data.forEach(item => {
// 					console.log(item)
// 				});
// 			}
// 		});
// 	})
// })

// js for admin work

$(function(){
	$.ajax({
		headers: {
			"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
		},
		url:"/admin/product/all",
		type:"GET",
		success:function(res){
			if(res.code == 200){
				var output="";
				$("#all_prods").removeClass('d-none');
				data_row=$("#all_prods .table tbody");
				$.each(res.products, function (keys, value) { 
					output+="<tr>"+
					"<td>"+
					value.name+
					"</td>"+
					"<td>"+
					value.price+
					"</td>"+
					"<td>"+
					value.description+
					"</td>"+
					"<td>"+
						"<button class='me-3 btn shadow-none btn_edit' data-sid="+value.id+"><i class='fa fa-edit text-primary'></i></button>"+
						"<button class='btn shadow-none btn_delete' data-sid="+value.id+"><i class='fa fa-trash-o text-danger'></i></button>"+
					"</td>"+
					"</tr>";
					// data_row.append("<tr>"+
					// "<td><img src='/storage/uploads/option-2.jpg' width='200' height='160'></td>"+
					// "<td>"+value.name+"</td>"+
					// "<td>"+value.description+"</td>"+
					// "<td>"+
					// "<a href=`value.id` class='me-4'><i class='fa fa-edit '></i></a>"+z
					// "<a href=''><i class='fa fa-trash-o text-danger '></i></a>"
					// +"</td>"
					// +"</tr>")
				});
				data_row.html(output)
			}
		}
	})
})

$(document).ready(function () {
	$(".page").addClass("d-none");
	var errorMes = $("#res");
	$(".dashboard-left-side a").on("click", function (e) {
		$(".page").addClass("d-none");
		e.preventDefault();
		$(".dashboard-left-side a").removeClass("active");
		$(this).addClass("active");

		$($(this).attr("id")).removeClass("d-none");

		if ($(this).attr("id") == "add_category") {
			$(".page").addClass("d-none");
			$(".show_category_form").removeClass("d-none");
		}
		if ($(this).attr("id") == "subcategory") {
			$(".page").addClass("d-none");
			$(".show_subcategory_form").removeClass("d-none");
		}
		if ($(this).attr("id") == "addbrand") {
			$(".page").addClass("d-none");
			$(".show_brand_form").removeClass("d-none");
		}
		if ($(this).attr("id") == "single-post") {
			$(".page").addClass("d-none");
			$(".single-post").removeClass("d-none");
		}
		if ($(this).attr("id") == "add-record") {
			$(".page").addClass("d-none");
			$(".add-record").removeClass("d-none");
		}
		if ($(this).attr("id") == "add_category") {
			$(".page").addClass("d-none");
			$(".show_category_form").removeClass("d-none");
		}
	});

	$("#add_brand").on("submit", function (e) {
		e.preventDefault();
		var brand_name = $("#brandname :selected").text();
		console.log(brandname)
		if (brand_name) {
			$.ajax({
				headers: {
					"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
				},
				url: $(this).attr('action'),
				type: $(this).attr('method'),
				data: { "brandname":brand_name },
				cache: false,
				beforeSend: function () { },
				success: function (response) {
					$("#add_brand")[0].reset()
					if (response.code == 400) {
						errorMes.removeClass("d-none").html("<span class='text-danger'>" +response.mes +"</span>");
					} 
					else if (response.code == 404) {
						alert("The " + brand_name + " Brand is already exist");
					} else {
						alert("The " + brand_name + " Brand is successfully added");
					}
				},
			});
		} 
		else {
			errorMes.removeClass("d-none").html("<span class='text-danger'>Please select brand</span>");
		}
	});

	// add category
	$("#addCategory").on("submit", function (e) {
		e.preventDefault();
		var cname = $("#category_name :selected").text();
		if (cname) {
			$.ajax({
				headers: {
					"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
				},
				url: $(this).attr('action'),
				type: $(this).attr('method'),
				data: { name: cname },
				cache: false,
				beforeSend: function () { },
				success: function (response) {
					$("#p_form")[0].reset()
					if (response.code == 400) {
						
						errorMes.removeClass("d-none").html("<span class='text-danger'>" +response.mes +"</span>");
					} 
					else if (response.code == 404) {
						alert("The " + name + " category is already exist");
					} else {
						alert("The " + name + " category is successfully added");
					}
				},
			});
		} 
		else {
			errorMes.removeClass("d-none").html("<span class='text-danger'>Please select category</span>");
		}
	});

	// add subcategory
	$("#sub_category").on("submit", function (e) {
		e.preventDefault();
		var sname = $("#sname :selected").text();
		if (sname) {
			$.ajax({
				headers: {
					"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
				},
				url: $(this).attr('action'),
				type: $(this).attr('method'),
				data: { 'sname': sname },
				cache: false,
				beforeSend: function () { },
				success: function (response) {
					$("#sub_category")[0].reset()
					if (response.code == 400) {

						errorMes.removeClass("d-none").html("<span class='text-danger'>" +response.mes +"</span>");
					} 
					else if (response.code == 404) {
						alert("The " + sname + " category is already exist");
					} else {
						alert("The " + sname + " category is successfully added");
					}
				},
			});
		} 
		else {
			errorMes.removeClass("d-none").html("<span class='text-danger'>Please select category</span>");
		}
	});

	$(".category_name").on("change", function () {
		errorMes.addClass("d-none");
	});

	// add products
	$(document).ready(function () {
		$("#p_form").on("submit", function (e) {
			$(".page").addClass("d-none");
			e.preventDefault();
			$.ajax({
				headers: {
					"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
				},
				url:$(this).attr('action'),
				type:$(this).attr('method'),
				data:new FormData(this),
				dataType:'JSON',
				contentType:false,
				processData:false,
				cache:false,
				success:function(response){
					var Mes = $("#pro_res");
					if (response.code == 400) {
						console.log(response.mes)
						Mes.removeClass("d-none").html("<span class='text-danger'>" +response.mes +"</span>");
					} 
					else{
						Mes.removeClass("d-none").html("<span class='text-white text-center w-100 d-block fw-bold'>"+"The " + response.mes + " is successfully added" +"</span>");
						setTimeout(function(){
							$("#p_form")[0].reset()
						
						},5000)
					}
					
				}
			})
		});
	});
	// select brand
	$(document).ready(function(){
		var count=0;
		$('.select_brand').on('click', function(e){
				$.ajax({
					headers: {
						"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
					},
					url:"/admin/select-category",
					type:"GET",
					success:function(res){
						var catul=$('.add_brand');
						$('.show_brand').removeClass('d-none');
						outputs="";
						$.each(res.brands, function (keys, value) {
							console.log(value.id) 
							catul.append("<li class='p-2 brand_name_put'data-sid="+value.id+">"+value.name+"</li>")
						});
					}
				})
			
		})
	})
	// select category
	$(document).ready(function(){
		var count=0;
		$('.select_cat').on('click', function(e){
				$.ajax({
					headers: {
						"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
					},
					url:"/admin/select-category",
					type:"GET",
					success:function(res){
						var catul=$('.add_cate');
						$('.show_cat').removeClass('d-none');
						$.each(res.category, function (keys, value) { 
							catul.append("<li class='p-2 cate_name_put' data-sid="+value.id+">"+value.name+"</li>")
						});
					}
				})
			
		})
	})

});
$(document).ready(function(){
	$('body').on("click",".cate_name_put",function(){
			$('#selected_category').val($(this).text())
			$('#selected_category_id').val($(this).attr('data-sid'))
		$('.show_cat').addClass('d-none')
		$('.show_cat ul').empty();
	})
})
$(document).ready(function(){
	$('body').on("click",".brand_name_put",function(){
			$('#selected_brand').val($(this).text())
			$('#selected_brand_id').val($(this).attr('data-sid'))
		$('.show_brand').addClass('d-none')
		$('.show_brand ul').empty();
	})
})

// Edit & Delete Product
$(function(){
	// edit
	$('body').on('click','.btn_edit', function(){
		
		$.ajax({
			headers: {
				"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
			},
			url:"/admin/edit/",
			type:"POST",
			data:{'id':$(this).attr('data-sid')},
			success:function(res){
				if(res.code == 200){
					$(".page").addClass("d-none");
					$('#update_product').removeClass('d-none')
					console.log($('.price').val(res.price))
					console.log($('.up_id').val(res.id))
					
				}
			}
		})
	})
	// delete
	$('body').on('click','.btn_delete', function(){
		$.ajax({
			headers: {
				"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
			},
			url:"/admin/destory/",
			type:"POST",
			data:{'id':$(this).attr('data-sid')},
			success:function(res){
				if(res.code == 200){
					window.location.reload()				
				}
			}
		})
	})
	$('body').on('submit','#update_product', function(e){
		console.log($('.up_id').val())
		e.preventDefault()
		$.ajax({
			headers: {
				"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
			},
			url:"/admin/update/",
			type:"POST",
			data:{"price":$('.price').val(),"id":$('.up_id').val()},
			success:function(res){
				if(res.code == 200){
					window.location.reload()				
				}
			}
		})
	})
})
