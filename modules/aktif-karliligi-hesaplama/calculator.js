function hcROAHesapla() {
    const netProfit = parseFloat(document.getElementById('hc-roa-net-profit').value) || 0;
    const assets = parseFloat(document.getElementById('hc-roa-assets').value) || 0;

    if (assets === 0) {
        alert('Toplam varlıklar sıfır olamaz.');
        return;
    }

    const roa = (netProfit / assets) * 100;

    document.getElementById('hc-roa-res-val').innerText = '%' + roa.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    document.getElementById('hc-roa-result').classList.add('visible');
}
