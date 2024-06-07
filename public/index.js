'use strict'; /*Checking error */

/*Local-scope */
{ 
  const tabMenus = document.querySelectorAll('.tab_menu-item');

  //Add event
  tabMenus.forEach((tabMenu) => {
    tabMenu.addEventListener('click', tabSwitch);
  })

  /*processing of event */
  function tabSwitch(e) {
    //Get the element's data it was clicked
    const tabTargetData = e.currentTarget.dataset.tab;

    /* Get the parent element and the child element data it was clicked */
    const tabList = e.currentTarget.closest('.tab_menu');
    const tabItems = tabList.querySelectorAll('.tab_menu-item');


    /* Get the child elements of the parent's sibling element it was clicked */
    const tabPanelItems = tabList.nextElementSibling
                          .querySelectorAll('.tab_panel-box');


    /* Delete menu and panel classes at the same level of the clicked tab */
    tabItems.forEach((tabItem) => {
      tabItem.classList.remove('is-active');
    })
    tabPanelItems.forEach((tabPanelItem) => {
      tabPanelItem.classList.remove('is-show');
    })

    /* Add is-active class at menu element of the clicked */
    e.currentTarget.classList.add('is-active');

    /* Add is-show class to the panel with values equal to the data attribute of the menu cliked */
    tabPanelItems.forEach((tabPanelItem) => {
      if(tabPanelItem.dataset.panel === tabTargetData) {
        tabPanelItem.classList.add('is-show');
      }
    })
  }

}

