function hcIsiPompasiHesapla() {
    const energy = parseFloat(document.getElementById('hc-ipt-energy').value);
    const cop = parseFloat(document.getElementById('hc-ipt-cop').value);
    const price = parseFloat(document.getElementById('hc-ipt-elec-price').value);

    if (isNaN(energy) || isNaN(cop) || isNaN(price)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // Traditional Electric Heater (COP = 1)
    const heaterCost = energy * price;
    
    // Heat Pump (COP = cop)
    const pumpCost = (energy / cop) * price;
    
    const saving = heaterCost - pumpCost;

    document.getElementById('hc-res-ipt-heater').innerText = heaterCost.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' ₺';
    document.getElementById('hc-res-ipt-pump').innerText = pumpCost.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' ₺';
    document.getElementById('hc-res-ipt-saving').innerText = saving.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' ₺';

    document.getElementById('hc-ipt-result').classList.add('visible');
}
