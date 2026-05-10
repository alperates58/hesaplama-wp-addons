function hcRicePuddingHesapla() {
    const milk = parseFloat(document.getElementById('hc-rp-milk').value);

    if (isNaN(milk) || milk <= 0) {
        alert('Lütfen süt miktarını giriniz.');
        return;
    }

    // 1 Litre süt için: yarım çay bardağı pirinç (60g), 1 su bardağı şeker (180g)
    const rice = milk * 60;
    const sugar = milk * 180;
    const servings = milk * 6; // ~6 kase

    document.getElementById('hc-rp-res-list').innerHTML = `
        <ul style="text-align:left;">
            <li><strong>Pirinç:</strong> ${Math.round(rice)} g (~${(milk * 0.5).toFixed(1)} çay bardağı)</li>
            <li><strong>Şeker:</strong> ${Math.round(sugar)} g (~${milk.toFixed(1)} su bardağı)</li>
            <li><strong>Tahmini Porsiyon:</strong> ~${Math.round(servings)} kase</li>
        </ul>
    `;
    
    document.getElementById('hc-rice-pudding-result').classList.add('visible');
}
