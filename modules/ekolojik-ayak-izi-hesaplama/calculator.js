function hcEkoAyakHesapla() {
    const food = document.getElementById('hc-eko-food').value;
    const transport = parseFloat(document.getElementById('hc-eko-transport').value) || 0;
    const energy = parseFloat(document.getElementById('hc-eko-energy').value) || 0;

    // 2026 Basitleştirilmiş Model (gha cinsinden):
    // Ortalama bir insanın taban ayak izi (barınma, hizmetler vb.): 1.5 gha
    
    let foodFactor = 2.0; // meat-heavy
    if (food === 'average') foodFactor = 1.2;
    else if (food === 'vegetarian') foodFactor = 0.7;
    else if (food === 'vegan') foodFactor = 0.5;

    const transportGha = (transport / 15000) * 1.0; // Her 15k km ~1 gha
    const energyGha = (energy / 500) * 0.4; // Her 500 TL ~0.4 gha

    const totalGha = 1.5 + foodFactor + transportGha + energyGha;
    const earths = totalGha / 1.6; // Dünya biyokapasite ortalaması kişi başı ~1.6 gha

    document.getElementById('hc-res-eko-gha').innerText = totalGha.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' gha';
    document.getElementById('hc-res-eko-earth').innerHTML = `Eğer herkes sizin gibi yaşasaydı, bize <strong>${earths.toLocaleString('tr-TR', {maximumFractionDigits: 1})}</strong> dünya gerekirdi.`;
    
    document.getElementById('hc-eko-ayak-result').classList.add('visible');
}
