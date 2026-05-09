function hcDogumTarihiHesapla() {
    const satStr = document.getElementById('hc-dt-sat').value;
    if (!satStr) { alert('Lütfen son adet tarihinizi seçin.'); return; }

    const sat = new Date(satStr);
    const dt = new Date(sat);
    dt.setDate(sat.getDate() + 280);

    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    const dtFormatted = dt.toLocaleDateString('tr-TR', options);

    // Calculate remaining time
    const now = new Date();
    const diff = dt - now;
    const daysLeft = Math.ceil(diff / (1000 * 60 * 60 * 24));

    document.getElementById('hc-dt-val').innerText = dtFormatted;
    document.getElementById('hc-dt-info').innerHTML = `
        <p>Gebelik Süresi: 280 gün (40 hafta)</p>
        <p>Doğuma Kalan Tahmini Süre: <strong>${daysLeft > 0 ? daysLeft + ' gün' : 'Süre doldu'}</strong></p>
    `;
    document.getElementById('hc-dt-result').classList.add('visible');
}
