function hcEbobEkokHesapla() {
    const s1 = Math.abs(parseInt(document.getElementById('hc-ee-s1').value));
    const s2 = Math.abs(parseInt(document.getElementById('hc-ee-s2').value));

    if (isNaN(s1) || isNaN(s2) || s1 === 0 || s2 === 0) {
        alert('Lütfen geçerli pozitif tam sayılar giriniz.');
        return;
    }

    const gcd = (a, b) => b === 0 ? a : gcd(b, a % b);
    const ebob = gcd(s1, s2);
    const ekok = (s1 * s2) / ebob;

    document.getElementById('hc-ee-res-ebob').innerText = ebob.toLocaleString('tr-TR');
    document.getElementById('hc-ee-res-ekok').innerText = ekok.toLocaleString('tr-TR');

    document.getElementById('hc-ebob-ekok-result').classList.add('visible');
}
