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