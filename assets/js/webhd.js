jQuery(function ($) {
  jQuery(".catagory-title").on("click", function () {
    if ($(".catagory-list__fix").css("display") == "none") {
      $(".catagory-list__fix").animate(
        {
          height: "show",
        },
        400
      );
    } else {
      $(".catagory-list__fix").animate(
        {
          height: "hide",
        },
        200
      );
    }
  });
  jQuery(".catagory-list__fix li span").on("click", function () {
    let id = $(this).attr("data-id");
    if ($("#cat2__fix_" + id).css("display") == "none") {
      $("#cat2__fix_" + id).animate(
        {
          height: "show",
        },
        400
      );
    } else {
      $("#cat2__fix_" + id).animate(
        {
          height: "hide",
        },
        200
      );
    }
  });
  jQuery(".catagory-list li span").on("click", function () {
    let id = $(this).attr("data-id");
    if ($("#cat2_" + id).css("display") == "none") {
      $("#cat2_" + id).animate(
        {
          height: "show",
        },
        400
      );
    } else {
      $("#cat2_" + id).animate(
        {
          height: "hide",
        },
        200
      );
    }
  });

  $(".tailvideo_item_owl").click(function () {
    let id = $(this).attr("data-src");
    let img = $(this).attr("data-image");
    let name = $(this).attr("data-name");
    $(".pic-video").attr("data-src", id);
    $(".pic-video img").attr("src", img);
    $(".name-video").html(name);
  });

  $(document).on("click", ".menu_mobi .menulicha", function (event) {
    $(".close_menu").trigger("click");
    return false;
  });

  var menu_mobi = $(".desktop-menu").html();
  $(".menu_mobi_add").append(
    '<span class="close_menu"><i class="fas fa-times"></i></span><ul>' +
      menu_mobi +
      "</ul>"
  );

  $(".menu_mobi_add ul li ul").removeClass("menu_cap_con");
  $(".menu_mobi_add ul li ul").css({
    display: "none",
  });
  $(".menu_mobi_add ul li ul li ul").removeClass("menu_cap_2");
  $(".menu_mobi_add ul li ul li ul").css({
    display: "none",
  });
  $(".menu_mobi_add ul li ul li ul li ul").removeClass("menu_cap_3");
  $(".menu_mobi_add ul li ul li ul li ul").css({
    display: "none",
  });

  $(".menu_mobi_add ul li").each(function (index, element) {
    if ($(this).children("ul").children("li").length > 0) {
      $(this).children("a").append('<i class="fas fa-chevron-right"></i>');
    }
  });
  $(".menu_mobi_add ul li a i").click(function () {
    if ($(this).parent("a").hasClass("active2")) {
      $(this).parent("a").removeClass("active2");
      if (
        $(this).parent("a").parent("li").children("ul").children("li").length >
        0
      ) {
        $(this).parent("a").parent("li").children("ul").css({
          display: "none",
        });
        //$(this).parent('a').parent('li').children('ul').hide(300);
        return false;
      }
    } else {
      $(this).parent("a").addClass("active2");
      if ($(this).parents("li").children("ul").children("li").length > 0) {
        //$(".menu_m ul li ul").hide(0);
        //$(this).parents('li').children('ul').show(300);
        $(".menu_m ul li ul").css({
          display: "none",
        });
        $(this).parents("li").children("ul").css({
          display: "block",
        });
        return false;
      }
    }
  });

  $(".icon_menu_mobi,.close_menu,.menu_baophu").click(function () {
    if ($(".menu_mobi_add").hasClass("menu_mobi_active")) {
      $(".menu_mobi_add").removeClass("menu_mobi_active");
      $(".menu_baophu").fadeOut(300);
    } else {
      $(".menu_mobi_add").addClass("menu_mobi_active");
      $(".menu_baophu").fadeIn(300);
    }
    return false;
  });

  $(function () {
    $('[data-toggle="tooltip"]').tooltip();
  });

  $(document).ready(function () {
    let firstActiveItem = $(".auto_quatrinhhinhthanh .owl-item.active").first();
    if (firstActiveItem.length) {
      firstActiveItem.addClass("new-class");
    }

    let owl = $(".auto_quatrinhhinhthanh");
    owl.on("initialized.owl.carousel translated.owl.carousel", function () {
      $(".auto_quatrinhhinhthanh .owl-item").removeClass("new-class");
      let firstActiveItem = $(
        ".auto_quatrinhhinhthanh .owl-item.active"
      ).first();
      if (firstActiveItem.length) {
        firstActiveItem.addClass("new-class");
      }
    });
  });

  var rating_inner = $(".rating--inner");
  $.each(rating_inner, function (index, item) {
    $(item)
      .not($(".selected"))
      .find("li")
      .on("click", function (e) {
        e.preventDefault();
        $(item).find("li").removeClass("active");
        var _target = $(this);
        _target.addClass("active");

        var star_ck = $(".rating--inner").find("li.active").data("star");
        $(".start").val(star_ck);
      });
  });
});
