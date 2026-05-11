function hcKarlilikEndeksiHesapla() {
    const pv = parseFloat(document.getElementById('hc-pi-pv').value);
    const investment = parseFloat(document.getElementById('hc-pi-investment').value);

    if (isNaN(pv) || isNaN(investment) || investment <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const pi = pv / investment;
    let comment = '';

    if (pi > 1) {
        comment = 'PI > 1: Yatırım kabul edilebilir, değer yaratmaktadır.';
    } else if (pi === 1) {
        comment = 'PI = 1: Yatırım başabaş noktasındadır.';
    } else {
        comment = 'PI < 1: Yatırım reddedilmelidir, değer kaybı yaratmaktadır.';
    }

    document.getElementById('hc-pi-value').innerText = pi.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 4 });
    document.getElementById('hc-pi-comment').innerText = comment;
    document.getElementById('hc-pi-result').classList.add('visible');
}
