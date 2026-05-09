function hcAntibiyotikHesapla() {
    const stockConc = parseFloat(document.getElementById('hc-anti-stock-conc').value); // mg/mL
    const targetConc = parseFloat(document.getElementById('hc-anti-target-conc').value); // µg/mL
    const targetVol = parseFloat(document.getElementById('hc-anti-target-vol').value); // mL

    if (isNaN(stockConc) || isNaN(targetConc) || isNaN(targetVol) || stockConc <= 0 || targetConc <= 0 || targetVol <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    // C1V1 = C2V2
    // C1 (mg/mL) = C1 * 1000 (µg/mL)
    // V1 = (C2 * V2) / C1
    const stockConcUg = stockConc * 1000;
    const stockVol = (targetConc * targetVol) / stockConcUg;

    const resultValue = document.getElementById('hc-anti-value');
    
    let displayValue, unit;
    if (stockVol < 1) {
        displayValue = (stockVol * 1000).toLocaleString('tr-TR', { maximumFractionDigits: 2 });
        unit = ' µL';
    } else {
        displayValue = stockVol.toLocaleString('tr-TR', { maximumFractionDigits: 3 });
        unit = ' mL';
    }
    
    resultValue.innerText = displayValue + unit;
    document.getElementById('hc-anti-note').innerText = `${targetVol} mL çözeltide ${targetConc} µg/mL konsantrasyon elde etmek için ${displayValue}${unit} stok kullanmalısınız.`;
    document.getElementById('hc-anti-result').classList.add('visible');
}
