function hcMakroHesapla() {
    const toplam = parseFloat(document.getElementById('hc-m-toplam').value);
    const hedef = document.getElementById('hc-m-hedef').value;

    if (!toplam) {
        alert('Lütfen günlük toplam kalori hedefinizi girin.');
        return;
    }

    let cRatio, pRatio, fRatio;

    switch (hedef) {
        case 'dengeli':
            cRatio = 0.50; pRatio = 0.20; fRatio = 0.30;
            break;
        case 'dusuk-karb':
            cRatio = 0.25; pRatio = 0.40; fRatio = 0.35;
            break;
        case 'yuksek-protein':
            cRatio = 0.35; pRatio = 0.35; fRatio = 0.30;
            break;
        case 'sporcu':
            cRatio = 0.60; pRatio = 0.20; fRatio = 0.20;
            break;
    }

    const cKcal = toplam * cRatio;
    const pKcal = toplam * pRatio;
    const fKcal = toplam * fRatio;

    document.getElementById('hc-m-carb-g').innerText = Math.round(cKcal / 4) + ' g';
    document.getElementById('hc-m-carb-kcal').innerText = Math.round(cKcal) + ' kcal';

    document.getElementById('hc-m-prot-g').innerText = Math.round(pKcal / 4) + ' g';
    document.getElementById('hc-m-prot-kcal').innerText = Math.round(pKcal) + ' kcal';

    document.getElementById('hc-m-fat-g').innerText = Math.round(fKcal / 9) + ' g';
    document.getElementById('hc-m-fat-kcal').innerText = Math.round(fKcal) + ' kcal';

    document.getElementById('hc-makro-besin-result').classList.add('visible');
}
