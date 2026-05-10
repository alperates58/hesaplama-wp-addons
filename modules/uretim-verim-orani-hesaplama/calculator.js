function hcProdYieldHesapla() {
    const actual = parseFloat(document.getElementById('hc-py-actual').value);
    const target = parseFloat(document.getElementById('hc-py-target').value);

    if (isNaN(actual) || isNaN(target) || target <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const yieldRate = (actual / target) * 100;

    document.getElementById('hc-py-res-val').innerText = `% ${yieldRate.toLocaleString('tr-TR', { maximumFractionDigits: 1 })}`;
    document.getElementById('hc-uretim-verim-result').classList.add('visible');
}
