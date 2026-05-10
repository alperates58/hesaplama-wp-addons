function hcGeoSeqHesapla() {
    const a1 = parseFloat(document.getElementById('hc-gs-a1').value);
    const r = parseFloat(document.getElementById('hc-gs-r').value);
    const n = parseInt(document.getElementById('hc-gs-n').value);

    if (isNaN(a1) || isNaN(r) || isNaN(n)) {
        alert('Lütfen tüm alanları doldurunuz.');
        return;
    }

    // n-th term: an = a1 * r^(n-1)
    const an = a1 * Math.pow(r, n - 1);
    
    // Sum: Sn = a1 * (1 - r^n) / (1 - r)
    let sn = 0;
    if (r === 1) {
        sn = a1 * n;
    } else {
        sn = a1 * (1 - Math.pow(r, n)) / (1 - r);
    }

    document.getElementById('hc-gs-res-term').innerText = an.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-gs-res-sum').innerText = sn.toLocaleString('tr-TR', { maximumFractionDigits: 4 });

    document.getElementById('hc-geo-seq-result').classList.add('visible');
}
