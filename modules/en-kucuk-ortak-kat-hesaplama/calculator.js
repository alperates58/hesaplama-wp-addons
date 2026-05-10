function hcEkokAltHesapla() {
    const s1 = Math.abs(parseInt(document.getElementById('hc-eka-s1').value));
    const s2 = Math.abs(parseInt(document.getElementById('hc-eka-s2').value));

    if (isNaN(s1) || isNaN(s2) || s1 === 0 || s2 === 0) {
        alert('Lütfen geçerli pozitif tam sayılar giriniz.');
        return;
    }

    const gcd = (a, b) => b === 0 ? a : gcd(b, a % b);
    const result = (s1 * s2) / gcd(s1, s2);

    document.getElementById('hc-eka-res-val').innerText = result.toLocaleString('tr-TR');
    document.getElementById('hc-ekok-alt-result').classList.add('visible');
}
