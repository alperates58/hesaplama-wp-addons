function hcEbobHesapla() {
    const s1 = Math.abs(parseInt(document.getElementById('hc-eb-s1').value));
    const s2 = Math.abs(parseInt(document.getElementById('hc-eb-s2').value));

    if (isNaN(s1) || isNaN(s2) || s1 === 0 || s2 === 0) {
        alert('Lütfen geçerli pozitif tam sayılar giriniz.');
        return;
    }

    const gcd = (a, b) => b === 0 ? a : gcd(b, a % b);
    const ebob = gcd(s1, s2);

    document.getElementById('hc-eb-res-val').innerText = ebob.toLocaleString('tr-TR');
    document.getElementById('hc-ebob-result').classList.add('visible');
}
