function hcMcHesapla() {
    const wet = parseFloat(document.getElementById('hc-mc-wet').value);
    const dry = parseFloat(document.getElementById('hc-mc-dry').value);

    if (isNaN(wet) || isNaN(dry) || wet <= 0 || dry <= 0) {
        alert('Lütfen geçerli ağırlık değerleri girin.');
        return;
    }

    if (dry > wet) {
        alert('Kuru ağırlık yaş ağırlıktan büyük olamaz.');
        return;
    }

    // Wet Basis MC = (W_wet - W_dry) / W_wet * 100
    const mc_wet = ((wet - dry) / wet) * 100;
    
    // Dry Basis MC = (W_wet - W_dry) / W_dry * 100
    const mc_dry = ((wet - dry) / dry) * 100;

    document.getElementById('hc-mc-res-wet').innerText = mc_wet.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-mc-res-dry').innerText = mc_dry.toLocaleString('tr-TR', { maximumFractionDigits: 2 });

    document.getElementById('hc-mc-result').classList.add('visible');
}
