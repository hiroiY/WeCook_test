'use strict';

document.addEventListener('DOMContentLoaded', () => {
  const tabMenus = document.querySelectorAll('.tab_menu-item');
  const recentlyTabId = '01'; 

  // save the current page for each tab
  function saveCurrentPage(postId,tabId, page) {
    sessionStorage.setItem(`${postId}_page_${tabId}`, page);
  }

  // get the saved current page for a tab
  function getCurrentPage(postId,tabId) {
    return sessionStorage.getItem(`${postId}_page_${tabId}`) || 1;
  }

  // reset the current page for a tab to 1
  function resetCurrentPage(postId,tabId) {
    sessionStorage.getItem(`${postId}_page_${tabId}`);
  }
  //I ask my batch member which is better for wecook the tab keep the page  it's user looked or not.
  
  // Save scroll position
  function saveScrollPosition() {
    const path = window.location.pathname;
    sessionStorage.setItem(path + '_scrollPosition', window.scrollY || document.documentElement.scrollTop);
  }

  // Restore scroll position
  function restoreScrollPosition() {
    const path = window.location.pathname;
    const savedPosition = sessionStorage.getItem(path+ '_scrollPosition');
    if (savedPosition) {
      window.scrollTo(0, parseInt(savedPosition, 10));
    }
    sessionStorage.removeItem(path + '_scrollPosition');
  }

  //default scroll position
  function contentStartScroll() {
    const contentStart = document.getElementById('content-comment');
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
    const postId = window.location.pathname;
    const tabPanel = document.querySelector(`.tab_panel-box[data-panel="${tabId}"]`);
    if (tabPanel) {
      const currentPage = getCurrentPage(postId,tabId);
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
              const postId = window.location.pathname;
              const url = e.currentTarget.href;
              const page = new URL(url).searchParams.get('page');
              saveCurrentPage(postId,tabPanel.dataset.panel, page);
              loadPage(url, tabPanel);
              contentStartScroll();
            });
          });
        }
      })
      .catch(error => console.error('Error loading page:', error));
  }

  tabMenus.forEach((tabMenu) => {
    tabMenu.addEventListener('click', (e) => {
      const postId = window.location.pathname;
      const tabId = e.target.dataset.tab;
      const activeTabId = sessionStorage.getItem('activeTab');

      if (tabId !== activeTabId) {
        resetCurrentPage(postId,activeTabId); // Reset the current page
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
  });

  window.addEventListener('beforeunload', saveScrollPosition);
  window.addEventListener('popstate', () => {
    restoreActiveTab();
    restoreScrollPosition();
  });
});

/* Comment area's Action. If the Edit Button is pushed. */
//The comment's Edit and Save button 
document.addEventListener('DOMContentLoaded', function () 
{
  const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  const setEditButtonListener = (button)=> 
    {
      button.addEventListener('click', function() {
        const commentBody = this.closest('.comments-owner').querySelector('.comment-body');
        const editForm = this.closest('.comments-owner').querySelector('.edit-form');
        const deleteButton = this.closest('.comments-owner').querySelector('.delete-btn');
        const saveButton = editForm.querySelector('.save-btn');

        // Enable direct editing
        commentBody.setAttribute('contenteditable','true');
        commentBody.focus();

        // Show the form and change button text
        editForm.classList.remove('d-none');
        this.classList.add('cancel-btn');
        this.textContent = 'Cancel';
        saveButton.classList.remove('d-none');
        deleteButton.classList.add('d-none');

        // Add event listener to detect blur of the comment body
        const handleBlur = function() {
          // Disable direct editing
          commentBody.setAttribute('contenteditable', 'false');

          // Hide the form
          editForm.classList.add('d-none');
          deleteButton.classList.remove('d-none');
          button.textContent = 'Edit';
          button.classList.remove('cancel-btn');
          saveButton.classList.add('d-none');

          // Remove the blur event listener
          commentBody.removeEventListener('blur', handleBlur);
        };

        commentBody.addEventListener('blur', handleBlur);
    
        // Add event listener for the Cancel button
        this.addEventListener('click', function() 
        {
          if (this.classList.contains('cancel-btn')) 
          {
            // Disable direct editing
            commentBody.setAttribute('contenteditable', 'false');

            // Hide the form
            editForm.classList.add('d-none');
            deleteButton.classList.remove('d-none');
            this.textContent = 'Edit';
            this.classList.remove('cancel-btn');
            saveButton.classList.add('d-none');

            // Remove the blue event listener
            commentBody.removeEventListener('blue', handleBlur);

            //re-add the event listener for the Edit button
            setEditButtonListener(button);
          }
      });
    });
  };

  document.querySelectorAll('.edit-btn').forEach(button => {
    setEditButtonListener(button);
  });

  document.querySelectorAll('.save-btn').forEach(button => {
    button.addEventListener('click', function() {

      const editForm = this.closest('.edit-form');
      const commentBody = this.closest('.comments-owner').querySelector('.comment-body');
      const input = editForm.querySelector('input');

      // Set the edited content to the hidden input
      input.value = commentBody.textContent.trim();

       // Add CSRF token to the form
       const csrfInput = document.createElement('input');
       csrfInput.type = 'hidden';
       csrfInput.name = '_token';
       csrfInput.value = csrfToken;
       editForm.appendChild(csrfInput);

      // Submit the form
      editForm.submit();
    });
  });
});