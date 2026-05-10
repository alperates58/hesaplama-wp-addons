function hcBbqPPHesapla() {
    const count = parseInt(document.getElementById('hc-bbq-count').value);
    const meatPP = parseFloat(document.getElementById('hc-bbq-hunger').value);

    if (isNaN(count) || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    const totalMeat = count * meatPP;
    const totalBread = count * 0.5; // Yarım ekmek/kişi
    const totalCoal = 1.5 + (count * 0.2); // Baz + kişi başı ek

    document.getElementById('hc-bbq-list').innerHTML = `
        <ul style="text-align:left;">
            <li><strong>Et/Tavuk/Köfte Toplam:</strong> ${totalMeat.toLocaleString('tr-TR', {maximumFractionDigits:1})} kg</li>
            <li><strong>Ekmek (Yarım):</strong> ${Math.ceil(totalBread)} adet</li>
            <li><strong>Mangal Kömürü:</strong> ~${Math.ceil(totalCoal)} kg</li>
            <li><strong>Domates/Biber:</strong> ~${Math.ceil(count * 0.15)} kg</li>
        </ul>
    `;
    
    document.getElementById('hc-bbq-pp-result').classList.add('visible');
}
