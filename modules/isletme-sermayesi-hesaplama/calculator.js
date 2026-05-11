function hcWorkingCapitalHesapla() {
    const assets = parseFloat(document.getElementById('hc-wc-assets').value);
    const liabilities = parseFloat(document.getElementById('hc-wc-liabilities').value);

    if (isNaN(assets) || isNaN(liabilities)) {
        alert('Lütfen varlık ve yükümlülük değerlerini girin.');
        return;
    }

    // Working Capital = Assets - Liabilities
    const wc = assets - liabilities;
    // Current Ratio = Assets / Liabilities
    const ratio = liabilities !== 0 ? (assets / liabilities) : 0;

    document.getElementById('hc-wc-value').innerText = wc.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-wc-ratio').innerText = ratio.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    
    document.getElementById('hc-wc-result').classList.add('visible');
}
