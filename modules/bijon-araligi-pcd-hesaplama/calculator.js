function hcPcdHesapla() {
    const count = parseInt(document.getElementById('hc-pcd-count').value);
    const dist = parseFloat(document.getElementById('hc-pcd-dist').value);

    if (isNaN(dist)) {
        alert('Lütfen mesafeyi girin.');
        return;
    }

    let pcd = 0;
    if (count === 4) pcd = dist * 1.4142;
    else if (count === 5) pcd = dist * 1.7012;
    else if (count === 6) pcd = dist * 2.0;

    document.getElementById('hc-pcd-val').innerText = count + " x " + Math.round(pcd);
    document.getElementById('hc-pcd-result').classList.add('visible');
}
