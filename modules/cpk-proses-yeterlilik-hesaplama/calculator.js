function hcCpkHesapla() {
    const usl = parseFloat(document.getElementById('hc-cpk-usl').value);
    const lsl = parseFloat(document.getElementById('hc-cpk-lsl').value);
    const mean = parseFloat(document.getElementById('hc-cpk-mean').value);
    const sigma = parseFloat(document.getElementById('hc-cpk-sigma').value);

    if (isNaN(usl) || isNaN(lsl) || isNaN(mean) || isNaN(sigma) || sigma <= 0) {
        alert('Lütfen tüm alanları doğru ve pozitif standart sapma ile doldurun.');
        return;
    }

    const cpu = (usl - mean) / (3 * sigma);
    const cpl = (mean - lsl) / (3 * sigma);
    const cpk = Math.min(cpu, cpl);

    const fmt = (val) => val.toLocaleString('tr-TR', { minimumFractionDigits: 3, maximumFractionDigits: 3 });

    document.getElementById('hc-res-cpk-val').innerText = fmt(cpk);
    document.getElementById('hc-res-cpu').innerText = fmt(cpu);
    document.getElementById('hc-res-cpl').innerText = fmt(cpl);

    let status = "";
    if (cpk >= 1.67) status = "Mükemmel";
    else if (cpk >= 1.33) status = "Yeterli";
    else if (cpk >= 1.0) status = "Sınırda (Kontrol Gerekli)";
    else status = "Yetersiz (Hatalı Üretim Riski)";

    document.getElementById('hc-res-cpk-status').innerText = status;
    document.getElementById('hc-cpk-proses-yeterlilik-hesaplama-result').classList.add('visible');
}
