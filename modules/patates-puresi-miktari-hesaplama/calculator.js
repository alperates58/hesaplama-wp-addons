function hcMashPotatoHesapla() {
    const count = parseInt(document.getElementById('hc-mp-count').value);

    if (isNaN(count) || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    // Kişi başı: 200-250g patates, 40ml süt, 15g tereyağı
    const potato = count * 0.22;
    const milk = count * 40;
    const butter = count * 15;

    document.getElementById('hc-mp-list').innerHTML = `
        <ul style="text-align:left;">
            <li><strong>Patates:</strong> ${potato.toLocaleString('tr-TR', {maximumFractionDigits:1})} kg</li>
            <li><strong>Süt:</strong> ${milk.toLocaleString('tr-TR')} ml</li>
            <li><strong>Tereyağı:</strong> ${butter.toLocaleString('tr-TR')} g</li>
            <li><strong>Tuz/Karabiber:</strong> Damak tadına göre</li>
        </ul>
    `;
    
    document.getElementById('hc-mash-potato-result').classList.add('visible');
}
