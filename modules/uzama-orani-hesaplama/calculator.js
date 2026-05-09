function hcElongationHesapla() {
    const l0 = parseFloat(document.getElementById('hc-uo-l0').value) || 0;
    const lf = parseFloat(document.getElementById('hc-uo-lf').value) || 0;

    if (l0 <= 0) return;

    const elongation = ((lf - l0) / l0) * 100;

    document.getElementById('hc-res-uo-val').innerText = '%' + elongation.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-elongation-result').classList.add('visible');
}
