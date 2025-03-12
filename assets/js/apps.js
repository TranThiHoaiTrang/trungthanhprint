/* Validation form */
ValidationFormSelf("validation-newsletter");
ValidationFormSelf("validation-cart");
ValidationFormSelf("validation-user");
ValidationFormSelf("validation-contact");
ValidationFormSelf("validation-layso");

/* Exists */
$.fn.exists = function () {
  return this.length;
};

/* Paging ajax */
if ($(".paging-rating").exists()) {
  let idl = $(".paging-rating").attr("data-id");
  loadPagingAjax("ajax/ajax_news.php?perpage=6", ".paging-rating", idl);
}

$(".paging-product-index").each(function () {
  let idl = $(this).data("id");
  loadPagingAjax(
    "ajax/ajax_product_paging.php?perpage=10",
    "#load_pro_" + idl,
    idl
  );
});
/* Paging category ajax 
    if($(".paging-product-category").exists()){
        $(".paging-product-category").each(function(){
            var list = $(this).data("list");
            var cat = $(this).data("cat");
            var item = $(this).data("item");
            var namelist = $(this).data("namelist");
            loadPagingAjax("ajax/ajax_product.php?perpage=8&idList="+list+"&idCat="+cat+"&idItem="+item+"&namelist="+namelist,'.paging-product-category-'+cat);
        });

        $('.boxproitem_item').click(function(){
            var list = $(this).data("list");
            var cat = $(this).data("cat");
            var item = $(this).data("item");
            var namelist = $(this).data("namelist");
            loadPagingAjax("ajax/ajax_product.php?perpage=8&idList="+list+"&idCat="+cat+"&idItem="+item+"&namelist="+namelist,'.paging-product-category-'+cat);
        });
    }
*/

/* Back to top */
NN_FRAMEWORK.BackToTop = function () {
  $(window).scroll(function () {
    if (!$(".scrollToTop").length)
      $("body").append(
        '<div class="scrollToTop"><i class="fas fa-arrow-to-top"></i></div>'
      );
    if ($(this).scrollTop() > 100) $(".scrollToTop").fadeIn();
    else $(".scrollToTop").fadeOut();
  });
  $("body").on("click", ".scrollToTop", function () {
    $("html, body").animate({ scrollTop: 0 }, 800);
    return false;
  });
};

/* Alt images */
NN_FRAMEWORK.AltImages = function () {
  $("img").each(function (index, element) {
    if (!$(this).attr("alt") || $(this).attr("alt") == "") {
      $(this).attr("alt", WEBSITE_NAME);
    }
  });
};

/* Fix menu */
NN_FRAMEWORK.FixMenu = function () {
  $(window).scroll(function () {
    let hei = $(".wrap_slider").height();
    if ($(window).scrollTop() >= hei + 20) $(".header-height").addClass("fixed");
    else $(".header-height").removeClass("fixed");
  });
};

/* Tools */
NN_FRAMEWORK.Tools = function () {
  if ($(".toolbar").exists()) {
    $(".footer").css({ marginBottom: $(".toolbar").innerHeight() });
  }
};

/* Popup */
NN_FRAMEWORK.Popup = function () {
  if ($("#popup").exists()) {
    $("#popup").modal("show");
  }
};

/* Wow */
NN_FRAMEWORK.WowAnimation = function () {
  new WOW().init();
};

/* Toc */
NN_FRAMEWORK.Toc = function () {
  if ($(".toc-list").exists()) {
    $(".toc-list").toc({
      content: "div#toc-content",
      headings: "h2,h3,h4",
    });

    if (!$(".toc-list li").length) $(".meta-toc").hide();

    $(".toc-list")
      .find("a")
      .click(function () {
        var x = $(this).attr("data-rel");
        goToByScroll(x);
      });
  }
};

/* Simply scroll */
NN_FRAMEWORK.SimplyScroll = function () {
  if ($(".roll_news ul").exists()) {
    $(".roll_news ul").simplyScroll({
      customClass: "vert",
      orientation: "vertical",
      // orientation: 'horizontal',
      auto: true,
      manualMode: "auto",
      pauseOnHover: 1,
      speed: 1,
      loop: 0,
    });
  }
  if ($(".roll_news1 ul").exists()) {
    $(".roll_news1 ul").simplyScroll({
      customClass: "vert",
      orientation: "vertical",
      // orientation: 'horizontal',
      auto: true,
      manualMode: "auto",
      pauseOnHover: 1,
      speed: 1,
      loop: 0,
    });
  }
};

/* Tabs */
NN_FRAMEWORK.Tabs = function () {
  if ($(".ul-tabs-pro-detail").exists()) {
    $(".ul-tabs-pro-detail li").click(function () {
      var tabs = $(this).data("tabs");
      $(".content-tabs-pro-detail, .ul-tabs-pro-detail li").removeClass(
        "active"
      );
      $(this).addClass("active");
      $("." + tabs).addClass("active");
    });
  }
};

/* Search */
NN_FRAMEWORK.Search = function () {
  if ($(".icon-search").exists()) {
    $(".icon-search").click(function () {
      if ($(this).hasClass("active")) {
        $(this).removeClass("active");
        $(".search-grid")
          .stop(true, true)
          .animate({ opacity: "0", width: "0px" }, 200);
      } else {
        $(this).addClass("active");
        $(".search-grid")
          .stop(true, true)
          .animate({ opacity: "1", width: "230px" }, 200);
      }
      document.getElementById($(this).next().find("input").attr("id")).focus();
      $(".icon-search i").toggleClass("fa fa-search fa fa-times");
    });
  }
};

/* Videos */
NN_FRAMEWORK.Videos = function () {
  // if ($(".video").exists()) {
    $('[data-fancybox="video"]').fancybox({
      transitionEffect: "fade",
      transitionDuration: 800,
      animationEffect: "fade",
      animationDuration: 800,
      arrows: true,
      infobar: false,
      toolbar: true,
      hash: false,
      iframe: {
        preload: false, // Tránh việc Fancybox tự động đặt chiều cao iframe không chính xác
        css: {
            width: "100%",
            height: "100%"
        }
    },
    Thumbs: {
        autoStart: true, // Hiển thị thumbnail phía dưới video
    },
  });
  // }
};

/* Owl */
NN_FRAMEWORK.OwlPage = function () {
  if ($(".owl-slideshow").exists()) {
    $(".owl-slideshow").owlCarousel({
      items: 1,
      rewind: true,
      autoplay: false,
      center: false,
      loop: true,
      lazyLoad: false,
      mouseDrag: true,
      touchDrag: true,
      animateIn: "animate__animated animate__fadeInLeft",
      animateOut: "animate__animated animate__fadeOutRight",
      margin: 30,
      smartSpeed: 1000,
      autoplaySpeed: 3500,
      nav: false,
      dots: false,
      responsive: {
        0: {
          items: 1,
          center: false,
        },
        450: {
          items: 1,
          center: false,
        },
        800: {
          items: 1,
          center: false,
        },
        1000: {
          items: 1.5,
          center: false,
        },
      },
    });
    $(".prev-slideshow").click(function () {
      $(".owl-slideshow").trigger("prev.owl.carousel");
    });
    $(".next-slideshow").click(function () {
      $(".owl-slideshow").trigger("next.owl.carousel");
    });
  }

  if ($(".owl-dv").exists()) {
    $(".owl-dv").owlCarousel({
      rewind: true,
      autoplay: false,
      loop: true,
      lazyLoad: false,
      mouseDrag: true,
      touchDrag: true,
      smartSpeed: 1000,
      autoplaySpeed: 1500,
      nav: false,
      dots: true,
      responsiveClass: true,
      responsiveRefreshRate: 200,
      responsive: {
        0: {
          items: 2,
          margin: 10,
          dots: true,
        },
        450: {
          items: 2,
          margin: 10,
          dots: true,
        },
        800: {
          items: 3,
          margin: 20,
        },
        1000: {
          items: 3,
          margin: 20,
        },
        1025: {
          items: 3.5,
          margin: 20,
        },
      },
    });
    /*$('.prev-partner').click(function() {
            $('.owl-partner').trigger('prev.owl.carousel');
        });
        $('.next-partner').click(function() {
            $('.owl-partner').trigger('next.owl.carousel');
        });*/
  }
  if ($(".auto_deal").exists()) {
    $(".auto_deal").owlCarousel({
      rewind: true,
      autoplay: false,
      loop: true,
      lazyLoad: false,
      mouseDrag: true,
      touchDrag: true,
      smartSpeed: 1000,
      autoplaySpeed: 1500,
      nav: false,
      dots: false,
      responsiveClass: true,
      responsiveRefreshRate: 200,
      responsive: {
        0: {
          items: 2,
          margin: 15,
        },
        450: {
          items: 2,
          margin: 15,
        },
        800: {
          items: 2,
          margin: 15,
        },
        1000: {
          items: 3,
          margin: 20,
        },
        1030: {
          items: 4.5,
          margin: 20,
        },
      },
    });
    $(".prev-deal").click(function () {
      $(".auto_deal").trigger("prev.owl.carousel");
    });
    $(".next-deal").click(function () {
      $(".auto_deal").trigger("next.owl.carousel");
    });
  }
  if ($(".auto_social").exists()) {
    $(".auto_social").owlCarousel({
      rewind: true,
      autoplay: false,
      loop: true,
      center: true,
      lazyLoad: false,
      mouseDrag: true,
      touchDrag: true,
      smartSpeed: 1000,
      autoplaySpeed: 1500,
      nav: false,
      dots: false,
      responsiveClass: true,
      responsiveRefreshRate: 200,
      responsive: {
        0: {
          items: 1,
          margin: 5,
        },
        369: {
          items: 1,
          margin: 5,
        },
        450: {
          items: 2,
          margin: 20,
        },
        800: {
          items: 3,
          margin: 20,
        },
        1000: {
          items: 3,
          margin: 0,
        },
        1030: {
          items: 3,
          margin: 0,
        },
      },
    });
    $(".prev-social").click(function () {
      $(".auto_social").trigger("prev.owl.carousel");
    });
    $(".next-social").click(function () {
      $(".auto_social").trigger("next.owl.carousel");
    });
  }

  if ($(".auto_khachhangtieubieu").exists()) {
    $(".auto_khachhangtieubieu").owlCarousel({
      rewind: true,
      autoplay: false,
      loop: true,
      center: true,
      lazyLoad: false,
      mouseDrag: true,
      touchDrag: true,
      smartSpeed: 250,
      autoplaySpeed: 1000,
      nav: false,
      dots: false,
      responsiveClass: true,
      responsiveRefreshRate: 200,
      responsive: {
        0: {
          items: 1,
          margin: 5,
        },
        369: {
          items: 1,
          margin: 5,
        },
        450: {
          items: 1,
          margin: 20,
        },
        800: {
          items: 1,
          margin: 20,
        },
        1000: {
          items: 1,
          margin: 0,
        },
        1030: {
          items: 1,
          margin: 0,
        },
      },
    });
    $(".prev-khachhangtieubieu").click(function () {
      $(".auto_khachhangtieubieu").trigger("prev.owl.carousel");
    });
    $(".next-khachhangtieubieu").click(function () {
      $(".auto_khachhangtieubieu").trigger("next.owl.carousel");
    });
  }

  if ($(".auto_quatrinhhinhthanh").exists()) {
    $(".auto_quatrinhhinhthanh").owlCarousel({
      rewind: true,
      autoplay: false,
      loop: true,
      center: false,
      lazyLoad: false,
      mouseDrag: true,
      touchDrag: true,
      smartSpeed: 250,
      autoplaySpeed: 1000,
      nav: false,
      dots: false,
      responsiveClass: true,
      responsiveRefreshRate: 200,
      responsive: {
        0: {
          items: 1,
          margin: 0,
        },
        369: {
          items: 1,
          margin: 0,
        },
        450: {
          items: 1,
          margin: 0,
        },
        800: {
          items: 2,
          margin: 0,
        },
        1000: {
          items: 3,
          margin: 0,
        },
        1030: {
          items: 3,
          margin: 0,
        },
      },
    });
    $(".prev-quatrinhhinhthanh").click(function () {
      $(".auto_quatrinhhinhthanh").trigger("prev.owl.carousel");
    });
    $(".next-quatrinhhinhthanh").click(function () {
      $(".auto_quatrinhhinhthanh").trigger("next.owl.carousel");
    });
  }

  if ($(".auto_baiviet").exists()) {
    $(".auto_baiviet").owlCarousel({
      rewind: true,
      autoplay: false,
      loop: true,
      center: false,
      lazyLoad: false,
      mouseDrag: true,
      touchDrag: true,
      smartSpeed: 250,
      autoplaySpeed: 1000,
      nav: false,
      dots: false,
      responsiveClass: true,
      responsiveRefreshRate: 200,
      responsive: {
        0: {
          items: 1,
          margin: 20,
        },
        369: {
          items: 1,
          margin: 20,
        },
        450: {
          items: 2,
          margin: 20,
        },
        800: {
          items: 2,
          margin: 20,
        },
        1000: {
          items: 3,
          margin: 30,
        },
        1030: {
          items: 3,
          margin: 30,
        },
      },
    });
    $(".prev-baiviet").click(function () {
      $(".auto_baiviet").trigger("prev.owl.carousel");
    });
    $(".next-baiviet").click(function () {
      $(".auto_baiviet").trigger("next.owl.carousel");
    });
  }

  if ($(".auto_brand").exists()) {
    $(".auto_brand").owlCarousel({
      rewind: true,
      autoplay: false,
      loop: true,
      lazyLoad: false,
      mouseDrag: true,
      touchDrag: true,
      smartSpeed: 1000,
      autoplaySpeed: 1500,
      nav: false,
      dots: false,
      responsiveClass: true,
      responsiveRefreshRate: 200,
      responsive: {
        0: {
          items: 1,
          margin: 20,
        },
        369: {
          items: 1,
          margin: 20,
        },
        450: {
          items: 2,
          margin: 20,
        },
        800: {
          items: 2,
          margin: 20,
        },
        1000: {
          items: 1.3,
          margin: 20,
        },
        1030: {
          items: 1.3,
          margin: 20,
        },
      },
    });
    $(".prev-brand").click(function () {
      $(".auto_brand").trigger("prev.owl.carousel");
    });
    $(".next-brand").click(function () {
      $(".auto_brand").trigger("next.owl.carousel");
    });
  }

  if ($(".auto_dnnv").exists()) {
    $(".auto_dnnv").owlCarousel({
      rewind: true,
      autoplay: false,
      loop: true,
      lazyLoad: false,
      mouseDrag: true,
      touchDrag: true,
      smartSpeed: 250,
      autoplaySpeed: 1000,
      nav: false,
      dots: false,
      responsiveClass: true,
      responsiveRefreshRate: 200,
      responsive: {
        0: {
          items: 1,
          margin: 20,
        },
        369: {
          items: 1,
          margin: 20,
        },
        450: {
          items: 1,
          margin: 20,
        },
        800: {
          items: 2,
          margin: 20,
        },
        1000: {
          items: 2,
          margin: 20,
        },
        1030: {
          items: 2,
          margin: 20,
        },
      },
    });
    $(".prev-dnnv").click(function () {
      $(".auto_dnnv").trigger("prev.owl.carousel");
    });
    $(".next-dnnv").click(function () {
      $(".auto_dnnv").trigger("next.owl.carousel");
    });
  }

  if ($(".auto_lvhd").exists()) {
    $(".auto_lvhd").owlCarousel({
      rewind: true,
      autoplay: false,
      loop: true,
      lazyLoad: false,
      mouseDrag: true,
      touchDrag: true,
      smartSpeed: 250,
      autoplaySpeed: 1000,
      nav: false,
      dots: false,
      responsiveClass: true,
      responsiveRefreshRate: 200,
      responsive: {
        0: {
          items: 1,
          margin: 20,
        },
        369: {
          items: 2,
          margin: 20,
        },
        450: {
          items: 2,
          margin: 20,
        },
        800: {
          items: 3,
          margin: 20,
        },
        1000: {
          items: 4,
          margin: 20,
        },
        1030: {
          items: 4,
          margin: 20,
        },
      },
    });
    $(".prev-lvhd").click(function () {
      $(".auto_lvhd").trigger("prev.owl.carousel");
    });
    $(".next-lvhd").click(function () {
      $(".auto_lvhd").trigger("next.owl.carousel");
    });
  }

};

/* Owl pro detail */
NN_FRAMEWORK.OwlProDetail = function () {
  if ($(".owl-thumb-pro").exists()) {
    $(".owl-thumb-pro").owlCarousel({
      items: 4,
      loop: false,
      rewind: true,
      lazyLoad: false,
      mouseDrag: true,
      touchDrag: true,
      margin: 10,
      smartSpeed: 250,
      nav: false,
      dots: false,
      responsiveClass: true,
      responsiveRefreshRate: 200,
      responsive: {
        0: {
          items: 3,
          margin: 10,
        },
        500: {
          items: 4,
          margin: 10,
        },
      },
    });
    $(".prev-thumb-pro").click(function () {
      $(".owl-thumb-pro").trigger("prev.owl.carousel");
    });
    $(".next-thumb-pro").click(function () {
      $(".owl-thumb-pro").trigger("next.owl.carousel");
    });
  }
};

/* Cart */
NN_FRAMEWORK.loadmap = function () {
  $("body").on("click", ".loadmap", function () {
    $(".loadmap").removeClass("active");
    $(this).addClass("active");
    let id = $(this).attr("data-id");
    $.ajax({
      url: "ajax/ajax_bando.php",
      type: "POST",
      async: false,
      data: { id: id },
      success: function (result) {
        $(".form-contact").html(result);
      },
    });
  });
};
NN_FRAMEWORK.Cart = function () {
  $(".addcart").click(function () {
    var mau = $(".color-pro-detail.active").data("idmau") ? $(".color-pro-detail.active").data("idmau") : 0;
    var size = $(".size-pro-detail.active").data("idsize") ? $(".size-pro-detail.active").data("idsize") : 0;
    var id = $(this).data("id");
    var action = $(this).data("action");
    var quantity = $("#quantity").val() ? $("#quantity").val() : 1;
    var giasize = $("input[name=giasize]").val();
    // var giasize = $(".pa_kieu-cach").val();
    // console.log(mau);
    // console.log(size);
    if (id) {
      $.ajax({
        url: "ajax/ajax_cart.php",
        type: "POST",
        dataType: "json",
        async: false,
        data: {
          cmd: "add-cart",
          id: id,
          mau: mau,
          size: size,
          quantity: quantity,
          giasize: giasize,
        },
        success: function (result) {
          $(".Price-amount").html(result.giatong);
          // console.log(result.max);
          if (action == "addnow") {
            $(".Price-amount").html(result.giatong);
            // console.log("aaaaa");
            $.ajax({
              url: "ajax/ajax_cart.php",
              type: "POST",
              dataType: "html",
              async: false,
              data: { cmd: "popup-cart" },
              success: function (result) {
                $("#popup-cart .modal-body").html(result);
                $("#popup-cart").modal("show");
              },
            });
          } else if (action == "buynow") {
            window.location = CONFIG_BASE + "gio-hang?step=giohang";
          }
        },
      });
    }
  });

  $("body").on("click", ".del-procart", function () {
    if (confirm(LANG["delete_product_from_cart"])) {
      var code = $(this).data("code");
      var ship = $(".price-ship").val();

      $.ajax({
        type: "POST",
        url: "ajax/ajax_cart.php",
        dataType: "json",
        data: { cmd: "delete-cart", code: code, ship: ship },
        success: function (result) {
          $(".count-cart").html(result.max);
          if (result.max) {
            $(".price-temp").val(result.temp);
            $(".load-price-temp").html(result.tempText);
            $(".price-total").val(result.total);
            $(".load-price-total").html(result.totalText);
            $(".procart-" + code).remove();
          } else {
            $(".wrap-cart").html(
              '<a href="" class="empty-cart text-decoration-none"><img style="width: 80px;" src="./assets/images/cart.png" alt=""><p>' +
                LANG["no_products_in_cart"] +
                "</p><span>" +
                LANG["back_to_home"] +
                "</span></a>"
            );
          }
        },
      });
    }
  });

  $("body").on("click", ".counter-procart", function () {
    var $button = $(this);
    var input = $button.parent().find("input");
    var id = input.data("pid");
    var code = input.data("code");
    var oldValue = $button.parent().find("input").val();
    if ($button.text() == "+") quantity = parseFloat(oldValue) + 1;
    else if (oldValue > 1) quantity = parseFloat(oldValue) - 1;
    $button.parent().find("input").val(quantity);
    update_cart(id, code, quantity);
  });

  $("body").on("change", "input.quantity-procat", function () {
    var quantity = $(this).val();
    var id = $(this).data("pid");
    var code = $(this).data("code");
    update_cart(id, code, quantity);
  });

  if ($(".select-city-cart").exists()) {
    $(".select-city-cart").change(function () {
      var id = $(this).val();
      load_district(id);
      load_ship();
    });
  }

  if ($(".select-district-cart").exists()) {
    $(".select-district-cart").change(function () {
      var id = $(this).val();
      load_wards(id);
      load_ship();
    });
  }

  if ($(".select-wards-cart").exists()) {
    $(".select-wards-cart").change(function () {
      var id = $(this).val();
      load_ship(id);
    });
  }

  if ($(".payments-label").exists()) {
    $(".payments-label").click(function () {
      var payments = $(this).data("payments");
      $(".payments-cart .payments-label, .payments-info").removeClass("active");
      $(this).addClass("active");
      $(".payments-info-" + payments).addClass("active");
    });
  }

  if ($(".color-pro-detail").exists()) {
    $(".color-pro-detail").click(function () {
      $(".color-pro-detail").removeClass("active");
      $(this).addClass("active");

      var idpro = $("input[name=idpro]").val();
      var idmau = $(".color-pro-detail.active").data("idmau");
      var idsize = $(".size-pro-detail.active").data("idsize");

      $.ajax({
        type: "POST",
        url: "ajax/ajax_giasp.php",
        data: {
          idpro: idpro,
          idmau: idmau,
          idsize: idsize,
        },
        success: function (result) {
          $(".gia_all_pro_detail").html(result);
          click_size();
        },
      });
    });
  }

  if ($(".size-pro-detail").exists()) {
    $(".size-pro-detail").click(function () {
      $(".size-pro-detail").removeClass("active");
      $(this).addClass("active");

      var idpro = $("input[name=idpro]").val();
      var idmau = $(".color-pro-detail.active").data("idmau");
      var idsize = $(".size-pro-detail.active").data("idsize");

      $.ajax({
        type: "POST",
        url: "ajax/ajax_giasp.php",
        data: {
          idpro: idpro,
          idmau: idmau,
          idsize: idsize,
        },
        success: function (result) {
          $(".gia_all_pro_detail").html(result);
          click_color();
        },
      });

    });
  }

  if ($(".quantity-pro-detail button").exists()) {
    $(".quantity-pro-detail button").click(function () {
      var $button = $(this);
      var oldValue = $button.parent().find("input").val();
      if ($button.text() == "+") {
        var newVal = parseFloat(oldValue) + 1;
      } else {
        if (oldValue > 1) var newVal = parseFloat(oldValue) - 1;
        else var newVal = 1;
      }
      $button.parent().find("input").val(newVal);
    });
  }
};

NN_FRAMEWORK.search_product = function () {
  $(".button_loc").on("click", function () {
    var name_list = $(".menu_danhmuc_sp.active").data("name_list");
    var idlist = $("input[name=listpr]").val();
    var type = $("input[name=type]").val();
    var brandpro = $("input[name=brandpro]").val();

    var khoanggia = $("#khoanggia").val();
    var list_check = $(".menu_danhmuc_sp.active").data("idlist");
    // var brandpro = $(".brand_sp.active").data("idbrand");

    $.ajax({
      type: "POST",
      url: "ajax/ajax_searchpro.php",
      data: {
        khoanggia: khoanggia,
        idlist: idlist,
        brandpro: brandpro,
        list_check: list_check,
        type: type,
      },
      success: function (result) {
        $(".all_sp_search").html(result);
        $(".title_sp").html(name_list);
        $("#boloc_mobile").modal("hide");
      },
    });
  });

  $(".menu_danhmuc_sp").on("click", function () {
    // $(".price_check").removeClass("active");
    if ($(this).hasClass("active")) {
      $(this).removeClass("active");
    } else {
      $(".menu_danhmuc_sp").removeClass("active");
      $(this).addClass("active");
    }

    var name_list = $(".menu_danhmuc_sp.active").data("name_list");
    var idlist = $("input[name=listpr]").val();
    var type = $("input[name=type]").val();
    // var brandpro = $("input[name=brandpro]").val();

    var khoanggia = $("#khoanggia").val();
    var list_check = $(".menu_danhmuc_sp.active").data("idlist");
    var brandpro = $(".brand_sp.active").data("idbrand");

    $.ajax({
      type: "POST",
      url: "ajax/ajax_searchpro.php",
      data: {
        khoanggia: khoanggia,
        idlist: idlist,
        brandpro: brandpro,
        list_check: list_check,
        type: type,
      },
      success: function (result) {
        $(".all_sp_search").html(result);
        $(".title_sp").html(name_list);
        $("#boloc_mobile").modal("hide");
      },
    });
  });

  $(".brand_sp").on("click", function () {
    // $(".price_check").removeClass("active");
    if ($(this).hasClass("active")) {
      $(this).removeClass("active");
    } else {
      $(".brand_sp").removeClass("active");
      $(this).addClass("active");
    }

    var name_list = $(".menu_danhmuc_sp.active").data("name_list");
    var idlist = $("input[name=listpr]").val();
    var type = $("input[name=type]").val();
    // var brandpro = $("input[name=brandpro]").val();

    var khoanggia = $("#khoanggia").val();
    var list_check = $(".menu_danhmuc_sp.active").data("idlist");
    var brandpro = $(".brand_sp.active").data("idbrand");

    $.ajax({
      type: "POST",
      url: "ajax/ajax_searchpro.php",
      data: {
        khoanggia: khoanggia,
        idlist: idlist,
        brandpro: brandpro,
        list_check: list_check,
        type: type,
      },
      success: function (result) {
        $(".all_sp_search").html(result);
        $(".title_sp").html(name_list);
        $("#boloc_mobile").modal("hide");
      },
    });
  });
  //

  $(".pa_kieu-cach").on("change", function () {
    var kieucach = $(".pa_kieu-cach").val();
    // var giacu = $(".giacu").val();
    var giacu = $(".pa_kieu-cach").find(":selected").data("giacu");
    // console.log($(".pa_kieu-cach"));
    $.ajax({
      type: "POST",
      url: "ajax/ajax_kieucach.php",
      data: {
        kieucach: kieucach,
        giacu: giacu,
      },
      success: function (result) {
        $(".single_variation_wrap").html(result);
      },
    });
  });
};

/* Ready */
$(document).ready(function () {
  NN_FRAMEWORK.loadmap();
  NN_FRAMEWORK.Tools();
  NN_FRAMEWORK.Popup();
  NN_FRAMEWORK.WowAnimation();
  NN_FRAMEWORK.AltImages();
  NN_FRAMEWORK.BackToTop();
  NN_FRAMEWORK.FixMenu();
  NN_FRAMEWORK.OwlPage();
  NN_FRAMEWORK.OwlProDetail();
  NN_FRAMEWORK.Toc();
  NN_FRAMEWORK.Cart();
  NN_FRAMEWORK.SimplyScroll();
  NN_FRAMEWORK.Tabs();
  NN_FRAMEWORK.Videos();
  NN_FRAMEWORK.Search();
  NN_FRAMEWORK.search_product();
});
