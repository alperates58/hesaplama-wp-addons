function hcFoodPPHesapla() {
    const count = parseInt(document.getElementById('hc-food-count').value);

    if (isNaN(count) || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    document.getElementById('hc-food-list').innerHTML = `
        <ul style="text-align:left;">
            <li><strong>Ana Yemek (Et/Tavuk):</strong> ${(count * 0.25).toLocaleString('tr-TR', {maximumFractionDigits:1})} kg</li>
            <li><strong>Pilav / Makarna:</strong> ${(count * 60)} g (kuru ağırlık)</li>
            <li><strong>Çorba:</strong> ${(count * 0.25).toLocaleString('tr-TR', {maximumFractionDigits:1})} Litre</li>
            <li><strong>Salata:</strong> ${(count * 0.15).toLocaleString('tr-TR', {maximumFractionDigits:1})} kg</li>
            <li><strong>Ekmek:</strong> ~${Math.ceil(count / 4)} tam ekmek</li>
            <li><strong>İçecek:</strong> ${(count * 0.4).toLocaleString('tr-TR', {maximumFractionDigits:1})} Litre</li>
        </ul>
    `;
    
    document.getElementById('hc-food-pp-result').classList.add('visible');
}
