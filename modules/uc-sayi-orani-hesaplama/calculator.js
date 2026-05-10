function hcThreeRatioHesapla() {
    const a = parseInt(document.getElementById('hc-tr-a').value);
    const b = parseInt(document.getElementById('hc-tr-b').value);
    const c = parseInt(document.getElementById('hc-tr-c').value);

    if (isNaN(a) || isNaN(b) || isNaN(c) || a <= 0 || b <= 0 || c <= 0) {
        alert('Lütfen geçerli pozitif tam sayılar giriniz.');
        return;
    }

    function gcd(x, y) {
        return y ? gcd(y, x % y) : x;
    }

    const common = gcd(a, gcd(b, c));
    
    document.getElementById('hc-tr-res-val').innerText = `${a/common} : ${b/common} : ${c/common}`;
    document.getElementById('hc-uc-sayi-orani-result').classList.add('visible');
}
