const hcBasData = {
    erkek: { 0: [32, 35, 37], 6: [41, 43, 45], 12: [44, 46, 48], 24: [46, 48, 51], 36: [47, 50, 53], 60: [48, 51, 54] },
    kadin: { 0: [31, 34, 36], 6: [40, 42, 44], 12: [43, 45, 47], 24: [45, 47, 50], 36: [46, 49, 52], 60: [47, 50, 53] }
};

function hcBasCevresiPersentilHesapla() {
    const cinsiyet = document.getElementById('hc-bcp-cinsiyet').value;
    const ay = parseInt(document.getElementById('hc-bcp-ay').value);
    const bas = parseFloat(document.getElementById('hc-bcp-bas').value);
    if (isNaN(ay) || isNaN(bas)) { alert('Lütfen bilgileri giriniz.'); return; }
    
    const data = hcBasData[cinsiyet];
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
    if (bas < range[0]) p = '< %3';
    else if (bas > range[2]) p = '> %97';
    else if (bas <= range[1]) p = '%' + Math.round(3 + (bas-range[0])/(range[1]-range[0])*47);
    else p = '%' + Math.round(50 + (bas-range[1])/(range[2]-range[1])*47);

    document.getElementById('hc-res-bcp-p').innerText = p;
    document.getElementById('hc-bas-cevresi-p-result').classList.add('visible');
}
