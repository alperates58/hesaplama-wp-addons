function hcYakitTuketimiHesapla() {
    const fuel = parseFloat(document.getElementById('hc-fuel-amt').value);
    const dist = parseFloat(document.getElementById('hc-dist-traveled').value);
    const price = parseFloat(document.getElementById('hc-fuel-price-input').value) || 0;

    if (isNaN(fuel) || isNaN(dist) || fuel <= 0 || dist <= 0) {
        alert('Lütfen yakıt miktarını ve mesafeyi giriniz.');
        return;
    }

    // 100 km Tüketimi
    const l100 = (fuel / dist) * 100;
    
    document.getElementById('hc-res-l100').innerText = l100.toFixed(1);

    // Maliyet Hesaplama
    if (price > 0) {
        const tlKm = (fuel * price) / dist;
        const tl100 = tlKm * 100;
        
        document.getElementById('hc-res-tl-km').innerText = tlKm.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + " ₺";
        document.getElementById('hc-res-tl-100km').innerText = tl100.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + " ₺";
    } else {
        document.getElementById('hc-res-tl-km').innerText = "-";
        document.getElementById('hc-res-tl-100km').innerText = "-";
    }

    document.getElementById('hc-tuketim-result').classList.add('visible');
    document.getElementById('hc-tuketim-result').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
