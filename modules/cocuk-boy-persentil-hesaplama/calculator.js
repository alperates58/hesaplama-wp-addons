const hcCocukBoyData = {
    erkek: { 2: [82, 87, 93], 5: [100, 110, 120], 10: [125, 138, 150], 15: [155, 170, 185], 18: [165, 176, 188] },
    kadin: { 2: [80, 86, 92], 5: [100, 109, 118], 10: [125, 138, 150], 15: [150, 162, 175], 18: [155, 163, 173] }
};

function hcCocukBoyPersentilHesapla() {
    const cinsiyet = document.getElementById('hc-cbp-cinsiyet').value;
    const yas = parseInt(document.getElementById('hc-cbp-yas').value);
    const boy = parseFloat(document.getElementById('hc-cbp-boy').value);
    if (isNaN(yas) || isNaN(boy)) { alert('Lütfen bilgileri giriniz.'); return; }
    
    const data = hcCocukBoyData[cinsiyet];
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
    if (boy < range[0]) p = '< %3';
    else if (boy > range[2]) p = '> %97';
    else if (boy <= range[1]) p = '%' + Math.round(3 + (boy-range[0])/(range[1]-range[0])*47);
    else p = '%' + Math.round(50 + (boy-range[1])/(range[2]-range[1])*47);

    document.getElementById('hc-res-cbp-p').innerText = p;
    document.getElementById('hc-cocuk-boy-p-result').classList.add('visible');
}
