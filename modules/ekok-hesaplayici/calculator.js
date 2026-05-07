function gcd(a, b) {
    a = Math.abs(a);
    b = Math.abs(b);
    while (b) {
        a %= b;
        [a, b] = [b, a];
    }
    return a;
}

function lcm(a, b) {
    if (a === 0 || b === 0) return 0;
    return Math.abs(a * b) / gcd(a, b);
}

function hcEkokHesapla() {
    const n1 = parseInt(document.getElementById('hc-ekok-n1').value);
    const n2 = parseInt(document.getElementById('hc-ekok-n2').value);
    const n3 = parseInt(document.getElementById('hc-ekok-n3').value);

    if (isNaN(n1) || isNaN(n2) || n1 <= 0 || n2 <= 0) {
        alert('Lütfen en az iki pozitif sayı giriniz.');
        return;
    }

    let result = lcm(n1, n2);
    let desc = `EKOK(${n1}, ${n2})`;

    if (!isNaN(n3) && n3 > 0) {
        result = lcm(result, n3);
        desc = `EKOK(${n1}, ${n2}, ${n3})`;
    }

    document.getElementById('hc-res-ekok-val').innerText = result.toLocaleString('tr-TR');
    document.getElementById('hc-res-ekok-desc').innerText = desc;

    document.getElementById('hc-ekok-result').classList.add('visible');
    document.getElementById('hc-ekok-result').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
