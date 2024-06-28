'use strict';

  document.addEventListener('DOMContentLoaded', () => {
  const tabMenus = document.querySelectorAll('.tab_menu-item');
  // const tabPanelItems = document.querySelectorAll('.tab_panel-box');

    // // Event listeners added to pagination links.
    // const paginationLinks = document.querySelectorAll('.pagination-link');
    // paginationLinks.forEach(link => {
    //   link.addEventListener('click', () => {
    //     scrollToContentStart();
    //   });
    // });
  
   // Save scroll position.
   function saveScrollPosition() {
    const path = window.location.pathname;
    // sessionStorage.setItem(path + '_scrollPosition', window.scrollY || document.documentElement.scrollTop);
    sessionStorage.setItem("tab_panel", 0);
  }

  // Restor Saved scroll position.
  function restoreScrollPosition() {
    const path = window.location.pathname;
    const savedPosition = sessionStorage.getItem(path + '_scrollPosition');
    if (savedPosition) {
      window.scrollTo(0, parseInt(savedPosition, 10));
    }
    //remove the scroll position 
    sessionStorage.removeItem(path + '_scrollPosition');
  }

  // Save scroll position before leaving the page.
  window.addEventListener('load', () => {
    const element = document.getElementById('content-start');
    if (element) {
      element.scrollIntoView();
    }

    // Restore the scroll position
    restoreScrollPosition();

    // Restore tab state on page load.
    restoreActiveTab();
  });
  
  // Save scroll position before leaving the page.
  window.addEventListener('beforeunload', saveScrollPosition);
  
  // Restore tab state and scroll position on popstate event.
  window.addEventListener('popstate', () => {
    restoreActiveTab();
    restoreScrollPosition();
  });
  
  // Scroll to 'content-start' element when it's available
  window.addEventListener('load', () => {
    const element = document.getElementById('content-start');
    if (element) {
      element.scrollIntoView();
    }
    const tabData = sessionStorage.getItem("tab_panel");
    tabSwitch(tabData);
  });

   // Function to save the tab state to session storage.
  function saveActiveTab(tabId) {
    sessionStorage.setItem('activeTab', tabId);
  }

  //Restoring tab status from session storage.
  function restoreActiveTab() {
    const activeTabId = sessionStorage.getItem('activeTab');
    if (activeTabId) {
      const tabToActivate = document.querySelector(`.tab_menu-item[data-tab="${activeTabId}"]`);
      if (tabToActivate) {
        tabToActivate.click();
      }
    }
  }
   // tabMenu click events.
  tabMenus.forEach((tabMenu) => {
    tabMenu.addEventListener('click', (e) => {
      const tabId = e.target.dataset.tab;
      saveActiveTab(tabId); //save tab status
      tabSwitch(e); //Calls the tab switching process.
    });
  });

  //Processing of tab switching
  function tabSwitch(e) {
    const tabTargetData = e.currentTarget.dataset.tab;
    const tabList = e.currentTarget.closest('.tab_menu');
    const tabItems = tabList.querySelectorAll('.tab_menu-item');
    const tabPanelItems = tabList.nextElementSibling.querySelectorAll('.tab_panel-box');

    tabItems.forEach((tabItem) => {
      tabItem.classList.remove('is-active');
    });
    tabPanelItems.forEach((tabPanelItem) => {
      tabPanelItem.classList.remove('is-show');
    });

    e.currentTarget.classList.add('is-active');
    tabPanelItems.forEach((tabPanelItem) => {
      if (tabPanelItem.dataset.panel === tabTargetData) {
        tabPanelItem.classList.add('is-show');
      }
    });
    sessionStorage.setItem("tab_panel",tabTargetData);
  }

    // Restore tab state on page load.
  restoreActiveTab();
});
