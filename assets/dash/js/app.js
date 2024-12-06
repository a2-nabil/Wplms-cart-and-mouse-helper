document.addEventListener("DOMContentLoaded", function () {
  //  for password show - hide
  const currentPassword = document.getElementById("inputPass");
  const currentPasswordToggler = document.getElementById(
    "current_password_toggler"
  );
  const newPassword = document.getElementById("inputNewPass");
  const newPasswordToggler = document.getElementById("new_password_toggler");
  const confirmPassword = document.getElementById("inputConfirmPass");
  const confirmPasswordToggler = document.getElementById(
    "confirm_password_toggler"
  );

  // reusable function for password show hide
  function showHidePassword(passwordField, togglerElement) {
    if (passwordField.type === "password") {
      passwordField.setAttribute("type", "text");
      togglerElement.classList.add("fa-eye-slash");
    } else {
      togglerElement.classList.remove("fa-eye-slash");
      passwordField.setAttribute("type", "password");
    }
  }

  // for current password
  currentPasswordToggler.addEventListener("click", function () {
    showHidePassword(currentPassword, currentPasswordToggler);
  });
  // for new password
  newPasswordToggler.addEventListener("click", function () {
    showHidePassword(newPassword, newPasswordToggler);
  });
  // for confirm password
  confirmPasswordToggler.addEventListener("click", function () {
    showHidePassword(confirmPassword, confirmPasswordToggler);
  });

  //  main tabs and nav
  const nxtNavbarToggle = document.getElementById("a2n_navbar-toggle");
  const nxtNavList = document.getElementById("a2n_nav-list");
  const nxtTabs = document.querySelectorAll(".a2n_dash_tabs");
  const nxtNavLinks = document.querySelectorAll("#a2n_nav-list li a");
  const nxtUserNavLinks = document.querySelectorAll(".a2n_user_log ul li a");
  const mainScrolledDiv = document.querySelector(".a2n-dash_container");

  nxtNavbarToggle.addEventListener("click", function () {
    nxtNavList.classList.toggle("a2n_show_nav");
    nxtNavbarToggle.classList.toggle("a2n_nav_active");
  });

  // Function to remove active class from all nav links
  function removeActiveClass() {
    nxtNavLinks.forEach(function (navLink) {
      navLink.classList.remove("a2n_active");
    });
    nxtUserNavLinks.forEach(function (userNavLink) {
      userNavLink.classList.remove("a2n_active");
    });
  }

  // Function to set active tab based on hash in URL
  function setActiveTabFromHash() {
    const hash = window.location.hash.substring(1);
    if (hash) {
      removeActiveClass();
      nxtTabs.forEach((tab) => tab.classList.remove("a2n_active_tab"));
      const selectedTab = document.getElementById(hash);
      if (selectedTab) {
        selectedTab.classList.add("a2n_active_tab");
        const correspondingNavLink = document.querySelector(
          `#a2n_nav-list li a[href="#${hash}"]`
        );
        if (correspondingNavLink) {
          correspondingNavLink.classList.add("a2n_active");
        }
        mainScrolledDiv.scrollTop = 0;
      }
      const correspondingUserNavLink = document.querySelector(
        `.a2n_user_log ul li a[href="#${hash}"]`
      );
      if (correspondingUserNavLink) {
        correspondingUserNavLink.classList.add("a2n_active");
      }
    } else {
      // If no hash is present, activate the first tab by default
      const firstTab = nxtTabs[0];
      if (firstTab) {
        firstTab.classList.add("a2n_active_tab");
        const firstNavLink = nxtNavLinks[0];
        if (firstNavLink) {
          firstNavLink.classList.add("a2n_active");
        }
        mainScrolledDiv.scrollTop = 0;
      }
    }
  }

  // Event listener for navigation links
  nxtNavLinks.forEach(function (link) {
    link.addEventListener("click", function (event) {
      event.preventDefault();
      removeActiveClass();
      link.classList.add("a2n_active");
      nxtNavList.classList.remove("a2n_show_nav");
      nxtNavbarToggle.classList.remove("a2n_nav_active");
      const targetTabId = this.getAttribute("href").substring(1);
      history.pushState(null, "", `#${targetTabId}`);
      changeTab(targetTabId);
      const correspondingNavLink = document.querySelector(
        `.a2n_user_log ul li a[href="#${targetTabId}"]`
      );
      if (correspondingNavLink) {
        correspondingNavLink.classList.add("a2n_active");
      }
    });
  });

  // Event listener for user navigation links
  nxtUserNavLinks.forEach(function (link) {
    link.addEventListener("click", function (event) {
      if (link.id === "logout") return;
      event.preventDefault();
      removeActiveClass();
      link.classList.add("a2n_active");
      const targetTabId = this.getAttribute("href").substring(1);
      history.pushState(null, "", `#${targetTabId}`);
      changeTab(targetTabId);
      const correspondingNavLink = document.querySelector(
        `#a2n_nav-list li a[href="#${targetTabId}"]`
      );
      if (correspondingNavLink) {
        correspondingNavLink.classList.add("a2n_active");
      }
    });
  });

  function changeTab(tabId) {
    nxtTabs.forEach((tab) => tab.classList.remove("a2n_active_tab"));
    const selectedTab = document.getElementById(tabId);
    if (selectedTab) {
      selectedTab.classList.add("a2n_active_tab");
      mainScrolledDiv.scrollTop = 0;
    }
  }

  // Set active tab on page load
  setActiveTabFromHash();

  // common functions for tab sections
  function setupTabNavigation(
    navLinksSelector,
    tabsSelector,
    navActiveClass,
    tabsActiveClass
  ) {
    const navLinks = document.querySelectorAll(navLinksSelector);
    const tabs = document.querySelectorAll(tabsSelector);

    navLinks.forEach(function (link) {
      link.addEventListener("click", function (event) {
        event.preventDefault();
        navLinks.forEach(function (navLink) {
          if (navLink !== link) {
            navLink.classList.remove(navActiveClass);
          }
        });
        link.classList.add(navActiveClass);
        const targetTabId = this.getAttribute("href").substring(1);
        switchTab(targetTabId, tabs, tabsActiveClass);
      });
    });
  }

  function switchTab(tabId, tabs, tabsActiveClass) {
    tabs.forEach((tab) => tab.classList.remove(tabsActiveClass));
    const selectedTab = document.getElementById(tabId);
    if (selectedTab) {
      selectedTab.classList.add(tabsActiveClass);
    }
  }

  // profile tab
  setupTabNavigation(
    "#a2n_p-nav li a",
    ".a2n-p_tab",
    "a2n_p-active",
    "a2n-p_active-tab"
  );
  // courses tab
  setupTabNavigation(
    "#a2n_c-nav li a",
    ".a2n-c_tab",
    "a2n_c-active",
    "a2n-c_active-tab"
  );
});
