function hcBorekPortionHesapla() {
    const tray = document.getElementById('hc-bp-tray').value;
    let area = 0;

    if (tray === 'std_rect') area = 40 * 60;
    else if (tray === 'std_round') area = Math.PI * Math.pow(20, 2);
    else area = 30 * 40;

    // Ortalama börek porsiyonu ~150-200 cm²
    const portions = Math.floor(area / 180);

    document.getElementById('hc-res-bp-count').innerText = portions + ' Kişilik';
    document.getElementById('hc-borek-portion-result').classList.add('visible');
}
