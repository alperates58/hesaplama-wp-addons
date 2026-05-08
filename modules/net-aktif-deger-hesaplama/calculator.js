function hcNAVHesapla() {
    const assets = parseFloat(document.getElementById('hc-nav-assets').value) || 0;
    const liab = parseFloat(document.getElementById('hc-nav-liab').value) || 0;
    const shares = parseFloat(document.getElementById('hc-nav-shares').value) || 0;

    const navTotal = assets - liab;
    const navPerShare = shares > 0 ? navTotal / shares : 0;

    document.getElementById('hc-nav-res-total').innerText = navTotal.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-nav-res-share').innerText = navPerShare > 0 ? navPerShare.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺' : "-";

    document.getElementById('hc-nav-result').classList.add('visible');
}
