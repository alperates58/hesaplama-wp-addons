function hcHMHesapla() {
    const target = parseFloat(document.getElementById('hc-hm-target').value);
    const purity = parseFloat(document.getElementById('hc-hm-purity').value);

    if (isNaN(target) || isNaN(purity)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    if (purity <= 0 || purity > 100) {
        alert('Saflık oranı 0 ile 100 arasında olmalıdır.');
        return;
    }

    const needed = target / (purity / 100);

    document.getElementById('hc-hm-val').innerText = needed.toLocaleString('tr-TR', { maximumFractionDigits: 3 });
    document.getElementById('hc-hm-result').classList.add('visible');
}
