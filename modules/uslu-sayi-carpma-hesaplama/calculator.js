function hcExpMulHesapla() {
    const a = parseFloat(document.getElementById('hc-em-a').value);
    const x = parseFloat(document.getElementById('hc-em-x').value);
    const y = parseFloat(document.getElementById('hc-em-y').value);

    if (isNaN(a) || isNaN(x) || isNaN(y)) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const newExp = x + y;
    const resVal = Math.pow(a, newExp);

    document.getElementById('hc-em-res-val').innerText = `${a}^${newExp}`;
    document.getElementById('hc-em-desc').innerText = `Değeri: ${resVal.toLocaleString('tr-TR', { maximumFractionDigits: 6 })}`;
    document.getElementById('hc-uslu-sayi-carpma-result').classList.add('visible');
}
