function hcDiferansiyelBasincHesapla() {
    const p1 = parseFloat(document.getElementById('hc-dp-p1').value);
    const p2 = parseFloat(document.getElementById('hc-dp-p2').value);

    if (isNaN(p1) || isNaN(p2)) {
        alert('Lütfen geçerli basınç değerleri girin.');
        return;
    }

    const dpBar = Math.abs(p1 - p2);
    const dpPa = dpBar * 100000;
    const dpPsi = dpBar * 14.5038;

    document.getElementById('hc-dp-res-bar').innerText = dpBar.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' bar';
    document.getElementById('hc-dp-res-pa').innerText = Math.round(dpPa).toLocaleString('tr-TR') + ' Pa';
    document.getElementById('hc-dp-res-psi').innerText = dpPsi.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' PSI';
    
    document.getElementById('hc-dp-result').classList.add('visible');
}
