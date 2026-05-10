function hcRecipeScalerHesapla() {
    const orig = parseFloat(document.getElementById('hc-rs-orig').value);
    const target = parseFloat(document.getElementById('hc-rs-target').value);
    const amount = parseFloat(document.getElementById('hc-rs-amount').value);

    if (isNaN(orig) || isNaN(target) || isNaN(amount) || orig <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const ratio = target / orig;
    const newAmount = amount * ratio;

    document.getElementById('hc-rs-res').innerText = newAmount.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-rs-info').innerText = `Katsayı: ${ratio.toFixed(2)}x. Bu tarifi ${target} kişiye uyarlamak için her malzemeyi ${ratio.toFixed(2)} ile çarpın.`;
    
    document.getElementById('hc-recipe-scaler-result').classList.add('visible');
}
