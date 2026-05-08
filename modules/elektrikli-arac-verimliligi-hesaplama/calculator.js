function hcEveHesapla() {
    const dist = parseFloat(document.getElementById('hc-eve-distance').value);
    const energy = parseFloat(document.getElementById('hc-eve-energy').value);

    if (isNaN(dist) || isNaN(energy) || dist === 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const kwh100 = (energy / dist) * 100;
    const whkm = (energy * 1000) / dist;

    document.getElementById('hc-eve-val1').innerText = kwh100.toFixed(2) + " kWh / 100km";
    document.getElementById('hc-eve-val2').innerText = Math.round(whkm) + " Wh/km";

    document.getElementById('hc-eve-result').classList.add('visible');
}
