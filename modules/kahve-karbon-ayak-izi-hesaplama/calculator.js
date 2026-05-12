function hcKahveKarbonHesapla() {
    const baseCO2 = parseFloat(document.getElementById('hc-cc-type').value);
    const milkFactor = parseFloat(document.getElementById('hc-cc-milk').value);
    const cups = parseInt(document.getElementById('hc-cc-cups').value) || 0;

    if (cups <= 0) {
        alert('Lütfen geçerli bir fincan sayısı giriniz.');
        return;
    }

    // Formula: Base * milkFactor * cups
    const totalCO2 = baseCO2 * milkFactor * cups;

    const resultDiv = document.getElementById('hc-coffee-carbon-result');
    document.getElementById('hc-cc-val').innerText = Math.round(totalCO2).toLocaleString('tr-TR') + ' g CO₂e';
    
    const yearly = (totalCO2 * 365) / 1000;
    document.getElementById('hc-cc-note').innerText = `Yıllık karbon ayak iziniz yaklaşık ${Math.round(yearly)} kg CO₂e'dir. Bu miktar yaklaşık ${Math.round(yearly/20)} ağacın bir yılda temizlediği karbona eşittir.`;
    
    resultDiv.classList.add('visible');
}
