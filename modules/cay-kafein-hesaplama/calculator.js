function hcCayKafeinHesapla() {
    const tur = document.getElementById('hc-ckh-tur').value;
    const boyut = document.getElementById('hc-ckh-boyut').value;
    const adet = parseFloat(document.getElementById('hc-ckh-adet').value) || 0;

    // mg per 100ml
    let mgPer100 = 20; 
    if (tur === 'siyah') mgPer100 = 22;
    if (tur === 'yesil') mgPer100 = 15;
    if (tur === 'beyaz') mgPer100 = 10;
    if (tur === 'oolong') mgPer100 = 18;

    let ml = 100;
    if (boyut === 'ince') ml = 100;
    if (boyut === 'kupa') ml = 250;
    if (boyut === 'fincan') ml = 150;

    const toplamMg = (mgPer100 * (ml / 100)) * adet;

    document.getElementById('hc-ckh-res-mg').innerText = Math.round(toplamMg) + ' mg';
    document.getElementById('hc-cay-kafein-hesaplama-result').classList.add('visible');
}
