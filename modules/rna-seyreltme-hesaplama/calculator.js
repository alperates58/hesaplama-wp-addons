function hcRnaDilHesapla() {
    const c1 = parseFloat(document.getElementById('hc-rd-c1').value);
    const c2 = parseFloat(document.getElementById('hc-rd-c2').value);
    const v2 = parseFloat(document.getElementById('hc-rd-v2').value);

    if (!c1 || !c2 || !v2) {
        alert('Lütfen tüm alanları doldurunuz.');
        return;
    }

    if (c2 > c1) {
        alert('Hedef konsantrasyon stoktan büyük olamaz.');
        return;
    }

    const v1 = (c2 * v2) / c1;
    const water = v2 - v1;

    document.getElementById('hc-rd-res-stok').innerHTML = `Gereken Stok RNA Hacmi (V1): <strong>${v1.toFixed(2).toLocaleString('tr-TR')}</strong>`;
    document.getElementById('hc-rd-res-water').innerHTML = `Eklenecek RNase-Free Su Hacmi: <strong>${water.toFixed(2).toLocaleString('tr-TR')}</strong>`;

    document.getElementById('hc-rna-dil-result').classList.add('visible');
}
