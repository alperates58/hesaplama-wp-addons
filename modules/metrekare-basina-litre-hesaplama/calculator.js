function hcLiterSqmHesapla() {
    const area = parseFloat(document.getElementById('hc-ls-area').value);
    const rate = parseFloat(document.getElementById('hc-ls-rate').value);
    const coats = parseInt(document.getElementById('hc-ls-coats').value || 1);

    if (!area || !rate) {
        alert('Lütfen alan ve sarfiyat oranını giriniz.');
        return;
    }

    const totalLiter = area * rate * coats;

    const resVal = document.getElementById('hc-ls-res-val');
    resVal.innerText = totalLiter.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 });

    document.getElementById('hc-liter-sqm-result').classList.add('visible');
}
