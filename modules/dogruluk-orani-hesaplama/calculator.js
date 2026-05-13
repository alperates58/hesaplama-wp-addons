function hcAccuracyHesapla() {
    const tp = parseFloat(document.getElementById('hc-acc-tp').value) || 0;
    const tn = parseFloat(document.getElementById('hc-acc-tn').value) || 0;
    const fp = parseFloat(document.getElementById('hc-acc-fp').value) || 0;
    const fn = parseFloat(document.getElementById('hc-acc-fn').value) || 0;

    const total = tp + tn + fp + fn;

    if (total === 0) {
        alert('Lütfen en az bir değer girin.');
        return;
    }

    const accuracy = ((tp + tn) / total) * 100;
    
    document.getElementById('hc-res-acc-val').innerText = '%' + accuracy.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    document.getElementById('hc-dogruluk-orani-hesaplama-result').classList.add('visible');
}
