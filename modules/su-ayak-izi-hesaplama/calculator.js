function hcSuAyakİziHesapla() {
    const meat = parseFloat(document.getElementById('hc-wf-meat').value) || 0;
    const coffee = parseFloat(document.getElementById('hc-wf-coffee').value) || 0;
    const jeans = parseFloat(document.getElementById('hc-wf-jeans').value) || 0;

    // Sanal su değerleri:
    // 1 kg Sığır Eti ~15.500 L
    // 1 Fincan Kahve ~140 L
    // 1 Jean Pantolon ~8.000 L
    const annualMeat = meat * 52 * 15500;
    const annualCoffee = coffee * 365 * 140;
    const annualJeans = jeans * 8000;

    const total = annualMeat + annualCoffee + annualJeans;

    document.getElementById('hc-wf-val').innerText = Math.round(total).toLocaleString('tr-TR') + ' Litre';
    document.getElementById('hc-wf-info').innerText = `Bu miktar yaklaşık ${Math.round(total / 1000)} m³ suya eşittir.`;
    document.getElementById('hc-wf-result').classList.add('visible');
}
