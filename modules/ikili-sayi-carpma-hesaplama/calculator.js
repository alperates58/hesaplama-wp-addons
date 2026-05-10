function hcBinMulHesapla() {
    const s1 = document.getElementById('hc-bm-s1').value.trim();
    const s2 = document.getElementById('hc-bm-s2').value.trim();

    if (!/^[01]+$/.test(s1) || !/^[01]+$/.test(s2)) {
        alert('Lütfen geçerli ikili sayılar giriniz.');
        return;
    }

    const d1 = parseInt(s1, 2);
    const d2 = parseInt(s2, 2);
    const resultDec = d1 * d2;
    const resultBin = resultDec.toString(2);

    document.getElementById('hc-bm-res-val').innerText = resultBin;
    document.getElementById('hc-bm-res-dec').innerText = `Onluk Karşılığı: ${resultDec}`;
    document.getElementById('hc-bin-mul-result').classList.add('visible');
}
