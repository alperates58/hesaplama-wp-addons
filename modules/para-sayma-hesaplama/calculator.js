function hcMoneyCountHesapla() {
    const inputs = document.querySelectorAll('.hc-m-input');
    let total = 0;

    inputs.forEach(input => {
        const val = parseFloat(input.getAttribute('data-val'));
        const count = parseInt(input.value) || 0;
        total += val * count;
    });

    document.getElementById('hc-res-money-total').innerText = total.toLocaleString('tr-TR', {style: 'currency', currency: 'TRY'});
    document.getElementById('hc-money-count-result').classList.add('visible');
}
