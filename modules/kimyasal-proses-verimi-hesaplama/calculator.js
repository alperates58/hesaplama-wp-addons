function hcChemYieldHesapla() {
    const theory = parseFloat(document.getElementById('hc-cy-theory').value);
    const actual = parseFloat(document.getElementById('hc-cy-actual').value);

    if (isNaN(theory) || isNaN(actual) || theory <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const yieldPerc = (actual / theory) * 100;

    document.getElementById('hc-cy-res-val').innerText = '%' + yieldPerc.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    
    document.getElementById('hc-cy-result').classList.add('visible');
}
