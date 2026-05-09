function hcOcHesapla() {
    const cc = parseFloat(document.getElementById('hc-oc-cc').value);
    const cyl = parseInt(document.getElementById('hc-oc-cyl').value);

    if (isNaN(cc)) {
        alert('Lütfen motor hacmini girin.');
        return;
    }

    // Rough estimate: cc / 450 + (cyl * 0.2)
    const liters = (cc / 450) + (cyl * 0.1);

    document.getElementById('hc-oc-val').innerText = liters.toFixed(1) + " Litre";
    document.getElementById('hc-oc-result').classList.add('visible');
}
