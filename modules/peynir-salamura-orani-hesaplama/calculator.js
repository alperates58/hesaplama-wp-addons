function hcCheeseBrineHesapla() {
    const water = parseFloat(document.getElementById('hc-brine-water').value);
    const pct = parseFloat(document.getElementById('hc-brine-pct').value);

    if (isNaN(water) || isNaN(pct) || water <= 0) {
        alert('Lütfen değerleri giriniz.');
        return;
    }

    // %10 luk salamura için 1L suya 100g tuz (yaklaşık)
    const saltGrams = water * 1000 * (pct / 100);

    document.getElementById('hc-brine-salt').innerText = saltGrams.toLocaleString('tr-TR') + ' g';
    document.getElementById('hc-brine-info').innerText = `Kaya tuzu (turşuluk tuz) kullanmanız ve suyun kaynatılıp soğutulmuş olması önerilir.`;
    
    document.getElementById('hc-cheese-brine-result').classList.add('visible');
}
