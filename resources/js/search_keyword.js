'use strict';

//get searched keyword by the searchbar in top navbar
let keyword = document.querySelector('input[type="search"]');

keyword.addEventListener("search", () => {
  localStorage.setItem('keyword', keyword.value);
});
