function hcPickleBrineHesapla() {
    const water = parseFloat(document.getElementById('hc-pb-water').value);

    if (isNaN(water) || water <= 0) {
        alert('Lütfen su miktarını giriniz.');
        return;
    }

    // Klasik 1-1-1 kuralı (yaklaşık oranlar): 1L su için 1 çay bardağı sirke, 1.5 - 2 yemek kaşığı kaya tuzu
    const vinegar = water * 100; // ml
    const salt = water * 45; // g
    const lemonSalt = water * 5; // g

    document.getElementById('hc-pb-res-list').innerHTML = `
        <ul style="text-align:left;">
            <li><strong>Kaya Tuzu:</strong> ${Math.round(salt)} g (~2 tepeleme yemek kaşığı)</li>
            <li><strong>Sirke:</strong> ${Math.round(vinegar)} ml (~1 çay bardağı)</li>
            <li><strong>Limon Tuzu:</strong> ${Math.round(lemonSalt)} g (~1 tatlı kaşığı)</li>
            <li><strong>Şeker:</strong> 1 tatlı kaşığı (mayalanma için)</li>
        </ul>
    `;
    
    document.getElementById('hc-pickle-brine-result').classList.add('visible');
}
