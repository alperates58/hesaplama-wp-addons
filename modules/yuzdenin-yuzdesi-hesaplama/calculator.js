function hcPctOfPctHesapla() {
    const val = parseFloat(document.getElementById('hc-pop-val').value);
    const p1 = parseFloat(document.getElementById('hc-pop-p1').value);
    const p2 = parseFloat(document.getElementById('hc-pop-p2').value);

    if (isNaN(val) || isNaN(p1) || isNaN(p2)) {
        alert('Lütfen tüm değerleri giriniz.');
        return;
    }

    // result = val * (p1/100) * (p2/100)
    const mid = val * (p1 / 100);
    const res = mid * (p2 / 100);

    document.getElementById('hc-pop-res-val').innerText = res.toLocaleString('tr-TR');
    document.getElementById('hc-pop-desc').innerText = `${val}'ın %${p1}'i (${mid}), bunun da %${p2}'si = ${res}`;
    document.getElementById('hc-yuzdenin-yuzdesi-result').classList.add('visible');
}
