function hcUrunKarlilikHesapla() {
    const cost = parseFloat(document.getElementById('hc-uk-cost').value) || 0;
    const price = parseFloat(document.getElementById('hc-uk-price').value) || 0;

    if (cost <= 0 || price <= 0) {
        alert('Lütfen maliyet ve satış fiyatı bilgilerini giriniz.');
        return;
    }

    const profit = price - cost;
    const margin = (profit / price) * 100;
    const markup = (profit / cost) * 100;

    document.getElementById('hc-uk-res-profit').innerText = profit.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-uk-res-margin').innerText = '%' + margin.toLocaleString('tr-TR', { maximumFractionDigits: 1 });
    document.getElementById('hc-uk-res-markup').innerText = '%' + markup.toLocaleString('tr-TR', { maximumFractionDigits: 1 });
    document.getElementById('hc-uk-res-main').innerText = profit.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-urun-karliligi-result').classList.add('visible');
}
