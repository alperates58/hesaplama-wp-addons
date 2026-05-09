function hcLastikHesapla() {
    const w1 = parseFloat(document.getElementById('hc-width1').value);
    const r1 = parseFloat(document.getElementById('hc-ratio1').value);
    const rim1 = parseFloat(document.getElementById('hc-rim1').value);

    const w2 = parseFloat(document.getElementById('hc-width2').value);
    const r2 = parseFloat(document.getElementById('hc-ratio2').value);
    const rim2 = parseFloat(document.getElementById('hc-rim2').value);

    if ([w1, r1, rim1, w2, r2, rim2].some(v => isNaN(v) || v <= 0)) {
        alert('Lütfen tüm değerleri geçerli sayılar olarak giriniz.');
        return;
    }

    // Çap Hesaplama: (Jant * 25.4) + (Taban * Oran / 100 * 2)
    const d1 = (rim1 * 25.4) + (w1 * (r1 / 100) * 2);
    const d2 = (rim2 * 25.4) + (w2 * (r2 / 100) * 2);

    const farkYuzde = ((d2 - d1) / d1) * 100;
    const yeniHiz = 100 * (d2 / d1);

    // Sonuçları Yazdır
    document.getElementById('hc-res-diff-perc').innerText = (farkYuzde > 0 ? "+" : "") + farkYuzde.toFixed(2) + "%";
    document.getElementById('hc-res-diam1').innerText = d1.toFixed(1) + " mm";
    document.getElementById('hc-res-diam2').innerText = d2.toFixed(1) + " mm";
    document.getElementById('hc-res-speed').querySelector('strong').innerText = yeniHiz.toFixed(1) + " km/h";

    const status = document.getElementById('hc-res-status');
    if (Math.abs(farkYuzde) > 3) {
        status.innerText = "❌ Değişim Önerilmez (%3 sınırını aştı)";
        status.style.color = "#ef4444";
    } else {
        status.innerText = "✅ Değişim İçin Uygun";
        status.style.color = "#10b981";
    }

    // Görünür yap
    const resultDiv = document.getElementById('hc-lastik-result');
    resultDiv.classList.add('visible');
    resultDiv.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
