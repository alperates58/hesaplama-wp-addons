function hcPEHesapla() {
    const price = parseFloat(document.getElementById('hc-pe-price').value) || 0;
    const eps = parseFloat(document.getElementById('hc-pe-eps').value) || 0;

    if (eps === 0) {
        alert('Hisse başına kar sıfır olamaz.');
        return;
    }

    const pe = price / eps;

    document.getElementById('hc-pe-res-val').innerText = pe.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    document.getElementById('hc-pe-ratio-result').classList.add('visible');
}
