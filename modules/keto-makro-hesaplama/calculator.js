function hcKetoHesapla() {
    const toplam = parseFloat(document.getElementById('hc-keto-toplam').value);
    const seviye = document.getElementById('hc-keto-seviye').value;

    if (!toplam) {
        alert('Lütfen günlük toplam kalori hedefinizi girin.');
        return;
    }

    let fRatio, pRatio, cRatio;

    switch (seviye) {
        case 'standart':
            fRatio = 0.70; pRatio = 0.25; cRatio = 0.05;
            break;
        case 'yuksek-protein':
            fRatio = 0.60; pRatio = 0.35; cRatio = 0.05;
            break;
        case 'hedefli':
            fRatio = 0.65; pRatio = 0.20; cRatio = 0.15;
            break;
    }

    const fKcal = toplam * fRatio;
    const pKcal = toplam * pRatio;
    const cKcal = toplam * cRatio;

    document.getElementById('hc-keto-fat-g').innerText = Math.round(fKcal / 9) + ' g';
    document.getElementById('hc-keto-fat-kcal').innerText = Math.round(fKcal) + ' kcal';

    document.getElementById('hc-keto-prot-g').innerText = Math.round(pKcal / 4) + ' g';
    document.getElementById('hc-keto-prot-kcal').innerText = Math.round(pKcal) + ' kcal';

    document.getElementById('hc-keto-carb-g').innerText = Math.round(cKcal / 4) + ' g';
    document.getElementById('hc-keto-carb-kcal').innerText = Math.round(cKcal) + ' kcal';

    document.getElementById('hc-keto-makro-result').classList.add('visible');
}
