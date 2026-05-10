function hcRatioCalcHesapla() {
    const a = Math.abs(parseInt(document.getElementById('hc-rt-s1').value));
    const b = Math.abs(parseInt(document.getElementById('hc-rt-s2').value));

    if (!a || !b) {
        alert('Lütfen geçerli tam sayılar giriniz.');
        return;
    }

    const gcd = (x, y) => y === 0 ? x : gcd(y, x % y);
    const common = gcd(a, b);

    const simpleA = a / common;
    const simpleB = b / common;

    document.getElementById('hc-rt-res-val').innerText = `${a} : ${b}`;
    document.getElementById('hc-rt-res-simple').innerText = `Sadeleşmiş: ${simpleA} : ${simpleB}`;

    document.getElementById('hc-ratio-result').classList.add('visible');
}
