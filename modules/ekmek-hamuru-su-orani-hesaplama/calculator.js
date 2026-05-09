function hcBreadWaterHesapla() {
    const flour = parseFloat(document.getElementById('hc-bw-flour').value) || 0;
    const hydro = parseFloat(document.getElementById('hc-bw-hydro').value) || 0;

    if (flour <= 0) return;

    const water = flour * (hydro / 100);

    document.getElementById('hc-res-bw-water').innerText = Math.round(water) + ' ml';
    document.getElementById('hc-bread-water-result').classList.add('visible');
}
