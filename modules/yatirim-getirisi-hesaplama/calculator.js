function hcRoiHesapla() {
    const cost = parseFloat(document.getElementById('hc-roi-cost').value);
    const current = parseFloat(document.getElementById('hc-roi-current').value);

    if (isNaN(cost) || isNaN(current) || cost <= 0) {
        alert('Lütfen geçerli maliyet ve güncel değer girin.');
        return;
    }

    const profit = current - cost;
    const roi = (profit / cost) * 100;

    document.getElementById('hc-roi-res-profit').innerText = profit.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-roi-res-ratio').innerText = '%' + roi.toLocaleString('tr-TR', { minimumFractionDigits: 2 });

    const profitElem = document.getElementById('hc-roi-res-profit');
    profitElem.style.color = profit >= 0 ? 'green' : 'red';

    document.getElementById('hc-roi-result').classList.add('visible');
}
