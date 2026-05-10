function hcFlourConvHesapla() {
    const type = document.getElementById('hc-fc-type').value;
    const water = parseFloat(document.getElementById('hc-fc-water').value);

    if (isNaN(water) || water <= 0) {
        alert('Lütfen su miktarını giriniz.');
        return;
    }

    let newWater = water;
    let info = '';

    if (type === 'whole') {
        newWater = water * 1.15; // %15 daha fazla su çeker
        info = 'Tam buğday unu kepekli yapısı nedeniyle beyaz una göre yaklaşık %15 daha fazla su çeker.';
    } else if (type === 'rye') {
        newWater = water * 1.25; // %25 daha fazla su çeker
        info = 'Çavdar unu çok yüksek su kaldırma kapasitesine sahiptir.';
    } else {
        info = 'Beyaz un için standart hidrasyon oranları geçerlidir.';
    }

    document.getElementById('hc-fc-res').innerText = Math.round(newWater) + ' ml';
    document.getElementById('hc-fc-info').innerText = info;
    
    document.getElementById('hc-flour-conv-result').classList.add('visible');
}
