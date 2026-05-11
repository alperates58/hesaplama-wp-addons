function hcNakitYakmaHiziHesapla() {
    const start = parseFloat(document.getElementById('hc-nyh-start').value);
    const end = parseFloat(document.getElementById('hc-nyh-end').value);
    const months = parseFloat(document.getElementById('hc-nyh-months').value);

    if (isNaN(start) || isNaN(end) || !months) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // Burn Rate = (Start - End) / Months
    const burnRate = (start - end) / months;
    
    // Runway = Remaining / Burn Rate
    const runway = burnRate > 0 ? (end / burnRate) : Infinity;

    document.getElementById('hc-nyh-rate').innerText = burnRate.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺ / ay';
    
    if (burnRate <= 0) {
        document.getElementById('hc-nyh-runway').innerText = 'Nakit yakımı yok (Pozitif nakit akışı)';
    } else {
        document.getElementById('hc-nyh-runway').innerText = runway.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Ay';
    }

    document.getElementById('hc-nyh-result').classList.add('visible');
}
