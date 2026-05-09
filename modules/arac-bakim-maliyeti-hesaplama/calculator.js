function hcBmHesapla() {
    const items = document.querySelectorAll('.hc-bm-item:checked');
    const labor = parseFloat(document.getElementById('hc-bm-labor').value) || 0;

    let totalParts = 0;
    items.forEach(item => {
        totalParts += parseFloat(item.getAttribute('data-price'));
    });

    const total = totalParts + labor;

    document.getElementById('hc-bm-val').innerText = total.toLocaleString('tr-TR') + " ₺";
    document.getElementById('hc-bm-result').classList.add('visible');
}
