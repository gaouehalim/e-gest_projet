
const sidebar = document.getElementById('sidebar');
const toggleButton = document.getElementById('toggleSidebar');

toggleButton.addEventListener('click', () => {
    sidebar.classList.toggle('hidden');
});
