$(document).ready(function () {
    const ressponse_message = $(".ressponse_message");
    // dashboard links
    $("#dashboard_left a").on("click", function (event) {
        event.preventDefault();
        removeActiveClss();
        $(this).addClass("active");
        $(".hide_all_pages").addClass("d-none");

        // show selected page
        if ($(this).attr("id") == "category") {
            $("#category_form").removeClass("d-none");
        }
        if ($(this).attr("id") == "addbrand") {
            $("#brand_form").removeClass("d-none");
        }
        if ($(this).attr("id") == "product") {
            $("#product_form").removeClass("d-none");
        }
    });
    $(".menu").hover(function () {
        removeActiveClss();
        $(this).addClass("active");
    });
    $("body").on("click", ".menu li", function () {
        $(".menu li").addClass("d-none");
    });
    // category form submission
    // $("#Category").on("submit", function (event) {
    //     event.preventDefault();
    //     let cname = $("#categoryName :selected").text();
    //     let sname = $("#slugName :selected").text();
    //     let pname = $("#parentCategoryName").val();
    //     if (cname == "" || sname == "") {
    //         ressponse_message
    //             .html(
    //                 '<p class="text-white text-center py-2">Please fill all fields</p>'
    //             )
    //             .removeClass("d-none")
    //             .addClass("error");
    //         return false;
    //     } else {
    //         $.ajax({
    //             headers: {
    //                 "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
    //                     "content"
    //                 ),
    //             },
    //             url: $(this).attr("action"),
    //             type: $(this).attr("method"),
    //             data: { cname: cname, sname: sname, pname: pname },
    //             success: function (server_ressponse) {
    //                 console.log(server_ressponse.code);
    //                 if (server_ressponse.code == 400) {
    //                     ressponse_message
    //                         .html(
    //                             '<p class="text-white text-center py-2">Error</p>'
    //                         )
    //                         .removeClass("d-none")
    //                         .addClass("bg-success");
    //                     $("#Category")[0].reset();
    //                 }
    //                 if (server_ressponse.code == 200) {
    //                     ressponse_message
    //                         .html(
    //                             '<p class="text-white text-center py-2">Category is added</p>'
    //                         )
    //                         .removeClass("d-none")
    //                         .addClass("bg-success");
    //                     $("#Category")[0].reset();
    //                 }
    //                 if (server_ressponse.code == 404) {
    //                     ressponse_message
    //                         .html(
    //                             '<p class="text-white text-center py-2">This category is already exist</p>'
    //                         )
    //                         .removeClass("d-none")
    //                         .addClass("error");
    //                     $("#Category")[0].reset();
    //                 } else {
    //                     ressponse_message
    //                         .html(
    //                             '<p class="text-white text-center py-2">Category is added</p>'
    //                         )
    //                         .removeClass("d-none")
    //                         .addClass("bg-success");
    //                     $("#Category")[0].reset();
    //                 }

    //                 setTimeout(function () {
    //                     ressponse_message.addClass("d-none");
    //                 }, 4000);
    //             },
    //         });
    //     }
    // });
    // select parent category
    $("#parentCategoryName").on("click", function (event) {
        output = "";
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "/admin/parent-category",
            type: "GET",
            success: function (server_ressponse) {
                if (server_ressponse.code == 200) {
                    $.each(
                        server_ressponse.parentcategory,
                        function (key, parentcategory) {
                            output +=
                                "<option value=" +
                                parentcategory.id +
                                ">" +
                                parentcategory.name +
                                "</option>";
                        }
                    );
                    $("#parentCategoryName").append(output);
                } else {
                    ressponse_message
                        .html(
                            '<p class="text-white text-center py-2">No parent category exist</p>'
                        )
                        .removeClass("d-none");
                }
            },
        });
    });
    // add brand
    $("#brand").on("submit", function (event) {
        event.preventDefault();
        let bname = $("#brand :selected").text();
        if (bname == "") {
            ressponse_message
                .html(
                    '<p class="text-white text-center py-2">Please fill all fields</p>'
                )
                .removeClass("d-none")
                .addClass("error");
            return false;
        } else {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: $(this).attr("action"),
                type: $(this).attr("method"),
                data: { bname: bname },
                success: function (server_ressponse) {
                    console.log(server_ressponse.code);
                    if (server_ressponse.code == 400) {
                        ressponse_message
                            .html(
                                '<p class="text-white text-center py-2">Error</p>'
                            )
                            .removeClass("d-none")
                            .addClass("bg-success");
                        $("#brand")[0].reset();
                    }
                    if (server_ressponse.code == 200) {
                        ressponse_message
                            .html(
                                '<p class="text-white text-center py-2">Brand is added</p>'
                            )
                            .removeClass("d-none")
                            .addClass("bg-success");
                        $("#brand")[0].reset();
                    }
                    if (server_ressponse.code == 404) {
                        ressponse_message
                            .html(
                                '<p class="text-white text-center py-2">This Brand is already exist</p>'
                            )
                            .removeClass("d-none")
                            .addClass("error");
                        $("#brand")[0].reset();
                    } else {
                        ressponse_message
                            .html(
                                '<p class="text-white text-center py-2">Brand is added</p>'
                            )
                            .removeClass("d-none")
                            .addClass("bg-success");
                        $("#Category")[0].reset();
                    }

                    setTimeout(function () {
                        ressponse_message.addClass("d-none");
                    }, 4000);
                },
            });
        }
    });
    // add product
    $("#prod_form").on("submit", function (event) {
        event.preventDefault();
        let brand_id = $("#brand_id").val();
        let category_id = $("#category_id").val();
		let pname = $("#pname").val()
		let price = $("#price").val()
		let file = $("#file").val()

        if (pname == "" || price == "" || file == "" || category_id == "" || brand_id == "") {
            ressponse_message
                .html(
                    '<p class="text-white text-center py-2">Please fill all fields</p>'
                )
                .removeClass("d-none")
                .addClass("error");
            return false;
        }
		 else {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: $(this).attr("action"),
                type: $(this).attr("method"),
                data:new FormData(this),
                dataType:'JSON',
				contentType:false,
				processData:false,
				cache:false,
                success: function (server_ressponse) {
                    if (server_ressponse.code == 400) {
                        ressponse_message
                            .html(
                                '<p class="text-white text-center py-2">Error</p>'
                            )
                            .removeClass("d-none")
                            .addClass("bg-success");
                        $("#brand")[0].reset();
                    }
                    if (server_ressponse.code == 200) {
                        ressponse_message
                            .html(
                                '<p class="text-white text-center py-2">Product is added</p>'
                            )
                            .removeClass("d-none")
                            .addClass("bg-success");
                        $("#brand")[0].reset();
                    }
                    if (server_ressponse.code == 404) {
                        ressponse_message
                            .html(
                                '<p class="text-white text-center py-2">This is not added</p>'
                            )
                            .removeClass("d-none")
                            .addClass("error");
                        $("#brand")[0].reset();
                    } else {
                        ressponse_message
                            .html(
                                '<p class="text-white text-center py-2">Product is added</p>'
                            )
                            .removeClass("d-none")
                            .addClass("bg-success");
                        $("#Category")[0].reset();
                    }

                    setTimeout(function () {
                        ressponse_message.addClass("d-none");
                    }, 4000);
                },
            });
        }
    });
    // hide error message
    $(".form").on("click", function () {
        ressponse_message.addClass("d-none");
    });
    // remove active class
    function removeActiveClss() {
        $(".menu").removeClass("active");
        $(".dashboard-left-side a").removeClass("active");
        $(".menu li").removeClass("d-none");
    }
});

$(document).ready(function(){
		// select category and brand id
		categoies = "";
		$.ajax({
			headers: {
				"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
			},
			url: "/admin/parent-category",
			type: "GET",
			success: function (server_ressponse) {
				if (server_ressponse.code == 200) {
					$.each(
						server_ressponse.parentcategory,
						function (key, parentcategory) {
							categoies +=
								"<option value=" +
								parentcategory.id +
								">" +
								parentcategory.name +
								"</option>";
						}
					);
					$("#category_id").append(categoies);
				} else {
					ressponse_message
						.html(
							'<p class="text-white text-center py-2">No parent category exist</p>'
						)
						.removeClass("d-none");
				}
			},
		});
})

$(document).ready(function(){
    const ressponse_message = $(".ressponse_message");
    brands = "";
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: "/admin/brand-id",
        type: "GET",
        success: function (server_ressponse) {
            // console.log(server_ressponse.brand_id)
            if (server_ressponse.code == 1) {
                $.each(server_ressponse.brand_id,function (key, brand_id) {
                    brands +=
                            "<option value=" +
                            brand_id.id +
                            ">" +
                            brand_id.name +
                            "</option>";
                    }
                );
                $("#brand_id").append(brands);
            } else {
                ressponse_message
                    .html(
                        '<p class="text-white text-center py-2">No parent category exist</p>'
                    )
                    .removeClass("d-none");
            }
        },
    });
})
$(document).ready(function(){
    output = "";
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: "/admin/parent-category",
        type: "GET",
        success: function (server_ressponse) {
            if (server_ressponse.code == 200) {
                $.each(
                    server_ressponse.parentcategory,
                    function (key, parentcategory) {
                        output +=
                            "<option value=" +
                            parentcategory.id +
                            ">" +
                            parentcategory.name +
                            "</option>";
                    }
                );
                $("#parentCategoryName").append(output);
            } else {
                ressponse_message
                    .html(
                        '<p class="text-white text-center py-2">No parent category exist</p>'
                    )
                    .removeClass("d-none");
            }
        },
    });
})
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
						"<button class='me-3 btn shadow-none btn_edit' update_id="+value.id+"><i class='fa fa-edit text-primary'></i></button>"+
						"<button class='btn shadow-none btn_delete' delete_id="+value.id+"><i class='fa fa-trash-o text-danger'></i></button>"+
					"</td>"+
					"</tr>";
				});
				data_row.html(output)
			}
		}
	})
})
// Edit & Delete Product
$(function(){
	// edit
	$('body').on('click','.btn_edit', function(){		
        $(".hide_all_pages").addClass("d-none");
		$.ajax({
			headers: {
				"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
			},
			url:"/admin/edit/",
			type:"POST",
			data:{'id':$(this).attr('update_id')},
			success:function(res){
				if(res.code == 200){
					$("#update_product").addClass("d-none");
					$('#update_product').removeClass('d-none')
					console.log($('.price').val(res.price))
					console.log($('.up_id').val(res.id))
					
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
	// delete
	$('body').on('click','.btn_delete', function(){
		$.ajax({
			headers: {
				"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
			},
			url:"/admin/destory/",
			type:"POST",
			data:{'id':$(this).attr('delete_id')},
			success:function(res){
				if(res.code == 200){
					window.location.reload()				
				}
			}
		})
	})
})