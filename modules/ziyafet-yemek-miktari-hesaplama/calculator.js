function hcBanquetCalcHesapla() {
    const guests = parseFloat(document.getElementById('hc-bq-guests').value);

    if (isNaN(guests) || guests <= 0) {
        alert('Lütfen davetli sayısını giriniz.');
        return;
    }

    // Kişi başı ortalama: 200g et, 150g garnitür, 300ml içecek, 100g tatlı
    const meat = guests * 0.2;
    const side = guests * 0.15;
    const drink = guests * 0.3;
    const dessert = guests * 0.1;

    document.getElementById('hc-bq-res-list').innerHTML = `
        <ul style="text-align:left;">
            <li><strong>Ana Yemek (Et/Tavuk):</strong> ${Math.round(meat)} kg</li>
            <li><strong>Garnitür (Pilav/Püre):</strong> ${Math.round(side)} kg</li>
            <li><strong>İçecekler:</strong> ${Math.round(drink)} Litre</li>
            <li><strong>Tatlı / Pasta:</strong> ${Math.round(dessert)} kg</li>
        </ul>
    `;
    
    document.getElementById('hc-banquet-result').classList.add('visible');
}
