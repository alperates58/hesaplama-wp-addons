function hcOliveYieldHesapla() {
    const weight = parseFloat(document.getElementById('hc-oy-weight').value);
    const ratio = parseFloat(document.getElementById('hc-oy-ratio').value);

    if (isNaN(weight) || weight <= 0) {
        alert('Lütfen zeytin miktarını giriniz.');
        return;
    }

    const yieldLitre = weight / ratio;

    document.getElementById('hc-oy-val').innerText = yieldLitre.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Litre';
    document.getElementById('hc-oy-info').innerText = `Hesaplama ${ratio} kg zeytinden 1 litre yağ elde edileceği öngörülerek yapılmıştır. Zeytin türüne ve hasat zamanına göre değişiklik gösterir.`;
    
    document.getElementById('hc-olive-yield-result').classList.add('visible');
}
