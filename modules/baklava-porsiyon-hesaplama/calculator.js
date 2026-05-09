function hcBaklavaPortionHesapla() {
    const tray = document.getElementById('hc-bp-tray').value;
    let area = 0;

    if (tray === 'std_rect') area = 40 * 60;
    else if (tray === 'std_round') area = Math.PI * Math.pow(20, 2);
    else if (tray === 'home_rect') area = 30 * 40;
    else {
        const w = parseFloat(document.getElementById('hc-bp-w').value) || 0;
        const l = parseFloat(document.getElementById('hc-bp-l').value) || 0;
        area = w * l;
    }

    if (area <= 0) return;

    // Ortalama bir baklava dilimi ~25-30 cm² (5x5 veya 4x7 gibi)
    const slices = Math.floor(area / 28);
    const portions = Math.floor(slices / 4);

    document.getElementById('hc-res-bp-slices').innerText = slices + ' Dilim';
    document.getElementById('hc-res-bp-portions').innerText = portions + ' Kişilik';
    
    document.getElementById('hc-baklava-portion-result').classList.add('visible');
}
