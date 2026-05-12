function hcMenuFiyatiHesapla() {
    const cost = parseFloat(document.getElementById('hc-mf-cost').value);
    const overhead = parseFloat(document.getElementById('hc-mf-overhead').value);
    const profit = parseFloat(document.getElementById('hc-mf-profit').value);

    if (!cost || cost <= 0) {
        alert('Lütfen maliyet giriniz.');
        return;
    }

    const totalDeduction = (overhead + profit) / 100;
    
    if (totalDeduction >= 1) {
        alert('Gider ve kâr toplamı %100 veya daha fazla olamaz.');
        return;
    }

    const price = cost / (1 - totalDeduction);

    const resultDiv = document.getElementById('hc-menu-pricing-result');
    document.getElementById('hc-mf-res-val').innerText = price.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    
    resultDiv.classList.add('visible');
}
