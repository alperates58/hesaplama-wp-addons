function hcAltmanZHesapla() {
    const assets = parseFloat(document.getElementById('hc-z-assets').value) || 0;
    const wc = parseFloat(document.getElementById('hc-z-wc').value) || 0;
    const re = parseFloat(document.getElementById('hc-z-re').value) || 0;
    const ebit = parseFloat(document.getElementById('hc-z-ebit').value) || 0;
    const mve = parseFloat(document.getElementById('hc-z-mve').value) || 0;
    const liab = parseFloat(document.getElementById('hc-z-liab').value) || 0;
    const sales = parseFloat(document.getElementById('hc-z-sales').value) || 0;

    if (assets === 0 || liab === 0) {
        alert('Lütfen toplam varlık ve borç bilgilerini giriniz.');
        return;
    }

    const x1 = wc / assets;
    const x2 = re / assets;
    const x3 = ebit / assets;
    const x4 = mve / liab;
    const x5 = sales / assets;

    const z = (1.2 * x1) + (1.4 * x2) + (3.3 * x3) + (0.6 * x4) + (1.0 * x5);

    document.getElementById('hc-z-res-val').innerText = z.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    const interp = document.getElementById('hc-z-interpretation');
    if (z > 2.99) {
        interp.innerText = "Güvenli Bölge";
        interp.style.color = "#27ae60";
    } else if (z > 1.81) {
        interp.innerText = "Gri Bölge";
        interp.style.color = "#f39c12";
    } else {
        interp.innerText = "Tehlike Bölgesi (İflas Riski)";
        interp.style.color = "#c0392b";
    }

    document.getElementById('hc-altman-z-result').classList.add('visible');
}
