function hcKitchenUnitsHesapla() {
    const fromVal = parseFloat(document.getElementById('hc-unit-from').value);
    const val = parseFloat(document.getElementById('hc-unit-val').value);

    if (isNaN(val) || val <= 0) {
        alert('Lütfen miktar giriniz.');
        return;
    }

    const baseMl = val * fromVal;

    document.getElementById('hc-unit-res-list').innerHTML = `
        <ul style="text-align:left;">
            <li><strong>Mililitre:</strong> ${baseMl.toLocaleString('tr-TR')} ml</li>
            <li><strong>Su Bardağı:</strong> ${(baseMl / 200).toLocaleString('tr-TR', {maximumFractionDigits:2})} adet</li>
            <li><strong>Çay Bardağı:</strong> ${(baseMl / 100).toLocaleString('tr-TR', {maximumFractionDigits:2})} adet</li>
            <li><strong>Yemek Kaşığı:</strong> ${(baseMl / 15).toLocaleString('tr-TR', {maximumFractionDigits:1})} adet</li>
            <li><strong>Çay Kaşığı:</strong> ${(baseMl / 5).toLocaleString('tr-TR', {maximumFractionDigits:1})} adet</li>
        </ul>
    `;
    
    document.getElementById('hc-kitchen-units-result').classList.add('visible');
}
