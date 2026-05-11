function hcMttrHesapla() {
    const time = parseFloat(document.getElementById('hc-mttr-time').value);
    const count = parseInt(document.getElementById('hc-mttr-count').value);

    if (isNaN(time) || isNaN(count) || count <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const mttr = time / count;

    document.getElementById('hc-mttr-res-total').innerText = mttr.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-mttr-result').classList.add('visible');
}
