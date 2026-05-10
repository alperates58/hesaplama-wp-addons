function hcPregVkiHesapla() {
    const height = parseFloat(document.getElementById('hc-pv-height').value) / 100;
    const weight = parseFloat(document.getElementById('hc-pv-weight').value);

    if (!height || !weight) return;

    const vki = weight / (height * height);
    const resVki = document.getElementById('hc-pv-res-vki');
    const resDesc = document.getElementById('hc-pv-res-desc');
    const resRange = document.getElementById('hc-pv-res-range');

    resVki.innerText = vki.toFixed(1).toLocaleString('tr-TR');

    if (vki < 18.5) {
        resDesc.innerText = 'Zayıf (Düşük Kilolu)';
        resRange.innerText = '12.5 - 18';
    } else if (vki < 25) {
        resDesc.innerText = 'Normal Kilolu';
        resRange.innerText = '11.5 - 16';
    } else if (vki < 30) {
        resDesc.innerText = 'Fazla Kilolu';
        resRange.innerText = '7 - 11.5';
    } else {
        resDesc.innerText = 'Obezite';
        resRange.innerText = '5 - 9';
    }

    document.getElementById('hc-preg-vki-result').classList.add('visible');
}
