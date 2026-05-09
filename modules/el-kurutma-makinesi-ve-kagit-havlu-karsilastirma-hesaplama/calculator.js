function hcHandDryKarsilastir() {
    const uses = parseFloat(document.getElementById('hc-dry-uses').value);

    if (isNaN(uses) || uses <= 0) {
        alert('Lütfen geçerli bir kullanım sayısı giriniz.');
        return;
    }

    // 2026 Verileri (LCA - Life Cycle Analysis):
    // 1 Kağıt havlu (üretim + atık) ~10g CO2. Genelde 2 adet kullanılır = 20g.
    // 1 Modern el kurutma makinesi (10sn çalışma) ~2g CO2 (TR 2026 şebekesi ile).
    
    const paperCO2 = (uses * 2 * 10 * 365) / 1000; // kg/yıl
    const dryerCO2 = (uses * 2 * 365) / 1000; // kg/yıl

    document.getElementById('hc-res-paper-co2').innerText = paperCO2.toLocaleString('tr-TR', {maximumFractionDigits: 1}) + ' kg';
    document.getElementById('hc-res-dryer-co2').innerText = dryerCO2.toLocaleString('tr-TR', {maximumFractionDigits: 1}) + ' kg';

    const diff = paperCO2 - dryerCO2;
    const winnerText = diff > 0 
        ? `El kurutma makinesi kullanarak yılda <strong>${diff.toLocaleString('tr-TR', {maximumFractionDigits: 1})} kg</strong> CO2 tasarrufu sağlayabilirsiniz.`
        : `Kağıt havlu bu senaryoda daha çevreci görünmektedir.`;

    document.getElementById('hc-res-dry-winner').innerHTML = winnerText;
    
    document.getElementById('hc-hand-dry-result').classList.add('visible');
}
