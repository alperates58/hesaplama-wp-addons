function hcDüğünBütçesiHesapla() {
    const items = document.querySelectorAll('.hc-wed-item');
    let total = 0;
    items.forEach(i => total += parseFloat(i.value) || 0);

    document.getElementById('hc-wed-val').innerText = total.toLocaleString('tr-TR', { style: 'currency', currency: 'TRY' });
    document.getElementById('hc-wed-result').classList.add('visible');
}
