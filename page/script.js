// Add an event listener to the select-all checkbox
const selectAllCheckbox = document.getElementById('select-all-checkbox');
selectAllCheckbox.addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(function(checkbox) {
        switch (checkbox.name) {
            case 'id_karyawan[]':
            case 'id_jabatan[]':
            case 'kriteria_id[]':
                checkbox.checked = selectAllCheckbox.checked;
                break;
        }
    });
});