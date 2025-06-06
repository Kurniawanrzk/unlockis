const btnsidebar = document.getElementById('btn-sidebar');
const sidebar = document.getElementById('sidebar');
const close = document.querySelector('.close-sidebar');
const sidebarcontent = document.querySelector('.sidebar-content');
var sidebarstate = false;

btnsidebar.addEventListener('click', () => {
  sidebar.style.width = '300px';
  sidebarstate = true;
  sidebarcontent.style.display = 'flex';
  close.style.display = 'block';
});

close.addEventListener('click', () => {
  sidebar.style.width = '0px';
  sidebarstate = false;
  sidebarcontent.style.display = 'none';
  close.style.display = 'none';
});
