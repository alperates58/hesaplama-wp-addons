function hcPopcornAmountHesapla() {
    const dry = parseFloat(document.getElementById('hc-pop-dry').value);

    if (isNaN(dry) || dry <= 0) {
        alert('Lütfen kuru mısır miktarını giriniz.');
        return;
    }

    // Mısır patladığında hacmi yaklaşık 30-40 katına çıkar.
    // 100g kuru mısır (~125ml) -> ~4-5 Litre patlamış mısır.
    const volumeLitre = (dry / 100) * 4.5;
    const servings = volumeLitre / 1.5; // Standart sinema boyu ~1.5 - 2 Litre

    document.getElementById('hc-pop-val').innerText = volumeLitre.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Litre';
    document.getElementById('hc-pop-info').innerText = `Yaklaşık ${Math.ceil(servings)} porsiyon (kase) patlamış mısır elde edilir.`;
    
    document.getElementById('hc-popcorn-result').classList.add('visible');
}
