function hcAntilogHesapla() {
    const base = parseFloat(document.getElementById('hc-al-base').value);
    const logVal = parseFloat(document.getElementById('hc-al-log').value);

    if (isNaN(base) || isNaN(logVal)) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    if (base <= 0 || base === 1) {
        alert('Taban 0\'dan büyük ve 1\'den farklı olmalıdır.');
        return;
    }

    const x = Math.pow(base, logVal);

    document.getElementById('hc-res-al-val').innerText = x.toLocaleString('tr-TR', { maximumFractionDigits: 10 });

    document.getElementById('hc-al-result').classList.add('visible');
}
