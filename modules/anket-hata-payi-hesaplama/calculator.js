function hcMarginErrorHesapla() {
    const pop = parseFloat(document.getElementById('hc-me-pop').value) || Infinity;
    const sample = parseFloat(document.getElementById('hc-me-sample').value);
    const z = parseFloat(document.getElementById('hc-me-conf').value);

    if (isNaN(sample) || sample <= 0) {
        alert('Lütfen geçerli bir örneklem büyüklüğü girin.');
        return;
    }

    const p = 0.5;
    const q = 0.5;

    // Infinite population formula
    let error = z * Math.sqrt((p * q) / sample);

    // Finite population correction
    if (pop !== Infinity && pop > sample) {
        error = error * Math.sqrt((pop - sample) / (pop - 1));
    }

    const result = error * 100;

    document.getElementById('hc-res-me-val').innerText = '± %' + result.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    document.getElementById('hc-anket-hata-payi-hesaplama-result').classList.add('visible');
}
