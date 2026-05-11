function hcCpcCpmHesapla() {
    const cost = parseFloat(document.getElementById('hc-cc-cost').value);
    const clicks = parseFloat(document.getElementById('hc-cc-clicks').value);
    const impressions = parseFloat(document.getElementById('hc-cc-impressions').value);

    if (isNaN(cost) || cost <= 0) {
        alert('Lütfen toplam harcama tutarını girin.');
        return;
    }

    const cpc = clicks > 0 ? cost / clicks : 0;
    const cpm = impressions > 0 ? (cost / impressions) * 1000 : 0;

    document.getElementById('hc-cc-res-cpc').innerText = cpc > 0 ? cpc.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺' : 'Hesaplanamadı';
    document.getElementById('hc-cc-res-cpm').innerText = cpm > 0 ? cpm.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺' : 'Hesaplanamadı';

    document.getElementById('hc-cc-result').classList.add('visible');
}
