function hcVizeFinalHesapla() {
    const vize = parseFloat(document.getElementById('hc-vf-vize').value);
    const vw = parseFloat(document.getElementById('hc-vf-vweight').value) / 100;
    const final = parseFloat(document.getElementById('hc-vf-final').value);
    const fw = parseFloat(document.getElementById('hc-vf-fweight').value) / 100;

    if (isNaN(vize) || isNaN(final) || isNaN(vw) || isNaN(fw)) {
        alert('Lütfen tüm değerleri giriniz.');
        return;
    }

    const res = (vize * vw) + (final * fw);

    document.getElementById('hc-vf-res-val').innerText = res.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-vize-final-result').classList.add('visible');
}
