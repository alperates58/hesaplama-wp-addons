function hcProtezYukHesapla() {
    const weight = parseFloat(document.getElementById('hc-py-weight').value);
    const factor = parseFloat(document.getElementById('hc-py-activity').value);

    if (isNaN(weight) || weight <= 0) {
        alert('Lütfen geçerli bir ağırlık girin.');
        return;
    }

    const g = 9.80665;
    const force_n = weight * g * factor;
    const force_kg = force_n / g;

    document.getElementById('hc-py-res-total').innerText = force_n.toLocaleString('tr-TR', { maximumFractionDigits: 1 });
    document.getElementById('hc-py-res-kg').innerText = force_kg.toLocaleString('tr-TR', { maximumFractionDigits: 1 });

    document.getElementById('hc-py-result').classList.add('visible');
}
