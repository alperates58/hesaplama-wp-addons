function hcAshHesapla() {
    const dist = parseFloat(document.getElementById('hc-ash-dist').value);
    const h = parseFloat(document.getElementById('hc-ash-h').value) || 0;
    const m = parseFloat(document.getElementById('hc-ash-m').value) || 0;

    const totalHours = h + (m / 60);

    if (isNaN(dist) || totalHours === 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const speed = dist / totalHours;

    document.getElementById('hc-ash-val').innerText = Math.round(speed) + " km/h";
    document.getElementById('hc-ash-result').classList.add('visible');
}
