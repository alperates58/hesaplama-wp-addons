function hcOhmAkimHesapla() {
    const v = parseFloat(document.getElementById('hc-oa-v').value);
    const r = parseFloat(document.getElementById('hc-oa-r').value);

    if (isNaN(v) || isNaN(r) || r === 0) {
        alert('Lütfen geçerli gerilim ve sıfırdan farklı direnç değeri girin.');
        return;
    }

    const i = v / r;

    document.getElementById('hc-oa-res-total').innerText = i.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-oa-result').classList.add('visible');
}
