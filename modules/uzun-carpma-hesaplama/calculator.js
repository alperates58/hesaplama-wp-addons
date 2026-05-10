function hcLongMulHesapla() {
    const s1 = parseFloat(document.getElementById('hc-lm-s1').value);
    const s2 = parseFloat(document.getElementById('hc-lm-s2').value);

    if (isNaN(s1) || isNaN(s2)) {
        alert('Lütfen geçerli sayıları giriniz.');
        return;
    }

    const result = s1 * s2;

    document.getElementById('hc-lm-res-val').innerText = result.toLocaleString('tr-TR');
    document.getElementById('hc-uzun-carpma-result').classList.add('visible');
}
