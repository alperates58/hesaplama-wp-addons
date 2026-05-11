function hcOhmDirencHesapla() {
    const v = parseFloat(document.getElementById('hc-od-v').value);
    const i = parseFloat(document.getElementById('hc-od-i').value);

    if (isNaN(v) || isNaN(i) || i === 0) {
        alert('Lütfen geçerli gerilim ve sıfırdan farklı akım değeri girin.');
        return;
    }

    const r = v / i;

    document.getElementById('hc-od-res-total').innerText = r.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-od-result').classList.add('visible');
}
