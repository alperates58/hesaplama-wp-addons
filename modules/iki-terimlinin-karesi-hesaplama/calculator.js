function hcBinomialSqHesapla() {
    const a = parseFloat(document.getElementById('hc-bs-a').value);
    const b = parseFloat(document.getElementById('hc-bs-b').value);
    const sign = document.getElementById('hc-bs-sign').value;

    if (isNaN(a) || isNaN(b)) {
        alert('Lütfen terimleri giriniz.');
        return;
    }

    const a2 = a * a;
    const b2 = b * b;
    const ab2 = 2 * a * b;
    
    let result = 0;
    let step = "";

    if (sign === 'plus') {
        result = a2 + ab2 + b2;
        step = `${a}² + 2(${a})(${b}) + ${b}² = ${a2} + ${ab2} + ${b2}`;
    } else {
        result = a2 - ab2 + b2;
        step = `${a}² - 2(${a})(${b}) + ${b}² = ${a2} - ${ab2} + ${b2}`;
    }

    document.getElementById('hc-bs-res-val').innerText = result.toLocaleString('tr-TR');
    document.getElementById('hc-bs-res-step').innerText = step;

    document.getElementById('hc-binomial-result').classList.add('visible');
}
