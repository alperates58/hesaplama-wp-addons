function hcRatioHesapla() {
    const v1 = parseFloat(document.getElementById('hc-r-v1').value);
    const v2 = parseFloat(document.getElementById('hc-r-v2').value);

    if (isNaN(v1) || isNaN(v2) || v2 === 0) {
        alert('Lütfen geçerli sayılar giriniz (2. sayı 0 olamaz).');
        return;
    }

    function gcd(a, b) {
        return b ? gcd(b, a % b) : a;
    }

    const common = gcd(Math.abs(v1), Math.abs(v2));
    const r1 = v1 / common;
    const r2 = v2 / common;

    document.getElementById('hc-r-res-val').innerText = `${r1} : ${r2}`;
    document.getElementById('hc-r-res-desc').innerText = `Ondalık Değer: ${(v1 / v2).toLocaleString('tr-TR')}`;
    document.getElementById('hc-ratio-result').classList.add('visible');
}
