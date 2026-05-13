function hcEVHesapla() {
    const valStr = document.getElementById('hc-ev-values').value;
    const probStr = document.getElementById('hc-ev-probs').value;

    const values = valStr.split(/[,\s]+/).map(n => n.trim()).filter(n => n !== "").map(Number).filter(n => !isNaN(n));
    const probs = probStr.split(/[,\s]+/).map(n => n.trim()).filter(n => n !== "").map(Number).filter(n => !isNaN(n));

    if (values.length === 0 || values.length !== probs.length) {
        alert('Lütfen her iki alan için de aynı sayıda geçerli sayı girin.');
        return;
    }

    const probSum = probs.reduce((a, b) => a + b, 0);
    if (Math.abs(probSum - 1) > 0.01) {
        document.getElementById('hc-ev-sum-check').innerText = "Uyarı: Olasılıklar toplamı " + probSum.toLocaleString('tr-TR') + " (1.0 olmalıdır). Sonuç buna göre normalize edilmiştir.";
        document.getElementById('hc-ev-sum-check').style.color = "orange";
    } else {
        document.getElementById('hc-ev-sum-check').innerText = "Olasılıklar toplamı: 1.0";
        document.getElementById('hc-ev-sum-check').style.color = "green";
    }

    let ev = 0;
    for (let i = 0; i < values.length; i++) {
        ev += values[i] * (probs[i] / probSum);
    }

    document.getElementById('hc-res-ev-val').innerText = ev.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-beklenen-deger-hesaplama-result').classList.add('visible');
}
