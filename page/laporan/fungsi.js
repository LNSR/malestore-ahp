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
  }
});