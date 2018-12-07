jQuery(document).ready(function() {
  hambargerMenu();
  const time = 0.1;
  jQuery(".thumbs__thumb").hover(
    function() {
      TweenMax.to(jQuery(this).find("img"), time, {
        webkitFilter: "blur(10px)"
      }),
        TweenMax.to(jQuery(this).find(".thumbs__thumb__box"), time, {
          display: "block"
        });
    },
    function() {
      TweenMax.to(jQuery(this).find(".thumbs__thumb__box"), time, {
        display: "none"
      }),
        TweenMax.to(jQuery(this).find("img"), time, {
          webkitFilter: "blur(0px)"
        });
    }
  );

  // hambarger menu
  function hambargerMenu() {
    var hamBtn = jQuery("#hamburger");
    var bars = document.getElementsByClassName("bar");
    var nav = jQuery(".nav");
    var lists = jQuery(".nav").find("li");
    var menuToggle = new TimelineMax({
      paused: true,
      reversed: true
    });
    var w = jQuery(window).width();
    var x = 900;
    if (w < x) {
      menuToggle
        .staggerTo(bars, 0.1, {
          cycle: {
            transformOrigi: ["50%", "50%"],
            scale: [1, 0.1, 1],
            y: [5, 0, -5],
            rotation: [45, 0, -45],
            display: ["block", "none", "block"]
          }
        })
        .to(nav, 0.5, {
          display: "flex",
          width: "100vw",
          top: "0",
          position: "fixed",
          zIndex: "9999",
          flexDirection: "column",
          justifyContent: "center",
          alignItems: "center",
          ease: Power4.easeOut
        })
        .staggerTo(
          lists,
          0.5,
          {
            y: -10,
            opacity: 1,
            ease: Linear.easeNone
          },
          0.1
        );
      jQuery(hamBtn).on("click", function() {
        menuToggle.reversed() ? menuToggle.restart() : menuToggle.reverse();
      });
    }

    var $resizeTimer = false;
    jQuery(window).resize(function() {
      if ($resizeTimer !== false) {
        clearTimeout($resizeTimer);
      }
      $resizeTimer = setTimeout(function() {
        var w = jQuery(window).width();
        console.log("resize");
        // menuToggle.kill();
        if (w < x) {
          hambargerMenu();
          jQuery(nav).css({display: "none"});
          jQuery(lists).css({opacity: 0});
        } else {
          jQuery(nav).css({
            display: "flex",
            position: "static",
            width: "50%",
            height: "initial",
            height: "$nav-height",
            flexDirection: "row",
            justifyContent: "flexEnd",
            alignItems: "center"
          });
          jQuery(lists).css({
            opacity: 1,
            position: "relative",
            top: "0px"
          });
        }
      }, 300);
    });
  }
});
// attachment - woocommerce_thumbnail size - woocommerce_thumbnail wp - post - image
