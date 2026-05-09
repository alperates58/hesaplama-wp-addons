function hcAgacCO2Hesapla() {
    const type = document.getElementById('hc-tree-type').value;
    const count = parseFloat(document.getElementById('hc-tree-count').value);
    const age = parseFloat(document.getElementById('hc-tree-age').value);

    if (isNaN(count) || count <= 0 || isNaN(age) || age <= 0) {
        alert('Lütfen geçerli bir ağaç sayısı ve yaşı giriniz.');
        return;
    }

    // 2026 Güncel Veriler: Ortalama bir ağaç yılda 25kg CO2 emer.
    // Geniş yapraklılar biraz daha fazla (28kg), iğne yapraklılar biraz daha az (22kg).
    // Genç ağaçlar ( < 10 yaş) daha az emer, olgun ağaçlar daha fazla.
    
    let baseRate = 25;
    if (type === 'broadleaf') baseRate = 28;
    else if (type === 'coniferous') baseRate = 22;

    // Yaş çarpanı (basit model)
    let ageFactor = 1;
    if (age < 5) ageFactor = 0.4;
    else if (age < 15) ageFactor = 0.8;
    else if (age > 50) ageFactor = 1.2;

    const annualTotal = baseRate * ageFactor * count;
    const tenYearTotal = annualTotal * 10;

    document.getElementById('hc-res-total-co2').innerText = annualTotal.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' kg';
    document.getElementById('hc-res-10year-co2').innerText = tenYearTotal.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' kg';
    
    document.getElementById('hc-agac-karbondioksit-result').classList.add('visible');
}
