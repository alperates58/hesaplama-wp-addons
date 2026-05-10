function hcCfuHesapla() {
    const colonies = parseFloat(document.getElementById('hc-cf-colonies').value);
    const df = parseFloat(document.getElementById('hc-cf-df').value);
    const vol = parseFloat(document.getElementById('hc-cf-vol').value);

    if (isNaN(colonies) || !df || !vol) {
        alert('Lütfen tüm değerleri giriniz.');
        return;
    }

    // CFU/mL = (Koloni Sayısı * Seyreltme Faktörü) / Ekilen Hacim
    const cfuPerMl = (colonies * df) / vol;

    const resVal = document.getElementById('hc-cf-res-val');
    resVal.innerText = cfuPerMl.toExponential(2).toLocaleString('tr-TR');

    document.getElementById('hc-cfu-calc-result').classList.add('visible');
}
