function hcHaftaSonuHesapla() {
    const startVal = document.getElementById('hc-hs-start').value;
    const endVal = document.getElementById('hc-hs-end').value;

    if (!startVal || !endVal) { alert('Lütfen tarihleri seçin.'); return; }

    let start = new Date(startVal);
    let end = new Date(endVal);
    
    if (start > end) { [start, end] = [end, start]; }

    let count = 0;
    let cur = new Date(start);
    while (cur <= end) {
        let day = cur.getDay();
        if (day === 0 || day === 6) count++; // 0=Pazar, 6=Cumartesi
        cur.setDate(cur.getDate() + 1);
    }

    document.getElementById('hc-hs-val').innerText = count + " Gün";
    document.getElementById('hc-hs-result').classList.add('visible');
}
