function hcBinSubHesapla() {
    const s1 = document.getElementById('hc-bsb-s1').value.trim();
    const s2 = document.getElementById('hc-bsb-s2').value.trim();

    if (!/^[01]+$/.test(s1) || !/^[01]+$/.test(s2)) {
        alert('Lütfen geçerli ikili sayılar giriniz.');
        return;
    }

    const d1 = parseInt(s1, 2);
    const d2 = parseInt(s2, 2);
    const diff = d1 - d2;

    if (diff < 0) {
        // Simple negative binary representation for this basic tool
        document.getElementById('hc-bsb-res-val').innerText = "-" + Math.abs(diff).toString(2);
    } else {
        document.getElementById('hc-bsb-res-val').innerText = diff.toString(2);
    }
    
    document.getElementById('hc-bsb-res-dec').innerText = `Onluk Karşılığı: ${diff}`;
    document.getElementById('hc-bin-sub-result').classList.add('visible');
}
