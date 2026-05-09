function hcESOHesapla() {
    const total = parseFloat(document.getElementById('hc-eso-v').value);
    const perc = parseFloat(document.getElementById('hc-eso-p').value);

    if (isNaN(total) || isNaN(perc)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const esans = (total * perc) / 100;
    const baz = total - esans;

    document.getElementById('hc-eso-res1').innerText = esans.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' g/ml';
    document.getElementById('hc-eso-res2').innerText = baz.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' g/ml';
    
    document.getElementById('hc-eso-result').classList.add('visible');
}
