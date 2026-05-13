function hcR2Hesapla() {
    const actualStr = document.getElementById('hc-r2-actual').value;
    const predStr = document.getElementById('hc-r2-pred').value;

    const actual = actualStr.split(/[,\s]+/).map(n => n.trim()).filter(n => n !== "").map(Number).filter(n => !isNaN(n));
    const pred = predStr.split(/[,\s]+/).map(n => n.trim()).filter(n => n !== "").map(Number).filter(n => !isNaN(n));

    if (actual.length === 0 || actual.length !== pred.length) {
        alert('Lütfen her iki alan için de aynı sayıda geçerli sayı girin.');
        return;
    }

    const n = actual.length;
    const meanActual = actual.reduce((a, b) => a + b, 0) / n;

    let ssRes = 0;
    let ssTot = 0;

    for (let i = 0; i < n; i++) {
        ssRes += Math.pow(actual[i] - pred[i], 2);
        ssTot += Math.pow(actual[i] - meanActual, 2);
    }

    if (ssTot === 0) {
        alert('Gerçek değerlerin varyansı 0 olduğu için R² hesaplanamaz.');
        return;
    }

    const r2 = 1 - (ssRes / ssTot);

    document.getElementById('hc-res-r2-val').innerText = r2.toLocaleString('tr-TR', { minimumFractionDigits: 4, maximumFractionDigits: 4 });

    let desc = "";
    if (r2 > 0.9) desc = "Mükemmel uyum.";
    else if (r2 > 0.7) desc = "İyi düzeyde uyum.";
    else if (r2 > 0.5) desc = "Orta düzeyde uyum.";
    else if (r2 > 0) desc = "Düşük uyum.";
    else desc = "Model veriyi açıklayamıyor.";

    document.getElementById('hc-r2-desc').innerText = desc;
    document.getElementById('hc-belirleme-katsayisi-hesaplama-result').classList.add('visible');
}
