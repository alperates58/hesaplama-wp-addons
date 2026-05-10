function hcPlastikAtıkMiktarıHesapla() {
    const bottles = parseFloat(document.getElementById('hc-pw-bottles').value) || 0;
    const bags = parseFloat(document.getElementById('hc-pw-bags').value) || 0;
    const packaging = parseFloat(document.getElementById('hc-pw-packaging').value) || 0;

    // Ortalama ağırlıklar: 
    // Şişe: 20g, Poşet: 5g, Paket: 10g
    const weeklyWeight = (bottles * 20 + bags * 5 + packaging * 10) / 1000; // kg
    const yearlyWeight = weeklyWeight * 52;

    document.getElementById('hc-pw-val').innerText = yearlyWeight.toFixed(1) + ' kg';
    document.getElementById('hc-pw-info').innerText = `Türkiye'de kişi başı yıllık plastik atık ortalaması ~35 kg'dır.`;
    document.getElementById('hc-pw-result').classList.add('visible');
}
