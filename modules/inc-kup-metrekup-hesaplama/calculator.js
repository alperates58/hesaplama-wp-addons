function hcCuinToCumHesapla() {
    const cuin = parseFloat(document.getElementById('hc-ic-val').value);

    if (isNaN(cuin)) {
        alert('Lütfen bir değer giriniz.');
        return;
    }

    // 1 cu in = 0.000016387064 m3
    const cum = cuin * 0.000016387064;

    document.getElementById('hc-ic-res-val').innerText = cum.toLocaleString('tr-TR', { minimumFractionDigits: 8, maximumFractionDigits: 8 });
    document.getElementById('hc-cuin-cum-result').classList.add('visible');
}
