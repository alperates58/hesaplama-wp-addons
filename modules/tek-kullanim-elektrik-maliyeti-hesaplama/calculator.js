function hcSingleUseHesapla() {
    const power = parseFloat(document.getElementById('hc-su-power').value) || 0;
    const time = parseFloat(document.getElementById('hc-su-time').value) || 0;

    const kwh = (power * (time / 60)) / 1000;
    const priceKWh = 3.50; // 2026 TR tahmini
    const cost = kwh * priceKWh;

    document.getElementById('hc-res-su-total').innerText = cost.toLocaleString('tr-TR', {style: 'currency', currency: 'TRY'});
    
    document.getElementById('hc-single-use-result').classList.add('visible');
}
