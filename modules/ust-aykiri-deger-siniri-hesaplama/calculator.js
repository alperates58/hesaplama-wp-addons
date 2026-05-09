function hcUpperOutlierHesapla() {
    const q1 = parseFloat(document.getElementById('hc-uo-q1').value) || 0;
    const q3 = parseFloat(document.getElementById('hc-uo-q3').value) || 0;

    const iqr = q3 - q1;
    const upperFence = q3 + (1.5 * iqr);

    document.getElementById('hc-res-uo-iqr').innerText = iqr.toLocaleString('tr-TR');
    document.getElementById('hc-res-uo-val').innerText = upperFence.toLocaleString('tr-TR');
    
    document.getElementById('hc-upper-outlier-result').classList.add('visible');
}
