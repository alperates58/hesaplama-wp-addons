function hcIceCreamHesapla() {
    const people = parseInt(document.getElementById('hc-ic-people').value) || 0;
    const portion = parseInt(document.getElementById('hc-ic-portion').value) || 0;

    const totalWeight = people * portion * 55;

    document.getElementById('hc-res-ic-weight').innerText = Math.round(totalWeight) + ' gr';
    document.getElementById('hc-ice-cream-result').classList.add('visible');
}
