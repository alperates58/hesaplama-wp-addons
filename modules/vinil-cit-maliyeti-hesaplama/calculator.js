function hcVinylCostHesapla() {
    const panels = parseInt(document.getElementById('hc-vc-panels').value || 0);
    const pPrice = parseFloat(document.getElementById('hc-vc-pprice').value || 0);
    const posts = parseInt(document.getElementById('hc-vc-posts').value || 0);
    const oPrice = parseFloat(document.getElementById('hc-vc-oprice').value || 0);

    const total = (panels * pPrice) + (posts * oPrice);

    const resVal = document.getElementById('hc-vc-res-val');
    resVal.innerText = total.toLocaleString('tr-TR', { style: 'currency', currency: 'TRY' });

    document.getElementById('hc-vinyl-cost-result').classList.add('visible');
}
