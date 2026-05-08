function hcFAVOKHesapla() {
    const opProfit = parseFloat(document.getElementById('hc-eb-op-profit').value) || 0;
    const depr = parseFloat(document.getElementById('hc-eb-depr').value) || 0;

    const ebitda = opProfit + depr;

    document.getElementById('hc-eb-res-val').innerText = ebitda.toLocaleString('tr-TR') + ' ₺';

    document.getElementById('hc-ebitda-result').classList.add('visible');
}
