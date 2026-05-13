function hcOzgullukHesapla() {
    const tn = parseInt(document.getElementById('hc-spec-tn').value);
    const fp = parseInt(document.getElementById('hc-spec-fp').value);
    const resultDiv = document.getElementById('hc-ozgulluk-hesaplama-result');

    if (isNaN(tn) || isNaN(fp) || (tn + fp) === 0) {
        alert('Lütfen geçerli değerler giriniz (TN + FP > 0 olmalıdır).');
        return;
    }

    const specificity = tn / (tn + fp);
    
    document.getElementById('hc-spec-res-value').innerText = specificity.toLocaleString('tr-TR', {maximumFractionDigits: 4});
    document.getElementById('hc-spec-res-percent').innerText = `Yüzde: %${(specificity * 100).toLocaleString('tr-TR', {maximumFractionDigits: 2})}`;

    resultDiv.classList.add('visible');
}
