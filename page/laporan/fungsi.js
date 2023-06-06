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


// Set Period Month and Year according to 'laporan.php'
function setPeriodTitle() {
  const selectedDate = new Date(localStorage.getItem("selectedMonth") || new Date());
  const bln = selectedDate.toLocaleString('id-ID', { month: 'long' });
  const thn = selectedDate.getFullYear();
  document.getElementById("period-title").innerHTML = "Grafik Performa Karyawan Periode " + bln + " " + thn;

  // Update the footer with the selected month and year
  const footer = document.getElementById("printable-content");
  const footerText = `Banjarmasin . ${bln} ${thn}`;
  footer.querySelector("strong").textContent = footerText;
}


// Pilih Bulan, Tahun di Date Picker
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

// Add an event listener to the document
const resetButton = document.getElementById("reset-button");
console.log(resetButton);
resetButton.addEventListener("click", function() {
  if (confirm("Apakah ingin mereset bulan?")) {
    localStorage.removeItem("selectedMonth");
    periode.value = "";
    const selectedDate = new Date();
    const bln = selectedDate.toLocaleString('id-ID', { month: 'long' });
    const thn = selectedDate.getFullYear();
    title.innerHTML = `Laporan ${bln} ${thn} Malestore`;
    document.title = `Laporan ${bln} ${thn} Malestore`;
    document.querySelector("h3 b").innerHTML = "Penilaian Kinerja Karyawan Malestore Periode";
    window.location.reload();

    // Update the footer with the current month and year
    const footer = document.getElementById("printable-content");
    const footerText = `Banjarmasin . ${bln} ${thn}`;
    footer.querySelector("strong").textContent = footerText;
  }
});