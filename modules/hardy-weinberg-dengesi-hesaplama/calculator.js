function hcHwHesapla() {
    let p = parseFloat(document.getElementById('hc-hw-p').value);
    let q = parseFloat(document.getElementById('hc-hw-q').value);

    if (isNaN(p) && isNaN(q)) {
        alert('Lütfen p veya q değerinden birini giriniz.');
        return;
    }

    if (isNaN(p)) p = 1 - q;
    else if (isNaN(q)) q = 1 - p;

    if (Math.abs((p + q) - 1) > 0.001) {
        alert('p + q toplamı 1 olmalıdır.');
        return;
    }

    // p^2 + 2pq + q^2 = 1
    const p2 = p * p;
    const pq2 = 2 * p * q;
    const q2 = q * q;

    document.getElementById('hc-hw-res-summary').innerHTML = `
        <strong>Alel Frekansları:</strong> <br>
        p (Baskın): ${p.toFixed(2)} <br>
        q (Çekinik): ${q.toFixed(2)} <br><br>
        <strong>Genotip Frekansları:</strong> <br>
        p² (Homozigot Baskın): %${(p2 * 100).toFixed(1)} <br>
        2pq (Heterozigot): %${(pq2 * 100).toFixed(1)} <br>
        q² (Homozigot Çekinik): %${(q2 * 100).toFixed(1)}
    `;

    document.getElementById('hc-hw-calc-result').classList.add('visible');
}
