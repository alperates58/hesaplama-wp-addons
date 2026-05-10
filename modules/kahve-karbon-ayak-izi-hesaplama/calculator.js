function hcCoffeeCarbonHesapla() {
    const cups = parseInt(document.getElementById('hc-carbon-cups').value);
    const carbonPerCup = parseFloat(document.getElementById('hc-carbon-type').value);

    if (isNaN(cups) || cups <= 0) {
        alert('Lütfen fincan sayısını giriniz.');
        return;
    }

    // Yıllık emisyon (kg CO2)
    const annual = cups * carbonPerCup * 365;

    document.getElementById('hc-carbon-val').innerText = annual.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kg CO2';
    
    const treeCount = annual / 20; // 1 yetişkin ağaç yılda ~20kg CO2 emer
    document.getElementById('hc-carbon-desc').innerText = `Bu emisyonu dengelemek için yılda yaklaşık ${Math.ceil(treeCount)} ağaç dikmeniz gerekir. Süt kullanımı emisyonu önemli ölçüde artırır.`;
    
    document.getElementById('hc-coffee-carbon-result').classList.add('visible');
}
