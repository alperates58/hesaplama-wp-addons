function hcRatioSimpHesapla() {
    const v1 = parseInt(document.getElementById('hc-rs-v1').value);
    const v2 = parseInt(document.getElementById('hc-rs-v2').value);

    if (isNaN(v1) || isNaN(v2) || v2 === 0) {
        alert('Lütfen geçerli tam sayılar giriniz.');
        return;
    }

    function gcd(a, b) {
        return b ? gcd(b, a % b) : a;
    }

    const common = gcd(Math.abs(v1), Math.abs(v2));
    const r1 = v1 / common;
    const r2 = v2 / common;

    document.getElementById('hc-rs-res-val').innerText = `${r1} : ${r2}`;
    document.getElementById('hc-ratio-simp-result').classList.add('visible');
}
