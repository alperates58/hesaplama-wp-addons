function hcYumurtaMiktariHesapla() {
    const count = parseInt(document.getElementById('hc-eq-count').value);
    const sizeWeight = parseFloat(document.getElementById('hc-eq-size').value);

    if (!count || count <= 0) return;

    const totalWeight = count * sizeWeight;

    document.getElementById('hc-eq-res-val').innerText = totalWeight.toLocaleString('tr-TR') + ' g';

    document.getElementById('hc-egg-qty-result').classList.add('visible');
}
