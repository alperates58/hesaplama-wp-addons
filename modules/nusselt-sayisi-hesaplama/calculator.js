function hcNusseltHesapla() {
    const h = parseFloat(document.getElementById('hc-nu-h').value);
    const l = parseFloat(document.getElementById('hc-nu-l').value);
    const k = parseFloat(document.getElementById('hc-nu-k').value);

    if (isNaN(h) || isNaN(l) || isNaN(k) || k <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const nu = (h * l) / k;

    document.getElementById('hc-nu-res-total').innerText = nu.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-nu-result').classList.add('visible');
}
