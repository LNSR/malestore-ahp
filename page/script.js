// Add an event listener to the select-all checkbox
function CheckboxSelect() {
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
}

// Preview Image
function GambarProfile() {
  const fileInput = document.querySelector('input[type="file"]');
  const previewImg = document.querySelector('#preview');

  const handleFileChange = () => {
    const file = fileInput.files[0];
    const reader = new FileReader();

    reader.addEventListener('load', () => {
      previewImg.src = reader.result;
    });

    if (file) {
      reader.readAsDataURL(file);
    } else {
      previewImg.src = '#';
    }
    previewImg.style.display = 'block';
  };

  fileInput.addEventListener('change', handleFileChange);

  if (!fileInput.files.length) {
    previewImg.style.display = 'none';
  }
}

// Dark Mode
function toggleDarkMode() {
  const darkModeToggle = document.getElementById('dark-mode-toggle');
  const body = document.body;
  const toggleText = document.getElementById('dark-mode-toggle-text');

  if (localStorage.getItem('darkMode') === 'true') {
    body.classList.add('dark-mode');
    darkModeToggle.checked = true;
    toggleText.textContent = 'Dark Mode Aktif';
  }

  darkModeToggle.addEventListener('change', () => {
    body.classList.toggle('dark-mode');
    localStorage.setItem('darkMode', darkModeToggle.checked);
    if (darkModeToggle.checked) {
      toggleText.textContent = 'Dark Mode Aktif';
    } else {
      toggleText.textContent = 'Dark Mode';
    }
  });
}


// Toggle Collapse button
function toggleCard(button) {
  var target = $(button).attr('data-target');
  $(target).on('show.bs.collapse', function() {
    $(this).prev('.card-header').find('.btn i').removeClass('fa-chevron-down').addClass('fa-chevron-up');
  }).on('hide.bs.collapse', function() {
    $(this).prev('.card-header').find('.btn i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
  });

  var icon = $(button).find('i');
  icon.removeClass('fa-chevron-down fa-chevron-up').addClass($(target).hasClass('show')? 'fa-chevron-up' : 'fa-chevron-down');

  if ($(target).hasClass('collapse')) {
    icon.removeClass('fa-chevron-up fa-chevron-down').addClass($(target).hasClass('show')? 'fa-chevron-down' : 'fa-chevron-up');
  }
}


// Laporan Print
function printReport() {
  // Hide the print button
  document.getElementById("printButton").style.display = "none";
  document.getElementById("reset-button").style.display = "none";
  document.getElementById("logo").style.display = "block";

  // Show the printable content
  const printableContent = document.getElementById('printable-content');
  printableContent.classList.remove('hidden');

  // Print the page
  window.print();

  // Hide the printable content
  printableContent.classList.add('hidden');

  // Show the print button after printing
  document.getElementById("printButton").style.display = "block";
  document.getElementById("reset-button").style.display = "block";
  document.getElementById("logo").style.display = "none";
}

// Laporan Print(compatible for all)
function printReport1() {
  // Get the selected month
  const storedValue = localStorage.getItem("selectedMonth");
  const selectedDate = new Date(storedValue);
  const bln = selectedDate.toLocaleString('id-ID', { month: 'long' });
  const thn = selectedDate.getFullYear();
  const footerText = `Banjarmasin, ____ ${bln} ${thn}`;

  // Check if dark mode is on
  const body = document.body;
  if (body.classList.contains('dark-mode')) {
    // Turn off dark mode
    body.classList.remove('dark-mode');
    localStorage.setItem('darkMode', false);
  }

  // Get the URL of the print page
  const printUrl = `?page=laporan&aksi=print&bln=${bln}&thn=${thn}`;

  // Open the print window
  const printWindow = window.open(printUrl, '_blank');

  // Wait for the window to load
  printWindow.onload = function() {
    // Update the title and footer text
    printWindow.document.title = `Laporan ${bln} ${thn} Malestore`;
    printWindow.document.getElementById("printable-content").querySelector("strong").textContent = footerText;

    // Print the page
    printWindow.print();
  };

  // Redirect to the laporan page after a delay
  setTimeout(function() {
    if (printWindow && !printWindow.closed) {
      printWindow.close();
    }
    window.location.href = '?page=laporan';
  }, 5000);

  // Handle errors
  window.onerror = function() {
    if (printWindow && !printWindow.closed) {
      printWindow.close();
    }
    window.location.href = '?page=laporan';
  };
}

// Reset Bulan Laporan
function resetMonth() {
  if (confirm("Apakah ingin mereset bulan?")) {
    localStorage.removeItem("selectedMonth");
    const selectedDate = new Date();
    const bln = selectedDate.toLocaleString('id-ID', { month: 'long' });
    const thn = selectedDate.getFullYear();
    
    // Update the footer with the current month and year
    const footer = document.getElementById("printable-content");
    const footerText = `Banjarmasin. ${bln} ${thn}`;
    footer.querySelector("strong").textContent = footerText;
    window.location.reload();
  }
}

// Set Period Month and Year according to 'laporan.php'
function setPeriodTitle() {
  const selectedDate = new Date(localStorage.getItem("selectedMonth") || new Date());
  const bln = selectedDate.toLocaleString('id-ID', { month: 'long' });
  const thn = selectedDate.getFullYear();
  document.getElementById("period-title").innerHTML = "Grafik Performa Karyawan Periode " + bln + " " + thn;
}

// Laporan Title
function updateReportTitle() {
  const periode = document.getElementById("periode");
  const title = document.querySelector("title");
  const storedValue = localStorage.getItem("selectedMonth");
  if (storedValue) {
    periode.value = storedValue;
    const selectedDate = new Date(storedValue);
    const bln = selectedDate.toLocaleString('id-ID', { month: 'long' });
    const thn = selectedDate.getFullYear();
    title.innerHTML = `Laporan ${bln} ${thn} Malestore`;
    document.title = `Laporan ${bln} ${thn} Malestore`;
    document.querySelector("h3 b").innerHTML = `Penilaian Kinerja Karyawan Malestore <br> Periode ${bln} ${thn}`;
  }
  periode.addEventListener("change", function() {
    localStorage.setItem("selectedMonth", periode.value);
    const selectedDate = new Date(periode.value);
    const bln = selectedDate.toLocaleString('id-ID', { month: 'long' });
    const thn = selectedDate.getFullYear();
    title.innerHTML = `Laporan ${bln} ${thn} Malestore`;
    document.title = `Laporan ${bln} ${thn} Malestore`;
    document.querySelector("h3 b").innerHTML = `Penilaian Kinerja Karyawan Malestore <br> Periode ${bln} ${thn}`;

    // Update the footer with the selected month and year
    const footer = document.getElementById("printable-content");
    const footerText = `Banjarmasin, ____ ${bln} ${thn}`;
    footer.querySelector("strong").textContent = footerText;
  });
}