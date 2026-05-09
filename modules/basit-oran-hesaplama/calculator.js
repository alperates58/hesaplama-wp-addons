function hcOranHesapla() {
    const v1 = parseFloat(document.getElementById('hc-br-v1').value);
    const v2 = parseFloat(document.getElementById('hc-br-v2').value);

    if (isNaN(v1) || isNaN(v2) || v2 === 0) {
        alert('Lütfen geçerli sayılar girin (B sıfır olamaz).');
        return;
    }

    const decimal = v1 / v2;
    
    // Simplification for integers
    let ratioStr = '';
    if (Number.isInteger(v1) && Number.isInteger(v2)) {
        const gcd = (a, b) => b === 0 ? a : gcd(b, a % b);
        const common = Math.abs(gcd(v1, v2));
        ratioStr = `${v1 / common} : ${v2 / common}`;
    } else {
        ratioStr = `${v1} : ${v2}`;
    }

    document.getElementById('hc-res-br-ratio').innerText = ratioStr;
    document.getElementById('hc-res-br-dec').innerText = decimal.toLocaleString('tr-TR', { maximumFractionDigits: 6 });

    document.getElementById('hc-br-result').classList.add('visible');
}
