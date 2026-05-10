function hcHavuzTuzMiktarıHesapla() {
    const vol = parseFloat(document.getElementById('hc-ps-vol').value);
    const current = parseFloat(document.getElementById('hc-ps-current').value) || 0;
    const target = parseFloat(document.getElementById('hc-ps-target').value) || 3200;

    if (!vol) return;

    // ppm = mg/L. 1 m3 = 1000L.
    // Fark ppm * vol * 0.001 = kg
    const diff = target - current;
    if (diff <= 0) {
        document.getElementById('hc-ps-val').innerText = "Tuz eklemenize gerek yok.";
    } else {
        const kg = diff * vol * 0.001;
        document.getElementById('hc-ps-val').innerText = kg.toFixed(1) + ' kg';
    }

    document.getElementById('hc-ps-result').classList.add('visible');
}
