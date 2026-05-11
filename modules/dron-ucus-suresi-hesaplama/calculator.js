function hcDronUcusHesapla() {
    const cap = parseFloat(document.getElementById('hc-du-cap').value); // mAh
    const amp = parseFloat(document.getElementById('hc-du-amp').value); // A
    const dis = parseFloat(document.getElementById('hc-du-dis').value) / 100;

    if (isNaN(cap) || isNaN(amp) || isNaN(dis) || amp <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // t (saat) = (Cap/1000 * dis) / amp
    const tSaat = (cap / 1000 * dis) / amp;
    const tDakika = tSaat * 60;
    
    const dk = Math.floor(tDakika);
    const sn = Math.round((tDakika - dk) * 60);

    document.getElementById('hc-du-res-val').innerText = dk + ' dk ' + sn + ' sn';
    
    document.getElementById('hc-du-result').classList.add('visible');
}
