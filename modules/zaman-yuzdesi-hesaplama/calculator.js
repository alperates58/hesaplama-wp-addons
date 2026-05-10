function hcTimePctHesapla() {
    const elapsed = parseFloat(document.getElementById('hc-tp-elapsed').value);
    const total = parseFloat(document.getElementById('hc-tp-total').value);

    if (isNaN(elapsed) || isNaN(total) || total <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const pct = (elapsed / total) * 100;

    document.getElementById('hc-tp-res-val').innerText = `% ${pct.toLocaleString('tr-TR', { maximumFractionDigits: 1 })}`;
    document.getElementById('hc-zaman-yuzdesi-result').classList.add('visible');
}
