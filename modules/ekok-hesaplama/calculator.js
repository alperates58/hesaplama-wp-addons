function hcEkokHesapla() {
    const s1 = Math.abs(parseInt(document.getElementById('hc-ek-s1').value));
    const s2 = Math.abs(parseInt(document.getElementById('hc-ek-s2').value));

    if (isNaN(s1) || isNaN(s2) || s1 === 0 || s2 === 0) {
        alert('Lütfen geçerli pozitif tam sayılar giriniz.');
        return;
    }

    const gcd = (a, b) => b === 0 ? a : gcd(b, a % b);
    const ekok = (s1 * s2) / gcd(s1, s2);

    document.getElementById('hc-ek-res-val').innerText = ekok.toLocaleString('tr-TR');
    document.getElementById('hc-ekok-result').classList.add('visible');
}
