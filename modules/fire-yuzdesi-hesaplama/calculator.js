function hcFirePctHesapla() {
    const total = parseFloat(document.getElementById('hc-fp-total').value);
    const waste = parseFloat(document.getElementById('hc-fp-waste').value);

    if (!total || isNaN(waste)) {
        alert('Lütfen geçerli miktarlar giriniz.');
        return;
    }

    const percentage = (waste / total) * 100;

    document.getElementById('hc-fp-res-val').innerText = `% ${percentage.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
    document.getElementById('hc-fire-pct-result').classList.add('visible');
}
