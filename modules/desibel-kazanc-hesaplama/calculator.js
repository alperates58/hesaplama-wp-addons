function hcDKHesapla() {
    const type = document.getElementById('hc-dk-calc-type').value;
    const inputVal = parseFloat(document.getElementById('hc-dk-in').value);
    const outputVal = parseFloat(document.getElementById('hc-dk-out').value);

    if (isNaN(inputVal) || isNaN(outputVal) || inputVal <= 0 || outputVal <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    const multiplier = type === 'power' ? 10 : 20;
    const gain = multiplier * Math.log10(outputVal / inputVal);

    document.getElementById('hc-dk-val').innerText = gain.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' dB';
    document.getElementById('hc-dk-result').classList.add('visible');
}
