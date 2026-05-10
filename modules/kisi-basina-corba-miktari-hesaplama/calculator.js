function hcSoupPPHesapla() {
    const count = parseInt(document.getElementById('hc-soup-count').value);
    const perPerson = parseFloat(document.getElementById('hc-soup-role').value);

    if (isNaN(count) || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    const totalLitre = count * perPerson;
    // Standart kepçe ~100-125ml
    const ladles = totalLitre / 0.125;

    document.getElementById('hc-soup-total').innerText = totalLitre.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Litre';
    document.getElementById('hc-soup-info').innerText = `Yaklaşık ${Math.ceil(ladles)} kepçe servis çıkar.`;
    
    document.getElementById('hc-soup-pp-result').classList.add('visible');
}
