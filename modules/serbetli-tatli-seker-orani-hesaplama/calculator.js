function hcDessertSyrupHesapla() {
    const size = parseFloat(document.getElementById('hc-ds-size').value);
    const density = parseFloat(document.getElementById('hc-ds-type').value);

    if (isNaN(size) || size <= 0) {
        alert('Lütfen tepsi boyutunu giriniz.');
        return;
    }

    // Tepsi alanına göre baz şeker ihtiyacı (ortalama 40cm tepsi için 1kg şeker)
    const area = size * size; // Kare kabulü veya çap üzerinden yaklaşık alan
    const baseSugar = (area / 1600) * 1000;
    
    const sugar = baseSugar;
    const water = baseSugar / density;

    document.getElementById('hc-ds-res-list').innerHTML = `
        <ul style="text-align:left;">
            <li><strong>Toz Şeker:</strong> ${Math.round(sugar)} g</li>
            <li><strong>Su:</strong> ${Math.round(water)} ml</li>
            <li><strong>Limon Suyu:</strong> 1 tatlı kaşığı</li>
        </ul>
    `;
    
    document.getElementById('hc-dessert-syrup-result').classList.add('visible');
}
