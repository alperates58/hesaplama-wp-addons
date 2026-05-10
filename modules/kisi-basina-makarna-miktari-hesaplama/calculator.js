function hcPastaPPHesapla() {
    const count = parseInt(document.getElementById('hc-pasta-count').value);
    const multiplier = parseFloat(document.getElementById('hc-pasta-type').value);

    if (isNaN(count) || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    const totalKg = count * multiplier;
    // Makarna piştiğinde ağırlığı yaklaşık 2.2 - 2.5 katına çıkar
    const cookedKg = totalKg * 2.35;

    document.getElementById('hc-pasta-total').innerText = (totalKg * 1000).toLocaleString('tr-TR') + ' g';
    document.getElementById('hc-pasta-info').innerText = `Pişmiş hali yaklaşık ${cookedKg.toLocaleString('tr-TR', { maximumFractionDigits: 1 })} kg olacaktır. (Yaklaşık ${(totalKg / 0.5).toFixed(1)} paket)`;
    
    document.getElementById('hc-pasta-pp-result').classList.add('visible');
}
