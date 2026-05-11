function hcDiyalizKtVHesapla() {
    const preBUN = parseFloat(document.getElementById('hc-dy-pre').value);
    const postBUN = parseFloat(document.getElementById('hc-dy-post').value);
    const t = parseFloat(document.getElementById('hc-dy-time').value);
    const uf = parseFloat(document.getElementById('hc-dy-uf').value);
    const w = parseFloat(document.getElementById('hc-dy-weight').value);

    if (isNaN(preBUN) || isNaN(postBUN) || isNaN(t) || isNaN(uf) || isNaN(w) || w <= 0 || preBUN <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // R = Post / Pre
    const R = postBUN / preBUN;

    // Kt/V = -ln(R - 0.03) + (4 - 3.5 * R) * (UF / W)
    // Note: Simplified Daugirdas formula
    const ktv = -Math.log(R - 0.03) + (4 - 3.5 * R) * (uf / w);

    let desc = "";
    if (ktv >= 1.2) {
        desc = "Yeterli: Değer hedef seviye (1.2) üzerindedir.";
    } else {
        desc = "Yetersiz: Değer hedef seviyenin (1.2) altındadır.";
    }

    document.getElementById('hc-dy-res-val').innerText = ktv.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-dy-res-desc').innerText = desc;
    
    document.getElementById('hc-dy-result').classList.add('visible');
}
