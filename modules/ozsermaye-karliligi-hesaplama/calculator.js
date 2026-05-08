function hcROEHesapla() {
    const netProfit = parseFloat(document.getElementById('hc-roe-net-profit').value) || 0;
    const equity = parseFloat(document.getElementById('hc-roe-equity').value) || 0;

    if (equity === 0) {
        alert('Özsermaye sıfır olamaz.');
        return;
    }

    const roe = (netProfit / equity) * 100;

    document.getElementById('hc-roe-res-val').innerText = '%' + roe.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    document.getElementById('hc-roe-result').classList.add('visible');
}
