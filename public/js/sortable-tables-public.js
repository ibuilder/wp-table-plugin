document.addEventListener('DOMContentLoaded', function() {
    const table = document.querySelector('.sortable-table');
    const headers = table.querySelectorAll('th');
    const tbody = table.querySelector('tbody');

    headers.forEach((header, index) => {
        header.addEventListener('click', () => {
            const rows = Array.from(tbody.querySelectorAll('tr'));
            const isAscending = header.classList.toggle('asc');
            const direction = isAscending ? 1 : -1;

            rows.sort((a, b) => {
                const aText = a.children[index].textContent.trim();
                const bText = b.children[index].textContent.trim();

                return aText.localeCompare(bText, undefined, { numeric: true }) * direction;
            });

            rows.forEach(row => tbody.appendChild(row));
        });
    });

    const filterInput = document.querySelector('.table-filter-input');
    filterInput.addEventListener('input', function() {
        const filterValue = this.value.toLowerCase();
        const rows = tbody.querySelectorAll('tr');

        rows.forEach(row => {
            const cells = Array.from(row.querySelectorAll('td'));
            const isVisible = cells.some(cell => cell.textContent.toLowerCase().includes(filterValue));
            row.style.display = isVisible ? '' : 'none';
        });
    });
});