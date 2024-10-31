document.querySelector("form").addEventListener("submit", function(event) {
    let nama = document.getElementById("nama").value;
    let tempatLahir = document.getElementById("tempat_lahir").value;
    let tanggalLahir = document.getElementById("tanggal_lahir").value;
    
    if (!nama || !tempatLahir || !tanggalLahir) {
        alert("Mohon isi semua data wajib.");
        event.preventDefault();
    }
});