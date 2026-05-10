function hcExpDivHesapla() {
    const a = parseFloat(document.getElementById('hc-ed-a').value);
    const x = parseFloat(document.getElementById('hc-ed-x').value);
    const y = parseFloat(document.getElementById('hc-ed-y').value);

    if (isNaN(a) || isNaN(x) || isNaN(y)) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const newExp = x - y;
    const resVal = Math.pow(a, newExp);

    document.getElementById('hc-ed-res-val').innerText = `${a}^${newExp}`;
    document.getElementById('hc-ed-desc').innerText = `Değeri: ${resVal.toLocaleString('tr-TR', { maximumFractionDigits: 6 })}`;
    document.getElementById('hc-uslu-sayi-bolme-result').classList.add('visible');
}
