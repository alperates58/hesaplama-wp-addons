function hcBebekBakıcısıÜcretiHesapla() {
    const hours = parseFloat(document.getElementById('hc-ny-hours').value);
    const kidFactor = parseFloat(document.getElementById('hc-ny-kids').value);

    if (!hours) return;

    // 2026 Tahmini: Saatlik ortalama 200 TL
    const hourlyRate = 200;
    const monthlyTotal = hours * 4.3 * hourlyRate * kidFactor;

    document.getElementById('hc-ny-val').innerText = monthlyTotal.toLocaleString('tr-TR', { style: 'currency', currency: 'TRY' });
    document.getElementById('hc-ny-result').classList.add('visible');
}
