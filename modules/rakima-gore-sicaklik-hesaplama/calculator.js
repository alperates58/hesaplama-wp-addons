function hcRakımaGöreSıcaklıkHesapla() {
    const rate = parseFloat(document.getElementById('hc-at-type').value); // °C / 1000m
    const h1 = parseFloat(document.getElementById('hc-at-h1').value);
    const t1 = parseFloat(document.getElementById('hc-at-t1').value);
    const h2 = parseFloat(document.getElementById('hc-at-h2').value);

    if (isNaN(rate) || isNaN(h1) || isNaN(t1) || isNaN(h2)) {
        alert('Lütfen tüm yükseklik ve sıcaklık değerlerini geçerli sayılar olarak doldurunuz.');
        return;
    }

    // Yükseklik farkı (km cinsinden)
    const diffHeightKm = (h2 - h1) / 1000;

    // Sıcaklık değişimi
    const tempChange = -rate * diffHeightKm;

    // Hedef sıcaklık
    const t2 = t1 + tempChange;

    let desc = '';
    if (h2 > h1) {
        desc = `Yükseklik arttığı için sıcaklık azaldı. Her 100 metrede yaklaşık ${(rate/10).toLocaleString('tr-TR')} °C soğuma gerçekleşti.`;
    } else if (h2 < h1) {
        desc = `Yükseklik azaldığı için (alçaldıkça) sıcaklık arttı. Her 100 metre alçalmada ${(rate/10).toLocaleString('tr-TR')} °C ısınma gerçekleşti (fön etkisi).`;
    } else {
        desc = 'Yükseklik değişmediği için sıcaklık aynı kaldı.';
    }

    document.getElementById('hc-at-val').innerText = t2.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' °C';
    document.getElementById('hc-at-diff-val').innerText = (tempChange > 0 ? '+' : '') + tempChange.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' °C';
    document.getElementById('hc-at-desc-val').innerText = desc;

    document.getElementById('hc-rakima-gore-sicaklik-result').classList.add('visible');
}
