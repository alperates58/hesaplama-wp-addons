function hcLongDivHesapla() {
    const s1 = parseInt(document.getElementById('hc-ld-s1').value);
    const s2 = parseInt(document.getElementById('hc-ld-s2').value);

    if (isNaN(s1) || isNaN(s2) || s2 === 0) {
        alert('Lütfen geçerli değerler giriniz (Bölen 0 olamaz).');
        return;
    }

    const quo = Math.floor(s1 / s2);
    const rem = s1 % s2;

    document.getElementById('hc-ld-res-quo').innerText = quo.toLocaleString('tr-TR');
    document.getElementById('hc-ld-res-rem').innerText = rem.toLocaleString('tr-TR');
    document.getElementById('hc-uzun-bolme-result').classList.add('visible');
}
