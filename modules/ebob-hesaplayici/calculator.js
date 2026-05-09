function gcd(a, b) {
    a = Math.abs(a);
    b = Math.abs(b);
    while (b) {
        a %= b;
        [a, b] = [b, a];
    }
    return a;
}

function hcEbobHesapla() {
    const n1 = parseInt(document.getElementById('hc-ebob-n1').value);
    const n2 = parseInt(document.getElementById('hc-ebob-n2').value);
    const n3 = parseInt(document.getElementById('hc-ebob-n3').value);

    if (isNaN(n1) || isNaN(n2) || n1 <= 0 || n2 <= 0) {
        alert('Lütfen en az iki pozitif sayı giriniz.');
        return;
    }

    let result = gcd(n1, n2);
    let desc = `EBOB(${n1}, ${n2})`;

    if (!isNaN(n3) && n3 > 0) {
        result = gcd(result, n3);
        desc = `EBOB(${n1}, ${n2}, ${n3})`;
    }

    document.getElementById('hc-res-ebob-val').innerText = result.toLocaleString('tr-TR');
    document.getElementById('hc-res-ebob-desc').innerText = desc;

    document.getElementById('hc-ebob-result').classList.add('visible');
    document.getElementById('hc-ebob-result').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
