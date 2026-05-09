function hcChocoQtyHesapla() {
    const type = document.getElementById('hc-cq-type').value;
    const count = parseFloat(document.getElementById('hc-cq-count').value) || 0;

    let total = 0;
    switch(type) {
        case 'mold': total = count * 100; break; // 100gr per tablet
        case 'coating': total = count * 15; break; // 15gr per item (fruit/small cake)
        case 'ganache': total = count * 200; break; // 200gr per layer
    }

    document.getElementById('hc-res-cq-total').innerText = Math.round(total) + ' gr';
    document.getElementById('hc-choco-qty-result').classList.add('visible');
}
