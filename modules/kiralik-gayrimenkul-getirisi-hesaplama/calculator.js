function hcKiralikGayrimenkulGetirisiHesapla() {
    const price = parseFloat(document.getElementById('hc-kgg-price').value);
    const monthlyRent = parseFloat(document.getElementById('hc-kgg-rent').value);
    const expenses = parseFloat(document.getElementById('hc-kgg-expenses').value) || 0;

    if (!price || !monthlyRent) {
        alert('Lütfen fiyat ve kira tutarını girin.');
        return;
    }

    const annualRent = monthlyRent * 12;
    const grossYield = (annualRent / price) * 100;
    const netYield = ((annualRent - expenses) / price) * 100;

    document.getElementById('hc-kgg-gross').innerText = '%' + grossYield.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    document.getElementById('hc-kgg-net').innerText = '%' + netYield.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    document.getElementById('hc-kgg-result').classList.add('visible');
}
