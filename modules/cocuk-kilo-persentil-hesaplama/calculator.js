const hcCocukKiloData = {
    erkek: { 2: [10, 12.5, 15], 5: [14, 18, 24], 10: [24, 32, 45], 15: [40, 56, 80], 18: [52, 70, 95] },
    kadin: { 2: [9, 12, 14.5], 5: [13, 18, 23], 10: [23, 33, 47], 15: [38, 52, 75], 18: [45, 58, 85] }
};

function hcCocukKiloPersentilHesapla() {
    const cinsiyet = document.getElementById('hc-ckp-cinsiyet').value;
    const yas = parseInt(document.getElementById('hc-ckp-yas').value);
    const kilo = parseFloat(document.getElementById('hc-ckp-kilo').value);
    if (isNaN(yas) || isNaN(kilo)) { alert('Lütfen bilgileri giriniz.'); return; }
    
    const data = hcCocukKiloData[cinsiyet];
    const ages = Object.keys(data).map(Number).sort((a,b)=>a-b);
    let low = ages[0], high = ages[ages.length-1];
    for(let i=0; i<ages.length; i++) {
        if(ages[i]<=yas) low = ages[i];
        if(ages[i]>yas) { high = ages[i]; break; }
    }
    const f = (high === low) ? 0 : (yas - low) / (high - low);
    const range = [
        data[low][0] + (data[high][0]-data[low][0])*f,
        data[low][1] + (data[high][1]-data[low][1])*f,
        data[low][2] + (data[high][2]-data[low][2])*f
    ];

    let p = '';
    if (kilo < range[0]) p = '< %3';
    else if (kilo > range[2]) p = '> %97';
    else if (kilo <= range[1]) p = '%' + Math.round(3 + (kilo-range[0])/(range[1]-range[0])*47);
    else p = '%' + Math.round(50 + (kilo-range[1])/(range[2]-range[1])*47);

    document.getElementById('hc-res-ckp-p').innerText = p;
    document.getElementById('hc-cocuk-kilo-p-result').classList.add('visible');
}
