function hcNetWorthHesapla() {
    const cash = parseFloat(document.getElementById('hc-nw-cash').value) || 0;
    const invest = parseFloat(document.getElementById('hc-nw-invest').value) || 0;
    const prop = parseFloat(document.getElementById('hc-nw-prop').value) || 0;
    const loan = parseFloat(document.getElementById('hc-nw-loan').value) || 0;
    const other = parseFloat(document.getElementById('hc-nw-other').value) || 0;

    const totalAssets = cash + invest + prop;
    const totalLiab = loan + other;
    const netWorth = totalAssets - totalLiab;

    document.getElementById('hc-nw-res-assets').innerText = totalAssets.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-nw-res-liab').innerText = totalLiab.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-nw-res-val').innerText = netWorth.toLocaleString('tr-TR') + ' ₺';

    document.getElementById('hc-networth-result').classList.add('visible');
}
