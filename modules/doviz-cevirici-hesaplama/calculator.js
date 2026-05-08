function hcDovizCevir() {
    const amount = parseFloat(document.getElementById('hc-cc-amount').value) || 0;
    const rate = parseFloat(document.getElementById('hc-cc-rate').value) || 0;
    const dir = document.getElementById('hc-cc-dir').value;

    if (rate <= 0) {
        alert('Lütfen geçerli bir kur giriniz.');
        return;
    }

    let result = 0;
    let unit = "";

    if (dir === 'to-tl') {
        result = amount * rate;
        unit = " TL";
    } else {
        result = amount / rate;
        unit = " Döviz";
    }

    document.getElementById('hc-cc-res-val').innerText = result.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + unit;

    document.getElementById('hc-curr-conv-result').classList.add('visible');
}
