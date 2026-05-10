function hcButterFatHesapla() {
    const weight = parseFloat(document.getElementById('hc-bf-weight').value);
    const pct = parseFloat(document.getElementById('hc-bf-pct').value);

    if (isNaN(weight) || isNaN(pct) || weight <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const fat = weight * (pct / 100);
    const water = weight - fat;

    document.getElementById('hc-bf-res-list').innerHTML = `
        <ul style="text-align:left;">
            <li><strong>Saf Süt Yağı:</strong> ${fat.toLocaleString('tr-TR', {maximumFractionDigits:1})} g</li>
            <li><strong>Su ve Süt Tortusu:</strong> ${water.toLocaleString('tr-TR', {maximumFractionDigits:1})} g</li>
            <li><strong>Açıklama:</strong> Yemeklerde sadece yağı kullanmak istiyorsanız (Sade Yağ), tereyağını eritip tortusunu ayırmalısınız.</li>
        </ul>
    `;
    
    document.getElementById('hc-butter-fat-result').classList.add('visible');
}
