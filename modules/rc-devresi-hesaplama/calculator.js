function hcRcHesapla() {
    const r = parseFloat(document.getElementById('hc-rc-resistor').value);
    const c = parseFloat(document.getElementById('hc-rc-capacitor').value);

    if (isNaN(r) || isNaN(c) || r <= 0 || c <= 0) {
        alert('Lütfen geçerli pozitif direnç ve kondansatör değerleri girin.');
        return;
    }

    const tau = r * c;
    const freq = 1 / (2 * Math.PI * r * c);

    document.getElementById('hc-rc-res-tau').innerText = tau.toLocaleString('tr-TR', { maximumFractionDigits: 6 });
    document.getElementById('hc-rc-res-freq').innerText = freq.toLocaleString('tr-TR', { maximumFractionDigits: 2 });

    document.getElementById('hc-rc-result').classList.add('visible');
}
