function hcProteinDilHesapla() {
    const c1 = parseFloat(document.getElementById('hc-pd-c1').value);
    const c2 = parseFloat(document.getElementById('hc-pd-c2').value);
    const v2 = parseFloat(document.getElementById('hc-pd-v2').value);

    if (!c1 || !c2 || !v2) {
        alert('Lütfen tüm alanları doldurunuz.');
        return;
    }

    if (c2 > c1) {
        alert('Hedef konsantrasyon stoktan büyük olamaz.');
        return;
    }

    // V1 = (C2 * V2) / C1
    const v1 = (c2 * v2) / c1;
    const buffer = v2 - v1;

    document.getElementById('hc-pd-res-stok').innerHTML = `Gereken Stok Hacmi (V1): <strong>${v1.toFixed(2).toLocaleString('tr-TR')}</strong>`;
    document.getElementById('hc-pd-res-buffer').innerHTML = `Eklenecek Tampon/Su Hacmi: <strong>${buffer.toFixed(2).toLocaleString('tr-TR')}</strong>`;

    document.getElementById('hc-protein-dil-result').classList.add('visible');
}
