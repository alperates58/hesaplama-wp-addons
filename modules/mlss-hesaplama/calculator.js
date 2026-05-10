function hcMlssHesapla() {
    const dry = parseFloat(document.getElementById('hc-ml-dry').value);
    const tare = parseFloat(document.getElementById('hc-ml-tare').value);
    const sample = parseFloat(document.getElementById('hc-ml-sample').value);

    if (isNaN(dry) || isNaN(tare) || !sample) {
        alert('Lütfen tüm değerleri giriniz.');
        return;
    }

    // MLSS (mg/L) = (Kurumuş - Dara) * 1000 / Örnek Hacmi
    const mlss = (dry - tare) * 1000 / (sample / 1000 * 1000); // basitleştirilmiş birim dönüşümü
    const mlssFinal = (dry - tare) * 1000 / sample * 1000;

    const resVal = document.getElementById('hc-ml-res-val');
    resVal.innerText = Math.round((dry - tare) * 1000000 / sample).toLocaleString('tr-TR');

    document.getElementById('hc-mlss-calc-result').classList.add('visible');
}
