function hcSosOraniHesapla() {
    const total = parseFloat(document.getElementById('hc-sd-total').value);
    const ratio = parseFloat(document.getElementById('hc-sd-ratio').value);

    if (!total || total <= 0) return;

    const parts = ratio + 1;
    const onePart = total / parts;
    const oil = onePart * ratio;
    const acid = onePart;

    const resultDiv = document.getElementById('hc-salad-dressing-result');
    document.getElementById('hc-sd-res-oil').innerText = Math.round(oil).toLocaleString('tr-TR') + ' ml';
    document.getElementById('hc-sd-res-acid').innerText = Math.round(acid).toLocaleString('tr-TR') + ' ml';
    
    resultDiv.classList.add('visible');
}
