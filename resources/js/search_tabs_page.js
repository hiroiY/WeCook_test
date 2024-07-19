'use strict';

document.addEventListener('DOMContentLoaded', () => {
  const tabMenus = document.querySelectorAll('.tab_menu-item');
  const recentlyTabId = '01'; 

  // save the current page for each tab
  function saveCurrentPage(keyword,tabId, page) {
    sessionStorage.setItem(`${keyword}_page_${tabId}`, page);
  }

  // get the saved current page for a tab
  function getCurrentPage(keyword,tabId) {
    return sessionStorage.getItem(`${keyword}_page_${tabId}`) || 1;
  }

  // reset the current page for a tab to 1
  function resetCurrentPage(keyword,tabId) {
    sessionStorage.getItem(`${keyword}_page_${tabId}`);
  }
  //I ask my batch member which is better for wecook the tab keep the page  it's user looked or not.

  // get the keyword 
  function getKeyword() {
    return localStorage.getItem('keyword');
  }

  // remove the keyword 
  function removeKeyword() {
    return localStorage.removeItem('keyword');
  }
  
  // Save scroll position
  function saveScrollPosition() {
    const path = window.location.pathname;
    const path_search = path.search;
    sessionStorage.setItem(path_search + '_scrollPosition', window.scrollY || document.documentElement.scrollTop);
  }

  // Restore scroll position
  function restoreScrollPosition() {
    const path = window.location.pathname;
    const path_search = path.search;
    const savedPosition = sessionStorage.getItem(path_search + '_scrollPosition');
    if (savedPosition) {
      window.scrollTo(0, parseInt(savedPosition, 10));
    }
    sessionStorage.removeItem(path_search + '_scrollPosition');
  }

  //default scroll position
  function contentStartScroll() {
    const contentStart = document.getElementById('content-start');
    contentStart.scrollIntoView({behavior:"instant"});
    //Honestly, I want to use "smooth" but it's so laggy when it is used. I don't know which is heavy My laptop or WeCook or both but I guess a reasen is there.
  }

  // Save the active tab to session storage
  function saveActiveTab(tabId) {
    sessionStorage.setItem('activeTab', tabId);
  }

  // Restore the active tab from session storage
  function restoreActiveTab() {
    const activeTabId = sessionStorage.getItem('activeTab');
    if (activeTabId) {
      const tabToActivate = document.querySelector(`.tab_menu-item[data-tab="${activeTabId}"]`);
      if (tabToActivate) {
        tabToActivate.click();
      }
    }
  }

  // Tab switching logic
  function tabSwitch(tabMenu) {
    const tabTargetData = tabMenu.dataset.tab;
    const tabList = tabMenu.closest('.tab_menu');
    const tabItems = tabList.querySelectorAll('.tab_menu-item');
    const tabPanelItems = tabList.nextElementSibling.querySelectorAll('.tab_panel-box');

    tabItems.forEach((tabItem) => {
      tabItem.classList.remove('is-active');
    });
    tabPanelItems.forEach((tabPanelItem) => {
      tabPanelItem.classList.remove('is-show');
    });

    tabMenu.classList.add('is-active');
    tabPanelItems.forEach((tabPanelItem) => {
      if (tabPanelItem.dataset.panel === tabTargetData) {
        tabPanelItem.classList.add('is-show');
      }
    });

    // Load the current page for the new tab
    loadCurrentPage(tabTargetData);
  }

  // Load the current page for a tab
  function loadCurrentPage(tabId) {
    const keyword = getKeyword();
    const tabPanel = document.querySelector(`.tab_panel-box[data-panel="${tabId}"]`);
    if (tabPanel) {
      const currentPage = getCurrentPage(keyword,tabId);
      const paginationLinks = tabPanel.querySelectorAll('.pagination a');
      if (paginationLinks.length > 0) {
        const pageLink = paginationLinks[0].href.replace(/page=\d+/, `page=${currentPage}`);
        loadPage(pageLink, tabPanel);

        // Add active on current page link
        const currentLink = Array.from(paginationLinks).find(link => {
          return new URL(link.href).searchParams.get('page') === currentPage;
        });
        if (currentLink) {
          currentLink.classList.add('active');
          console.log(currentLink);
        }
      }
    }
  }

  // Load page content dynamically
  function loadPage(url, tabPanel) {
    fetch(url)
      .then(response => response.text())
      .then(html => {
        const parser = new DOMParser();
        const doc = parser.parseFromString(html, 'text/html');
        const newContent = doc.querySelector(`.tab_panel-box[data-panel="${tabPanel.dataset.panel}"]`);
        if (newContent) {
          tabPanel.innerHTML = newContent.innerHTML;

          const paginationLinks = tabPanel.querySelectorAll('.pagination a');
          paginationLinks.forEach(link => {
            link.addEventListener('click', (e) => {
              e.preventDefault();
              const keyword = getKeyword();
              const url = e.currentTarget.href;
              const page = new URL(url).searchParams.get('page');
              saveCurrentPage(keyword,tabPanel.dataset.panel, page);
              loadPage(url, tabPanel);
              contentStartScroll();
              // get the keyword on page load
              getKeyword();
            });
          });
        }
      })
      .catch(error => console.error('Error loading page:', error));
  }

  tabMenus.forEach((tabMenu) => {
    tabMenu.addEventListener('click', (e) => {
      const keyword = getKeyword();
      const tabId = e.target.dataset.tab;
      const activeTabId = sessionStorage.getItem('activeTab');

      if (tabId !== activeTabId) {
        resetCurrentPage(keyword,activeTabId); // Reset the current page
      }

      saveActiveTab(tabId);
      tabSwitch(e.target);
    });
  });

  window.addEventListener('load', () => {
    restoreScrollPosition();
    saveActiveTab(recentlyTabId);
    resetCurrentPage(recentlyTabId);
    const recentlyTab = document.querySelector(`.tab_menu-item[data-tab="${recentlyTabId}"]`);
    if (recentlyTab) {
      recentlyTab.click();
    }
    // get the keyword on page load
    const keyword = getKeyword();
    // document.getElementById('keyword').textContent = keyword;
  });

  window.addEventListener('beforeunload', saveScrollPosition);
  window.addEventListener('popstate', () => {
    restoreActiveTab();
    restoreScrollPosition();
    removeKeyword()
  });
});