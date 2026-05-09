function hcThreeProbHesapla() {
    const a = (parseFloat(document.getElementById('hc-tp-a').value) || 0) / 100;
    const b = (parseFloat(document.getElementById('hc-tp-b').value) || 0) / 100;
    const c = (parseFloat(document.getElementById('hc-tp-c').value) || 0) / 100;

    const prob = a * b * c * 100;

    document.getElementById('hc-res-tp-val').innerText = '%' + prob.toLocaleString('tr-TR', { maximumFractionDigits: 6 });
    document.getElementById('hc-three-prob-result').classList.add('visible');
}
