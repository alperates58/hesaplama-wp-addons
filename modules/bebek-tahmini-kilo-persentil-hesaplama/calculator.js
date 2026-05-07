const hcKiloData = {
    erkek: { 0: [2.5, 3.3, 4.4], 3: [5.0, 6.4, 8.0], 6: [6.4, 7.9, 9.8], 12: [7.7, 9.6, 12.0], 24: [9.7, 12.2, 15.3], 36: [11.3, 14.3, 18.3] },
    kadin: { 0: [2.4, 3.2, 4.2], 3: [4.6, 5.8, 7.5], 6: [5.8, 7.3, 9.2], 12: [7.0, 8.9, 11.5], 24: [9.0, 11.5, 14.8], 36: [10.6, 13.6, 17.8] }
};

function hcBebekTahminiKiloHesapla() {
    const cinsiyet = document.getElementById('hc-btk-cinsiyet').value;
    const ay = parseInt(document.getElementById('hc-btk-ay').value);
    const kilo = parseFloat(document.getElementById('hc-btk-kilo').value);

    if (isNaN(ay) || isNaN(kilo)) { alert('Lütfen bilgileri giriniz.'); return; }

    const data = hcKiloData[cinsiyet];
    const ages = Object.keys(data).map(Number).sort((a,b)=>a-b);
    let low = ages[0], high = ages[ages.length-1];
    for(let i=0; i<ages.length; i++) {
        if(ages[i]<=ay) low = ages[i];
        if(ages[i]>ay) { high = ages[i]; break; }
    }
    const f = (high === low) ? 0 : (ay - low) / (high - low);
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

    document.getElementById('hc-res-btk-p').innerText = p;
    document.getElementById('hc-bebek-tahmini-kilo-result').classList.add('visible');
}
