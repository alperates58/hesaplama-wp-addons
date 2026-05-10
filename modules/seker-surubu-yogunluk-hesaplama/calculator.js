function hcSyrupDensityHesapla() {
    const sugar = parseFloat(document.getElementById('hc-sd-sugar').value);
    const water = parseFloat(document.getElementById('hc-sd-water').value);

    if (isNaN(sugar) || isNaN(water) || (sugar + water) === 0) {
        alert('Lütfen geçerli miktarlar giriniz.');
        return;
    }

    const totalWeight = sugar + water;
    const brix = (sugar / totalWeight) * 100;

    document.getElementById('hc-sd-val').innerText = '%' + brix.toFixed(1);
    
    let info = '';
    if (brix <= 50) info = 'Hafif Şurup (Kokteyller ve hafif tatlılar için).';
    else if (brix <= 65) info = 'Orta Şurup (Şerbetli tatlılar için ideal).';
    else info = 'Ağır Şurup (Reçeller ve koruyucu şuruplar için).';

    document.getElementById('hc-sd-info').innerText = info;
    document.getElementById('hc-syrup-density-result').classList.add('visible');
}
