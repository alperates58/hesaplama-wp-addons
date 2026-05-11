function hcTransformerHesapla() {
    const vp = parseFloat(document.getElementById('hc-tr-vp').value);
    const vs = parseFloat(document.getElementById('hc-tr-vs').value);
    const np = parseFloat(document.getElementById('hc-tr-np').value);

    if (isNaN(vp) || isNaN(vs) || isNaN(np) || vs <= 0 || vp <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // Ns = (Vs * Np) / Vp
    const ns = (vs * np) / vp;
    const ratio = vp / vs;

    document.getElementById('hc-tr-res-ns').innerText = Math.round(ns).toLocaleString('tr-TR');
    document.getElementById('hc-tr-res-ratio').innerText = ratio.toLocaleString('tr-TR', { maximumFractionDigits: 3 });
    
    document.getElementById('hc-tr-result').classList.add('visible');
}
