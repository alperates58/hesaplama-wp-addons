function hcSeyreltmeFaktörüHesapla() {
    const v1 = parseFloat(document.getElementById('hc-df-v1').value);
    const v2 = parseFloat(document.getElementById('hc-df-v2').value);

    if (!v1 || !v2) return;

    // DF = V2 / V1
    const df = v2 / v1;

    document.getElementById('hc-df-val').innerText = df.toLocaleString('tr-TR') + ' kat';
    document.getElementById('hc-df-result').classList.add('visible');
}
