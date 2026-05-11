function hcMosfetHesapla() {
    const k = parseFloat(document.getElementById('hc-mf-k').value);
    const vgs = parseFloat(document.getElementById('hc-mf-vgs').value);
    const vth = parseFloat(document.getElementById('hc-mf-vth').value);

    if (isNaN(k) || isNaN(vgs) || isNaN(vth)) {
        alert('Lütfen tüm değerleri girin.');
        return;
    }

    if (vgs < vth) {
        document.getElementById('hc-mf-res-total').innerText = "0 (Kesimde)";
    } else {
        // ID = (1/2) * k * (VGS - Vth)^2
        const id = 0.5 * k * Math.pow(vgs - vth, 2);
        document.getElementById('hc-mf-res-total').innerText = id.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    }
    
    document.getElementById('hc-mf-result').classList.add('visible');
}
