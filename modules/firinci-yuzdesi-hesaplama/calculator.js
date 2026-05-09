function hcBakersPercHesapla() {
    const flour = parseFloat(document.getElementById('hc-bp-flour').value) || 0;
    const waterPerc = parseFloat(document.getElementById('hc-bp-water').value) || 0;
    const saltPerc = parseFloat(document.getElementById('hc-bp-salt').value) || 0;

    if (flour <= 0) return;

    const water = flour * (waterPerc / 100);
    const salt = flour * (saltPerc / 100);
    const total = flour + water + salt;

    document.getElementById('hc-res-bp-water').innerText = Math.round(water) + ' gr';
    document.getElementById('hc-res-bp-salt').innerText = salt.toFixed(1) + ' gr';
    document.getElementById('hc-res-bp-total').innerText = Math.round(total) + ' gr';
    
    document.getElementById('hc-bakers-perc-result').classList.add('visible');
}
