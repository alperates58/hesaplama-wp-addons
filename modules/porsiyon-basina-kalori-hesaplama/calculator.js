function hcPortionCalHesapla() {
    const total = parseFloat(document.getElementById('hc-pc-total').value);
    const count = parseInt(document.getElementById('hc-pc-count').value);

    if (!total || !count) return;

    const perPortion = total / count;

    const resultDiv = document.getElementById('hc-portion-cal-result');
    document.getElementById('hc-pc-res-val').innerText = Math.round(perPortion).toLocaleString('tr-TR') + ' kcal';
    
    resultDiv.classList.add('visible');
}
