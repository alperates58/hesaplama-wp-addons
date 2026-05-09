function hcFoodWasteHesapla() {
    const gross = parseFloat(document.getElementById('hc-fw-gross').value) || 0;
    const net = parseFloat(document.getElementById('hc-fw-net').value) || 0;

    if (gross <= 0 || net > gross) return;

    const waste = gross - net;
    const perc = (waste / gross) * 100;

    document.getElementById('hc-res-fw-perc').innerText = '%' + perc.toFixed(1);
    document.getElementById('hc-res-fw-amount').innerText = waste.toFixed(1);
    
    document.getElementById('hc-food-waste-result').classList.add('visible');
}
