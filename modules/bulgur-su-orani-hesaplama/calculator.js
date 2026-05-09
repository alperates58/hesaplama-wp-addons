function hcBulgurWaterHesapla() {
    const type = document.getElementById('hc-bw-type').value;
    const amount = parseFloat(document.getElementById('hc-bw-amount').value) || 0;

    let ratio = 2; // Su : Bulgur
    if (type === 'pilavlik') ratio = 2;
    else if (type === 'basbasi') ratio = 2.5;
    else if (type === 'koftelik') ratio = 1.5; // Islatma için

    const water = amount * ratio;

    document.getElementById('hc-res-bw-water').innerText = water.toFixed(1) + ' Bardak';
    document.getElementById('hc-bulgur-water-result').classList.add('visible');
}
