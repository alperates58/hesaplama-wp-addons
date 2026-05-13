function hcProsesYeterlilikHesapla() {
    const usl = parseFloat(document.getElementById('hc-cp-usl').value);
    const lsl = parseFloat(document.getElementById('hc-cp-lsl').value);
    const mean = parseFloat(document.getElementById('hc-cp-mean').value);
    const sigma = parseFloat(document.getElementById('hc-cp-sigma').value);
    const resultDiv = document.getElementById('hc-proses-yeterlilik-indeksi-hesaplama-result');

    if (isNaN(usl) || isNaN(lsl) || isNaN(mean) || isNaN(sigma) || sigma <= 0) {
        alert('Lütfen tüm alanları doğru şekilde doldurunuz (σ > 0 olmalıdır).');
        return;
    }

    if (usl <= lsl) {
        alert('USL değeri LSL değerinden büyük olmalıdır.');
        return;
    }

    const cp = (usl - lsl) / (6 * sigma);
    const cpu = (usl - mean) / (3 * sigma);
    const cpl = (mean - lsl) / (3 * sigma);
    const cpk = Math.min(cpu, cpl);

    document.getElementById('hc-res-cp').innerText = cp.toLocaleString('tr-TR', {maximumFractionDigits: 4});
    document.getElementById('hc-res-cpk').innerText = cpk.toLocaleString('tr-TR', {maximumFractionDigits: 4});
    document.getElementById('hc-res-cpu').innerText = cpu.toLocaleString('tr-TR', {maximumFractionDigits: 4});
    document.getElementById('hc-res-cpl').innerText = cpl.toLocaleString('tr-TR', {maximumFractionDigits: 4});

    let comment = "";
    if (cpk >= 1.33) {
        comment = "Proses yeterli ve güvenlidir (Cpk ≥ 1.33).";
    } else if (cpk >= 1.0) {
        comment = "Proses sınırda yeterlidir, kontrol altında tutulmalıdır.";
    } else {
        comment = "Proses yetersizdir, iyileştirme gereklidir (Cpk < 1.0).";
    }
    document.getElementById('hc-cp-comment').innerText = comment;

    resultDiv.classList.add('visible');
}
