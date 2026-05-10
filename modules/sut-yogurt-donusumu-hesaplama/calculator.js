function hcMilkYogurtHesapla() {
    const milk = parseFloat(document.getElementById('hc-my-milk').value);

    if (isNaN(milk) || milk <= 0) {
        alert('Lütfen süt miktarını giriniz.');
        return;
    }

    // Normal yoğurt (yaklaşık 1:1 ağırlık/hacim oranı, kaynatma firesi %10)
    const normalYogurt = milk * 0.9;
    // Süzme yoğurt (yaklaşık 3:1 veya 4:1 oranı)
    const suzmeYogurt = milk / 3.5;

    document.getElementById('hc-my-res-list').innerHTML = `
        <ul style="text-align:left;">
            <li><strong>Normal Yoğurt:</strong> ~${normalYogurt.toLocaleString('tr-TR', {maximumFractionDigits:1})} kg</li>
            <li><strong>Süzme Yoğurt:</strong> ~${suzmeYogurt.toLocaleString('tr-TR', {maximumFractionDigits:1})} kg</li>
            <li><strong>Gereken Maya:</strong> ~${(milk * 2).toLocaleString('tr-TR')} yemek kaşığı</li>
        </ul>
    `;
    
    document.getElementById('hc-milk-yogurt-result').classList.add('visible');
}
