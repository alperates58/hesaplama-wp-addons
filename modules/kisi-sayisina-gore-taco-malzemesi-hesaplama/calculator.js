function hcTacoPPHesapla() {
    const count = parseInt(document.getElementById('hc-taco-count').value);

    if (isNaN(count) || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    // Kişi başı: 3 taco, 150g et, 50g peynir, 50g marul
    const meat = count * 0.15;
    const tortillas = count * 3;
    const cheese = count * 50;

    document.getElementById('hc-taco-list').innerHTML = `
        <ul style="text-align:left;">
            <li><strong>Tortilla (Lavaş):</strong> ${tortillas} adet</li>
            <li><strong>Kıyma / Et:</strong> ${meat.toLocaleString('tr-TR', {maximumFractionDigits:1})} kg</li>
            <li><strong>Rende Peynir:</strong> ${cheese.toLocaleString('tr-TR')} g</li>
            <li><strong>Salsa / Sos:</strong> ~${Math.ceil(count * 50)} ml</li>
            <li><strong>Marul / Sebze:</strong> 1-${Math.ceil(count/4)} adet</li>
        </ul>
    `;
    
    document.getElementById('hc-taco-pp-result').classList.add('visible');
}
