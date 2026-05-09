function hcFilterCoffeeHesapla() {
    const cups = parseInt(document.getElementById('hc-fc-cups').value) || 0;
    const ratio = parseInt(document.getElementById('hc-fc-strength').value) || 16;

    if (cups <= 0) return;

    const water = cups * 200;
    const coffee = water / ratio;

    document.getElementById('hc-res-fc-coffee').innerText = coffee.toFixed(1) + ' gr';
    document.getElementById('hc-res-fc-water').innerText = water + ' ml';
    
    document.getElementById('hc-filter-coffee-result').classList.add('visible');
}
