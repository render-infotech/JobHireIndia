"use strict";

/* ==== Jquery Functions ==== */
(function ($) {
  $('[data-toggle="offcanvas"]').on("click", function () {
    $(".navbar-collapse").toggleClass("show");
  });

  const header = document.getElementById("siteheader");
  const scrollThreshold = 500;

  window.onscroll = () =>
    window.pageYOffset > scrollThreshold
      ? header.classList.add("issticky")
      : header.classList.remove("issticky");

  /* ==== Revolution Slider ==== */
  if ($(".tp-banner").length > 0) {
    $(".tp-banner").show().revolution({
      delay: 6000,
      startheight: 400,
      startwidth: 670,
      hideThumbs: 1000,
      navigationType: "none",
      touchenabled: "on",
      onHoverStop: "on",
      navOffsetHorizontal: 0,
      navOffsetVertical: 0,
      dottedOverlay: "none",
      fullWidth: "on",
    });
  }

  /* ==== Testimonials Slider ==== */
  $(".testimonialsList").owlCarousel({
    loop: true,
    margin: 30,
    nav: true,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
        nav: true,
      },
      768: {
        items: 1,
        nav: true,
      },
      1170: {
        items: 3,
        nav: true,
        loop: true,
      },
    },
  });

  /* ==== ftjobslist Slider ==== */
  $(".ftjobslist").owlCarousel({
    loop: false,
    margin: 30,
    nav: true,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
        nav: true,
      },
      768: {
        items: 2,
        nav: true,
      },
      1170: {
        items: 4,
        nav: true,
        loop: true,
      },
    },
  });

  /* ==== Seekers Slider ==== */
  $(".homeseekerlist").owlCarousel({
    loop: false,
    margin: 15,
    nav: true,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
        nav: true,
      },
      768: {
        items: 3,
        nav: true,
      },
      1170: {
        items: 4,
        nav: true,
      },
    },
  });

  /* ==== Seekers Slider ==== */
  $(".categorylisting").owlCarousel({
    loop: false,
    margin: 15,
    nav: true,
    responsiveClass: true,
    responsive: {
      0: {
        items: 2,
        nav: true,
      },
      768: {
        items: 3,
        nav: true,
      },
      1170: {
        items: 7,
        nav: true,
      },
    },
  });

  $(".custom-prev").click(function () {
    $(".homeseekerlist").trigger("prev.owl.carousel");
  });

  $(".custom-next").click(function () {
    $(".homeseekerlist").trigger("next.owl.carousel");
  });

  /* ==== employerList Slider ==== */
  function employerListOwlSlider() {
    var owl = $(".employerList"),
      dataGroupItem = owl.data("group-item"),
      owlItem = owl.find(".item-child").length;

    var groupNumber = Math.ceil(owlItem / dataGroupItem);
    for (var i = 0; i < groupNumber; i++) {
      owl.append('<div class="item-' + (i + 1) + '"></div>');

      var item = owl.children(".item-child");
      var flag = 0;
      item.each(function () {
        $(this).appendTo(".employerList .item-" + (i + 1));
        if (flag == dataGroupItem - 1) {
          return false;
        }
        flag++;
      });
    }

    owl.owlCarousel({
      loop: false,
      margin: 15,
      responsiveClass: true,
      responsive: {
        0: {
          items: 1,
        },
        767: {
          items: 2,
        },
        1170: {
          items: 5,
        },
      },
    });
  }

  $(".custom-prev-employerList").click(function () {
    $(".employerList").trigger("prev.owl.carousel");
  });

  $(".custom-next-employerList").click(function () {
    $(".employerList").trigger("next.owl.carousel");
  });

  $(".custom-prev-categorylisting").click(function () {
    $(".categorylisting").trigger("prev.owl.carousel");
  });

  $(".custom-next-categorylisting").click(function () {
    $(".categorylisting").trigger("next.owl.carousel");
  });

  // Initialize both sliders
  employerListOwlSlider();
  //categoryListingOwlSlider();

  //Top search bar open/close
  if (!$(".srchbox").hasClass("searchStayOpen")) {
    $("#jbsearch").click(function () {
      $(".srchbox").addClass("openSearch");
      $(".additional_fields").slideDown();
    });

    $(".srchbox").click(function (e) {
      e.stopPropagation();
    });
  }

  window.onload = () => {
    $("#show_alert").modal("show");
  };
})(jQuery);

$(document).ready(function () {
  $(".openmbnav").click(function () {
    let $nav = $("#usermbnav");

    if ($nav.hasClass("show")) {
      $nav.removeClass("show"); // Slide out
      setTimeout(() => {
        $nav.css("display", "none"); // Hide after animation ends
      }, 500); // Match this to the duration of the CSS animation (0.5s)
    } else {
      $nav.css("display", "block"); // Display it
      setTimeout(() => {
        $nav.addClass("show"); // Slide in
      }, 10); // Small delay to allow display:block to take effect before animating
    }
  });
});

$(document).ready(function () {
  // Open the filter jobs menu
  $(".filterjobsnav").click(function () {
    let $nav = $("#filterjobs");

    if ($nav.hasClass("show")) {
      $nav.removeClass("show"); // Slide out
      setTimeout(() => {
        $nav.css("display", "none"); // Hide after the animation completes
      }, 500);
    } else {
      $nav.css("display", "block"); // Display the menu
      setTimeout(() => {
        $nav.addClass("show"); // Slide in
      }, 10);
    }
  });

  // Close the filter jobs menu using the close button
  $(".close-filterjobs").click(function () {
    let $nav = $("#filterjobs");
    $nav.removeClass("show");
    setTimeout(() => {
      $nav.css("display", "none");
    }, 500);
  });

  // Close the filter jobs menu when clicking outside
  $(document).click(function (event) {
    if (!$(event.target).closest("#filterjobs, .filterjobsnav").length) {
      let $nav = $("#filterjobs");
      if ($nav.hasClass("show")) {
        $nav.removeClass("show");
        setTimeout(() => {
          $nav.css("display", "none");
        }, 500);
      }
    }
  });
});

document.querySelectorAll(".submenu-trigger").forEach((trigger) => {
  trigger.addEventListener("mouseenter", () => {
    document.querySelectorAll(".submenu").forEach((menu) => {
      menu.classList.remove("active");
    });

    const target = trigger.dataset.target;
    document.getElementById(target)?.classList.add("active");
  });
});
document.querySelectorAll(".submenu-trigger").forEach((item) => {
  item.addEventListener("mouseenter", function () {
    let target = this.dataset.target;

    document.querySelectorAll(".submenu").forEach((s) => {
      s.style.display = "none";
    });

    document.getElementById(target).style.display = "block";
  });
});
function toggleMenu() {
  document.getElementById("mobileMenu").classList.toggle("active");
  document.getElementById("overlay").classList.toggle("active");
}
function scrollCategories(value) {
  document.getElementById("categoryScroll").scrollBy({
    left: value,
    behavior: "smooth",
  });
}
function scrollCandidates(value) {
  document.getElementById("candidateScroll").scrollBy({
    left: value,
    behavior: "smooth",
  });
}
// OPEN MODAL
function openLoginModal() {
  document.getElementById("loginModal").style.display = "flex";
}

// CLOSE MODAL
function closeLoginModal() {
  document.getElementById("loginModal").style.display = "none";
}

// REDIRECT FUNCTIONS
function goToJobSeeker() {
  window.location.href = "login.html";
}

function goToCompany() {
  window.location.href = "https://jobhireindia.netlify.app/login";
}
// OPEN REGISTER POPUP
function openRegisterModal() {
  document.getElementById("registerModal").style.display = "flex";
}

// CLOSE REGISTER POPUP
function closeRegisterModal() {
  document.getElementById("registerModal").style.display = "none";
}

// REGISTER REDIRECTS
function goToRegisterJobSeeker() {
  window.location.href = "register.html";
}

function goToRegisterCompany() {
  window.location.href = "https://jobsindia.netlify.app/register";
}
function openResumeModal() {
  document.getElementById("resumeModal").style.display = "flex";
}

function closeResumeModal() {
  document.getElementById("resumeModal").style.display = "none";
}

function openEmployeeModal() {
  document.getElementById("employeeModal").style.display = "flex";
}

function closeEmployeeModal() {
  document.getElementById("employeeModal").style.display = "none";
}
function openJobAlert(category) {
  document.getElementById("categoryName").innerText = category;
  document.getElementById("jobAlertModal").style.display = "flex";
}

function closeJobAlert() {
  document.getElementById("jobAlertModal").style.display = "none";
}

function submitJobAlert() {
  let email = document.getElementById("alertEmail").value;

  if (email.trim() === "") {
    alert("Please enter email");
    return;
  }

  // Redirect to jobs page
  window.location.href = "jobs.html";
}
document.querySelectorAll(".faq-item").forEach((item) => {
  item.querySelector(".faq-question").addEventListener("click", () => {
    item.classList.toggle("active");

    const answer = item.querySelector(".faq-answer");

    if (item.classList.contains("active")) {
      answer.style.maxHeight = answer.scrollHeight + "px";
    } else {
      answer.style.maxHeight = "0px";
    }
  });
});
document.getElementById("menuToggle").addEventListener("click", function () {
  document.getElementById("sidebar").classList.toggle("show");
});

// Database submenu toggle
// document
//   .getElementById("databaseToggle")
//   .addEventListener("click", function (e) {
//     e.preventDefault();
//     document.getElementById("databaseSubmenu").classList.toggle("show");
//   });

// User dropdown toggle
document.getElementById("userAvatar").addEventListener("click", function (e) {
  e.stopPropagation();
  document.getElementById("userDropdown").classList.toggle("show");
});

// Close dropdown when clicking outside
document.addEventListener("click", function () {
  document.getElementById("userDropdown").classList.remove("show");
});
document.querySelector(".btn-buy-now").addEventListener("click", function () {
  window.location.href = "buy-credits.html";
});

// Tab switching
document.querySelectorAll(".tab").forEach((tab) => {
  tab.addEventListener("click", function () {
    this.parentElement
      .querySelectorAll(".tab")
      .forEach((t) => t.classList.remove("active"));
    this.classList.add("active");
  });
});

// Close banner
document
  .querySelector(".btn-close-banner")
  .addEventListener("click", function () {
    document.querySelector(".credits-banner").style.display = "none";
  });
// Open credits panel
document.querySelector(".credits-btn").addEventListener("click", function (e) {
  e.preventDefault();
  document.getElementById("creditsPanel").classList.add("show");
  document.getElementById("creditsPanelOverlay").style.display = "block";
});

// Close credits panel
document.getElementById("closeCredits").addEventListener("click", function () {
  document.getElementById("creditsPanel").classList.remove("show");
  document.getElementById("creditsPanelOverlay").style.display = "none";
});

// Close when clicking outside panel
document
  .getElementById("creditsPanelOverlay")
  .addEventListener("click", function () {
    document.getElementById("creditsPanel").classList.remove("show");
    document.getElementById("creditsPanelOverlay").style.display = "none";
  });
