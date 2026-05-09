function hcSpreadQtyHesapla() {
    const people = parseInt(document.getElementById('hc-sq-people').value) || 0;
    const slices = parseInt(document.getElementById('hc-sq-slices').value) || 0;

    // Ortalama 18gr per slice
    const total = people * slices * 18;

    document.getElementById('hc-res-sq-total').innerText = Math.round(total) + ' gr';
    document.getElementById('hc-spread-qty-result').classList.add('visible');
}
