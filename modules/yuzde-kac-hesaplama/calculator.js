function hcPctWhatHesapla() {
    const x = parseFloat(document.getElementById('hc-pw-x').value);
    const y = parseFloat(document.getElementById('hc-pw-y').value);

    if (isNaN(x) || isNaN(y) || y === 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const res = (x / y) * 100;

    document.getElementById('hc-pw-res-val').innerText = `% ${res.toLocaleString('tr-TR', { maximumFractionDigits: 2 })}`;
    document.getElementById('hc-yuzde-what-result').classList.add('visible');
}
