document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Mencegah form reload halaman

    // Ambil semua nilai input
    var nama = document.getElementById('nama').value;
    var email = document.getElementById('email').value;
    var subjek = document.getElementById('subjek').value;
    var nomorhp = document.getElementById('nomorhp').value;

    // Ganti dengan nomor WhatsApp kamu
    var nomorWa = '628979408517'; // contoh nomor

    // Buat format pesan
    var pesan = `Halo, roy pengen kasih komentar.%0A%0A*Nama:* ${nama}%0A*Email:* ${email}%0A*Subjek:* ${subjek}%0A*Nomor HP:* ${nomorhp}`;

    // Buat URL WhatsApp
    var url = `https://wa.me/${nomorWa}?text=${pesan}`;

    // Buka WhatsApp
    window.open(url, '_blank');
});
