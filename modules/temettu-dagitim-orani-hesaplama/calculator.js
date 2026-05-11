function hcTemettuDagitimHesapla() {
    const netProfit = parseFloat(document.getElementById('hc-td-net-profit').value);
    const totalDiv = parseFloat(document.getElementById('hc-td-total-div').value);

    if (isNaN(netProfit) || isNaN(totalDiv) || netProfit <= 0) {
        alert('Lütfen geçerli kâr ve temettü tutarları girin.');
        return;
    }

    const ratio = (totalDiv / netProfit) * 100;

    document.getElementById('hc-td-res-ratio').innerText = '%' + ratio.toLocaleString('tr-TR', { minimumFractionDigits: 2 });
    document.getElementById('hc-td-result').classList.add('visible');
}
