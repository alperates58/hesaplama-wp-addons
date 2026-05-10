function hcSelfRisingHesapla() {
    const target = parseFloat(document.getElementById('hc-sr-target').value);

    if (isNaN(target) || target <= 0) {
        alert('Lütfen miktar giriniz.');
        return;
    }

    // Standart oran (1 cup / 125g un için): 1.5 çay kaşığı kabartma tozu, 0.25 çay kaşığı tuz
    // 1 çay kaşığı kabartma tozu ~4.8g
    // 1 çay kaşığı tuz ~6g
    const bpGrams = (target / 125) * 1.5 * 4.8;
    const saltGrams = (target / 125) * 0.25 * 6;
    const flourGrams = target - bpGrams - saltGrams;

    document.getElementById('hc-sr-list').innerHTML = `
        <ul>
            <li><strong>Çok Amaçlı Un:</strong> ${flourGrams.toFixed(1)} g</li>
            <li><strong>Kabartma Tozu:</strong> ${bpGrams.toFixed(1)} g (yaklaşık ${(bpGrams/4.8).toFixed(1)} çay kaşığı)</li>
            <li><strong>Tuz:</strong> ${saltGrams.toFixed(1)} g (yaklaşık ${(saltGrams/6).toFixed(2)} çay kaşığı)</li>
        </ul>
    `;
    
    document.getElementById('hc-self-rising-result').classList.add('visible');
}
