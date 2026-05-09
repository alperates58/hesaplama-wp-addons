function hcBtuHesapla() {
    const area = parseFloat(document.getElementById('hc-kb-area').value);
    const region = parseFloat(document.getElementById('hc-kb-region').value);
    const people = parseFloat(document.getElementById('hc-kb-people').value);
    const extraHeat = parseFloat(document.getElementById('hc-kb-light').value);

    if (isNaN(area)) {
        alert('Lütfen oda alanını girin.');
        return;
    }

    // Formula: (Area * RegionFactor) + (People * 500 BTU) + (ExtraHeatWatt * 3.4 BTU)
    const btu = (area * region) + (people * 500) + (extraHeat * 3.4);
    
    let recommendation = '9.000 BTU';
    if (btu > 24000) recommendation = 'Salon Tipi / Multi';
    else if (btu > 18000) recommendation = '24.000 BTU';
    else if (btu > 12000) recommendation = '18.000 BTU';
    else if (btu > 9000) recommendation = '12.000 BTU';

    document.getElementById('hc-res-kb-btu').innerText = Math.round(btu).toLocaleString('tr-TR') + ' BTU/saat';
    document.getElementById('hc-res-kb-rec').innerText = recommendation;

    document.getElementById('hc-kb-result').classList.add('visible');
}
