function hcHelyumBalonKaldırmaGücüHesapla() {
    const radius = parseFloat(document.getElementById('hc-he-radius').value);
    let volume = parseFloat(document.getElementById('hc-he-vol').value);

    if (!volume && radius) {
        // Küre hacmi: (4/3) * PI * r^3
        volume = (4/3) * Math.PI * Math.pow(radius / 10, 3); // dm3 = Litre
    }

    if (!volume) return;

    // Kaldırma Gücü: 1 litre helyum yaklaşık 1 gram kaldırır (deniz seviyesinde)
    // Tam değer: 1.03 g/L
    const liftGrams = volume * 1.03;

    if (liftGrams >= 1000) {
        document.getElementById('hc-he-val').innerText = (liftGrams / 1000).toFixed(2) + ' kg';
    } else {
        document.getElementById('hc-he-val').innerText = Math.round(liftGrams) + ' gram';
    }

    document.getElementById('hc-he-result').classList.add('visible');
}
