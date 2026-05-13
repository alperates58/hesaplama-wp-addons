function hcSensitivityHesapla() {
    const tp = parseFloat(document.getElementById('hc-sens-tp').value);
    const fn = parseFloat(document.getElementById('hc-sens-fn').value);

    if (isNaN(tp) || isNaN(fn) || (tp + fn) === 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const sensitivity = (tp / (tp + fn)) * 100;
    
    document.getElementById('hc-res-sens-val').innerText = '%' + sensitivity.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    document.getElementById('hc-duyarlilik-hesaplama-result').classList.add('visible');
}
