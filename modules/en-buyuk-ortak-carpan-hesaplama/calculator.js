function hcEbocHesapla() {
    const s1 = Math.abs(parseInt(document.getElementById('hc-ec-s1').value));
    const s2 = Math.abs(parseInt(document.getElementById('hc-ec-s2').value));

    if (isNaN(s1) || isNaN(s2) || s1 === 0 || s2 === 0) {
        alert('Lütfen geçerli pozitif tam sayılar giriniz.');
        return;
    }

    const gcd = (a, b) => b === 0 ? a : gcd(b, a % b);
    const result = gcd(s1, s2);

    document.getElementById('hc-ec-res-val').innerText = result.toLocaleString('tr-TR');
    document.getElementById('hc-eboc-result').classList.add('visible');
}
